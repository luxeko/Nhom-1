<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Cart;
use DB;

class DetailsComponent extends Component
{
    public $slug;   
    public $qty;

    public function increaseQuantity()
    {
        $this->qty++;
    }

    public function decreaseQuantity()
    {
        if($this->qty > 1)
        {
            $this->qty--;
        }
    }
    public function mount($slug)
    {
        $this->slug = $slug;       
        $this->qty = 1;
    }
    
    public function store($id, $name, $price)
    {
        Cart::add($id, $name, $this->qty, $price)->associate('App\Models\Product');
        session()->flash('success_message', 'Item has been added to Cart');
        return;
    }

    public function render()
    {
        $lproducts = Product::orderBy('created_at','DESC')->get()->take(8);
        $product = Product::where('slug',$this->slug)->first();
        $product_image_detail = DB::table('product_images')->where('product_id',$product->id)->get();
        return view('livewire.details-component', [
            'product'=>$product,
            'product_image_detail'=>$product_image_detail,
            'lproducts'=>$lproducts
            ])->layout('layout');
    }
}
