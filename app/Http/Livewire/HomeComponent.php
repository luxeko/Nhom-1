<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Mail\SubscribeMail;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Cart;
use Auth;
use DB;

class HomeComponent extends Component
{
    public $email;

    public function store($id, $name, $price)
    {
        Cart::instance('cart')->add($id, $name, 1, $price)->associate('App\Models\Product');
        session()->flash('success_message', 'Item has been added to Cart');
        $this->emitTo('cart-count-component', 'refreshComponent'); 
        return;
    }

    public function subscribe()
    {
        $this->validate([
            'email' => 'required|email',
        ]);
        
        $this->sendSubscribeMail($this->email);
        session()->flash('email-message', 'An email has been sent!');
        $this->email = "";
    }

    public function sendSubscribeMail($email)
    {
        Mail::to($email)->send(new SubscribeMail());
    }
    
    public function render()
    {
        $products = Product::paginate(10);
        $lproducts = Product::orderBy('created_at','DESC')->get()->take(8);
        
        if(Auth::check())
        {
            Cart::instance('cart')->restore(Auth::user()->email);
        }

        return view('livewire.home-component',  ['products' => $products, 'lproducts'=>$lproducts])->layout('index');
    }
}
