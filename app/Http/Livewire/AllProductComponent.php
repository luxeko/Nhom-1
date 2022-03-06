<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
use Auth;
use DB;

class AllProductComponent extends Component
{
    public $sorting;
    public $pagesize;
    protected $paginationTheme = 'bootstrap';
    public $min_price;
    public $max_price;
    public $search;
    // protected $queryString = ['search'];

    public function store($id, $name, $price)
    {
        Cart::instance('cart')->add($id, $name, 1, $price)->associate('App\Models\Product');
        session()->flash('success_message', 'Item has been added to Cart');
        $this->emitTo('cart-count-component', 'refreshComponent');
        $this->emitTo('all-product-component', ['cart.updated','cart.added', 'cart.removed']);
        return;
    }

    public function mount()
    {
        $this->sorting = "default"; 
        $this->pagesize = 9;
        $this->min_price = Product::orderBy('price', 'ASC')->first()->price;
        $this->max_price = Product::orderBy('price', 'DESC')->first()->price;
    }

    use WithPagination;
    public function render()
    {
        if($this->sorting == "date")   
        {
            $products = Product::where('name', 'like', '%'.$this->search.'%')->whereBetween('price',[$this->min_price,$this->max_price])->orderBy('created_at','DESC')->paginate($this->pagesize);
        }
        else if($this->sorting == "price")
        {
            $products = Product::where('name', 'like', '%'.$this->search.'%')->whereBetween('price',[$this->min_price,$this->max_price])->orderBy('price','ASC')->paginate($this->pagesize); 
        }
        else if($this->sorting == "price-desc")
        {
            $products = Product::where('name', 'like', '%'.$this->search.'%')->whereBetween('price',[$this->min_price,$this->max_price])->orderBy('price','DESC')->paginate($this->pagesize); 
        }
        else{
            $products = Product::where('name', 'like', '%'.$this->search.'%')->whereBetween('price',[$this->min_price,$this->max_price])->paginate($this->pagesize);  
        }

        $categories = Category::all();
        $lproducts = Product::orderBy('created_at','DESC')->get()->take(8);

        if(Auth::check())
        {
            if(DB::table('shoppingcart')->where('identifier', Auth::user()->email)->get()->count() == 1)
            {
                Cart::instance('cart')->erase(Auth::user()->email);
            }
            Cart::instance('cart')->store(Auth::user()->email);
        }
        
        return view('livewire.all-product-component', [
            'products' => $products, 
            'categories'=>$categories,
            'lproducts'=>$lproducts
            ])
            ->layout('layout');
    }
}
