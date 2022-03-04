<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Models\Transaction;
use App\Mail\OrderMail;
use App\Models\City;
use Illuminate\Support\Facades\Auth;
use Cart;
use Stripe;
use Illuminate\Support\Facades\Mail;
use DB;

class CheckoutComponent extends Component
{
    public $ship_to_different;
    
    public $firstname;
    public $lastname;
    public $email;
    public $mobile;
    public $line1;
    public $city;
    
    public $s_firstname;
    public $s_lastname;
    public $s_email;
    public $s_mobile;
    public $s_line1;
    public $s_city;
    
    public $paymentmode;
    public $thankyou;
    
    public $card_no;
    public $exp_month;
    public $exp_year;
    public $cvc;
    
    public $cities;
    
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|numeric',
            'line1' => 'required',
            'city' => 'required',
            'paymentmode' => 'required'
        ]);
        
        if($this->ship_to_different)
        {
            $this->validateOnly($fields, [
                's_firstname' => 'required',
                's_lastname' => 'required',
                's_email' => 'required|email',
                's_mobile' => 'required|numeric',
                's_line1' => 'required',
                's_city' => 'required'
            ]);
        }
        
        if($this->paymentmode == 'card')
        {
            $this->validateOnly($fields, [
                'card_no' => 'required|numeric',
                'exp_month' => 'required|numeric',
                'exp_year' => 'required|numeric',
                'cvc' => 'required|numeric'
            ]);
        }
    }
    
    public function placeOrder()
    {
        $this->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|numeric',
            'line1' => 'required',
            'city' => 'required',
            'paymentmode' => 'required'
        ]);
        
        if($this->paymentmode == 'card')
        {
            $this->validate([
                'card_no' => 'required|numeric',
                'exp_month' => 'required|numeric',
                'exp_year' => 'required|numeric',
                'cvc' => 'required|numeric'
            ]);
        }
        
        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->subtotal = session()->get('checkout')['subtotal'];
        $order->tax = session()->get('checkout')['tax'];
        $order->total = session()->get('checkout')['total'];
        $order->firstname = $this->firstname;
        $order->lastname = $this->lastname;
        $order->email = $this->email; 
        $order->mobile = $this->mobile;
        $order->line1 = $this->line1; 
        $order->city = $this->city;  
        $order->status = 'ordered';
        $order->is_shipping_different = $this->ship_to_different ? 1:0;
        $order->save();
        
        foreach(Cart::content() as $item)
        {
            $orderItem = new OrderItem();
            $orderItem->product_id = $item->id;
            $orderItem->order_id = $order->id;
            $orderItem->price = $item->price;
            $orderItem->quantity = $item->qty;
            $orderItem->save();
        }
        
        if($this->ship_to_different)
        {
            $this->validate([
                's_firstname' => 'required',
                's_lastname' => 'required',
                's_email' => 'required|email',
                's_mobile' => 'required|numeric',
                's_line1' => 'required',
                's_city' => 'required',
            ]);
            
            $shipping = new Shipping();
            $shipping->order_id = $order->id; 
            $shipping->firstname = $this->s_firstname;
            $shipping->lastname = $this->s_lastname;
            $shipping->email = $this->s_email;
            $shipping->mobile = $this->s_mobile;
            $shipping->line1 = $this->s_line1;
            $shipping->city = $this->s_city;
            $shipping->save();            
        }
        
        if($this->paymentmode == 'cod')
        {
            $this->makeTransaction($order->id, 'pending');
            $this->resetCart();
        }
        else if($this->paymentmode == 'card')
        {
            $stripe = Stripe::make(env('STRIPE_KEY'));
            
            try{
                $token = $stripe->tokens()->create([
                    'card' => [
                        'number' => $this->card_no,
                        'exp_month' => $this->exp_month,
                        'exp_year' => $this->exp_year,
                        'cvc' => $this->cvc
                    ]
                ]);
                
                if(!isset($token['id']))
                {
                    session()->flash('stripe_error', 'The Stripe token was not generated correctly!');
                    $this->thankyou = 0;
                }
                
                $customer = $stripe->customers()->create([
                    'name' => $this->firstname . ' ' . $this->lastname,
                    'email' => $this->email,
                    'phone' => $this->mobile,
                    'address' => [
                        'line1' => $this->line1,
                        'city' => $this->city
                    ],
                    'shipping' => [
                        'name' => $this->firstname . ' ' . $this->lastname,
                        'address' => [
                            'line1' => $this->line1,
                            'city' => $this->city
                        ],
                    ],
                    'source' => $token['id']
                ]);
                
                $charge = $stripe->charges()->create([
                   'customer' => $customer['id'],
                    'currency' => 'USD',
                    'amount' => session()->get('checkout')['total'],
                    'description' => 'Payment for order no ' . $order->id
                ]);
                
                if($charge['status'] == 'succeeded')
                {
                    $this->makeTransaction($order->id, 'approved');
                    $this->resetCart();
                }
                else 
                {
                    session()->flash('stripe_error', 'Error in Transaction!');
                    $this->thankyou = 0;
                }
            } catch(Exception $e){
                session()->flash('stripe_error', $e->getMessage());
                $this->thankyou = 0;
            }
            
        }
        
        $this->sendOrderConfirmationMail($order);
    }
    
    public function resetCart()
    {
        $this->thankyou = 1;
        Cart::destroy();
        session()->forget('checkout');
    }
    
    public function makeTransaction($order_id, $status)
    {
        $transaction = new Transaction();
        $transaction->user_id = Auth::user()->id;
        $transaction->order_id = $order_id;
        $transaction->mode = $this->paymentmode;
        $transaction->status = $status;
        $transaction->save();
    }
    
    public function sendOrderConfirmationMail($order)
    {
        Mail::to($order->email)->send(new OrderMail($order));
    }
    
    public function verifyForCheckout()
    {
        if(!Auth::check())
        {
            return redirect()->route('login');
        }
        else if($this->thankyou)
        {
            return redirect()->route('thankyou');
        }
        else if(!session()->get('checkout'))
        {
            return redirect()->route('product.cart');
        }
    }
    
    public function mount()
    {
        $this->cities = City::all();
        // $order_info = Order::where('id','2')->first();
        if(Order::where('user_id', Auth::user()->id)->get()->count() > 0)
        {
            $order_info = Order::where('user_id', Auth::user()->id)->orderBy('created_at','DESC')->first();
            $this->firstname = $order_info->firstname;
            $this->lastname = $order_info->lastname;
            $this->email = $order_info->email;
            $this->mobile = $order_info->mobile;
            $this->line1 = $order_info->line1;
            $this->city = $order_info->city;
            if($order_info->is_shipping_different == 1)
            {
                $shipping_info = Shipping::where('order_id',$order_info->id)->first();
                $this->s_firstname = $shipping_info->firstname;
                $this->s_lastname = $shipping_info->lastname;
                $this->s_email = $shipping_info->email;
                $this->s_mobile = $shipping_info->mobile;
                $this->s_line1 = $shipping_info->line1;
                $this->s_city = $shipping_info->city;
            }
        }
        
    }
    
    public function render()
    {
        $this->verifyForCheckout();
        
        return view('livewire.checkout-component')->layout('layout');
    }
}
