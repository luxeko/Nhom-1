<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
use Auth;
use DB;

class CartComponent extends Component
{
    public function increaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->emitTo('cart-count-component', 'refreshComponent'); 
    }
    
    public function decreaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->emitTo('cart-count-component', 'refreshComponent'); 
    }
    
    public function destroy($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        $this->emitTo('cart-count-component', 'refreshComponent');
        session()->flash('success_message','Item has been removed');
    }   

    public function checkout()
    {
        if (Auth::check())
        {
            return redirect()->route('checkout');
        }
        else
        {
            return redirect()->route('login');
        }
    }
    
    public function setAmountForCheckout()
    {
        if(!Cart::instance('cart')->count() > 0)
        {
            session()->forget('checkout');
            return;
        }
        session()->put('checkout',[
            'subtotal' => Cart::instance('cart')->subtotalFloat(),
            'tax' => Cart::instance('cart')->taxFloat(),
            'total' => Cart::instance('cart')->totalFloat()
        ]);
    }

    public function render()
    {
        if(Auth::check())
        {
            if(DB::table('shoppingcart')->where('identifier', Auth::user()->email)->get()->count() == 1)
            {
                Cart::instance('cart')->erase(Auth::user()->email);
            }
            Cart::instance('cart')->store(Auth::user()->email);
        }
        $this->setAmountForCheckout();
        return view('livewire.cart-component')->layout('layout');
    }
}