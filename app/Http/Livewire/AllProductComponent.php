<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class AllProductComponent extends Component
{
    public $sorting;
    public $pagesize;
    protected $paginationTheme = 'bootstrap';
    
    public function store($id, $name, $price)
    {
        Cart::add($id, $name, 1, $price)->associate('App\Models\Product');
        session()->flash('success_message', 'Item has been added to Cart');
        return;
    }

    public function mount()
    {
        $this->sorting = "default"; 
        $this->pagesize = 9;
    }

    use WithPagination;
    public function render()
    {
        if($this->sorting == "date")   
        {
            $products = Product::orderBy('created_at','DESC')->paginate($this->pagesize);  
        }
        else if($this->sorting == "price")
        {
            $products = Product::orderBy('price','ASC')->paginate($this->pagesize); 
        }
        else if($this->sorting == "price-desc")
        {
            $products = Product::orderBy('price','DESC')->paginate($this->pagesize); 
        }
        else{
            $products = Product::paginate($this->pagesize);  
        }

        $all_products = Product::all();
        $categories = Category::all();
        return view('livewire.all-product-component', [
            'products'=> $products, 
            'categories'=>$categories, 
            'all_products'=>$all_products
            ])
            ->layout('layout');
    }
}