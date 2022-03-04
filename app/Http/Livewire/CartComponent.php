<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
use Auth;

class CartComponent extends Component
{
    public function increaseQuantity($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty + 1;
        Cart::update($rowId, $qty);
        $this->emitTo('cart-count-component', 'refreshComponent'); 
    }
    
    public function decreaseQuantity($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty - 1;
        Cart::update($rowId, $qty);
        $this->emitTo('cart-count-component', 'refreshComponent'); 
    }
    
    public function destroy($rowId)
    {
        Cart::remove($rowId);
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
        if(!Cart::count() > 0)
        {
            session()->forget('checkout');
            return;
        }
        session()->put('checkout',[
            'subtotal' => Cart::subtotalFloat(),
            'tax' => Cart::taxFloat(),
            'total' => Cart::totalFloat()
        ]);
    }

    public function render()
    {
        $this->setAmountForCheckout();
        return view('livewire.cart-component')->layout('layout');
    }
}
