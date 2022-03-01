<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Cart;
use DB;

class DetailsComponent extends Component
{
    public $slug;   

    public function mount($slug)
    {
        $this->slug = $slug;               
    }
    
    public function store($id, $name, $price)
    {
        Cart::add($id, $name, 1, $price)->associate('App\Models\Product');
        session()->flash('success_message', 'Item has been added to Cart');
        return;
    }

    public function render()
    {
        $product_image_detail = DB::table('product_images')->where('product_id','=',$this->id)->get();
        $new_product = Product::latest()->get();
        $product = Product::where('slug',$this->slug)->first();
        return view('livewire.details-component', [
            'product'=>$product,
            'product_image_detail'=>$product_image_detail,
            'new_product'=>$new_product
            ])->layout('layout');
    }
}
