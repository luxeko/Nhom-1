<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Cart;

class HomeComponent extends Component
{
    public function store($id, $name, $price)
    {
        Cart::add($id, $name, 1, $price)->associate('App\Models\Product');
        session()->flash('success_message', 'Item has been added to Cart');
        return;
    }
    
    public function render()
    {
        $products = Product::paginate(10);
        $lproducts = Product::orderBy('created_at','DESC')->get()->take(8);
        return view('livewire.home-component',  ['products' => $products, 'lproducts'=>$lproducts])->layout('index');
    }
}
