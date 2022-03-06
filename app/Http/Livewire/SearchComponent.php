<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
use Auth;
use DB;

class SearchComponent extends Component
{
    public $sorting;
    public $pagesize;
    public $search;
    public $product_cat;
    public $product_cat_id;
    protected $paginationTheme = 'bootstrap';
    public $min_price;
    public $max_price;
    public $live_search;
    
    public function mount()
    {
        $this->sorting = "default";
        $this->pagesize = 12;
        $this->fill(request()->only('search','product_cat','product_cat_id'));
    }

    public function store($product_id,$product_name,$product_price)
    {
        Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item added in Cart');
        $this->emitTo('cart-count-component', 'refreshComponent'); 
        return;
    }

    use WithPagination;
    public function render()
    {  
        if($this->sorting=='date')   
        {
            $products = Product::where('name','like','%'.$this->search .'%')->where('name', 'like', '%'.$this->live_search.'%')->where('category_id','like','%'.$this->product_cat_id.'%')->whereBetween('price',[$this->min_price,$this->max_price])->orderBy('created_at','DESC')->paginate($this->pagesize);
        }
        else if($this->sorting=="price")
        {
            $products = Product::where('name','like','%'.$this->search .'%')->where('name', 'like', '%'.$this->live_search.'%')->where('category_id','like','%'.$this->product_cat_id.'%')->whereBetween('price',[$this->min_price,$this->max_price])->orderBy('price','ASC')->paginate($this->pagesize); 
        }
        else if($this->sorting=="price-desc")
        {
            $products = Product::where('name','like','%'.$this->search .'%')->where('name', 'like', '%'.$this->live_search.'%')->where('category_id','like','%'.$this->product_cat_id.'%')->whereBetween('price',[$this->min_price,$this->max_price])->orderBy('price','DESC')->paginate($this->pagesize); 
        }
        else{
            $products = Product::where('name','like','%'.$this->search .'%')->where('name', 'like', '%'.$this->live_search.'%')->where('category_id','like','%'.$this->product_cat_id.'%')->whereBetween('price',[$this->min_price,$this->max_price])->paginate($this->pagesize);  
        }   
        
        $this->min_price = Product::where('name','like','%'.$this->search .'%')->where('category_id','like','%'.$this->product_cat_id.'%')->orderBy('price', 'ASC')->first()->price;
        $this->max_price = Product::where('name','like','%'.$this->search .'%')->where('category_id','like','%'.$this->product_cat_id.'%')->orderBy('price', 'DESC')->first()->price;
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
        
        return view('livewire.search-component',[
            'products'=> $products,
            'categories'=>$categories,
            'lproducts'=>$lproducts
            ])->layout("layout");
    }
}