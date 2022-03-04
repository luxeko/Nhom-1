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
    public $min_price;
    public $max_price;
    
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
        $this->min_price = 10000;
        $this->max_price = 50000;
    }

    use WithPagination;
    public function render()
    {
        if($this->sorting == "date")   
        {
            $products = Product::whereBetween('price',[$this->min_price,$this->max_price])->orderBy('created_at','DESC')->paginate($this->pagesize);  
        }
        else if($this->sorting == "price")
        {
            $products = Product::whereBetween('price',[$this->min_price,$this->max_price])->orderBy('price','ASC')->paginate($this->pagesize); 
        }
        else if($this->sorting == "price-desc")
        {
            $products = Product::whereBetween('price',[$this->min_price,$this->max_price])->orderBy('price','DESC')->paginate($this->pagesize); 
        }
        else{
            $products = Product::whereBetween('price',[$this->min_price,$this->max_price])->paginate($this->pagesize);  
        }

        
        $categories = Category::all();
        $lproducts = Product::orderBy('created_at','DESC')->get()->take(8);
        return view('livewire.all-product-component', [
            'products'=> $products, 
            'categories'=>$categories,
            'lproducts'=>$lproducts
            ])
            ->layout('layout');
    }
}
