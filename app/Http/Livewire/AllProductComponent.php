<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class AllProductComponent extends Component
{
    protected $paginationTheme = 'bootstrap';
    
    public function store($id, $name, $price)
    {
        Cart::add($id, $name, 1, $price)->associate('App\Models\Product');
        session()->flash('success_message', 'Item has been added to Cart');
        return;
    }

    use WithPagination;
    public function render()
    {
        $all_products = Product::all();
        $product_category = Category::all();
        $product_details = Product::where('slug',$this->slug)->first();
        $products = Product::paginate(9);
        return view('livewire.all-product-component', [
            'products'=> $products, 
            'product_category'=>$product_category, 
            'all_products'=>$all_products
            ])
            ->layout('layout');
    }
}
