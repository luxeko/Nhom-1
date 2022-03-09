<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
use Auth;
use DB;

class CategoryComponent extends Component
{
    public $sorting;
    public $pagesize;
    public $category_slug;
    protected $paginationTheme = 'bootstrap';
    public $min_price;
    public $max_price;
    public $search;
    
    public function store($id, $name, $price)
    {
        Cart::instance('cart')->add($id, $name, 1, $price)->associate('App\Models\Product');
        session()->flash('success_message', 'Item has been added to Cart');
        $this->emitTo('cart-count-component', 'refreshComponent'); 
        return;
    }

    public function mount($category_slug)
    {
        $this->sorting = "default"; 
        $this->pagesize = 9;
        $this->category_slug = $category_slug;
    }

    use WithPagination;
    public function render()
    {
        $category = Category::where('slug', $this->category_slug)->first();
        $category_id = $category->id;
        $category_name = $category->name;
        if($this->sorting == "date")   
        {
            $products = Product::where('name', 'like', '%'.$this->search.'%')->where('status', 1)->whereNull('deleted_at')->where('category_id',$category_id)->whereBetween('price',[$this->min_price,$this->max_price])->orderBy('created_at','DESC')->paginate($this->pagesize);
        }
        else if($this->sorting == "price")
        {
            $products = Product::where('name', 'like', '%'.$this->search.'%')->where('status', 1)->whereNull('deleted_at')->where('category_id',$category_id)->whereBetween('price',[$this->min_price,$this->max_price])->orderBy('price','ASC')->paginate($this->pagesize);
        }
        else if($this->sorting == "price-desc")
        {
            $products = Product::where('name', 'like', '%'.$this->search.'%')->where('status', 1)->whereNull('deleted_at')->where('category_id',$category_id)->whereBetween('price',[$this->min_price,$this->max_price])->orderBy('price','DESC')->paginate($this->pagesize); 
        }
        else{
            $products = Product::where('name', 'like', '%'.$this->search.'%')->where('status', 1)->whereNull('deleted_at')->where('category_id',$category_id)->whereBetween('price',[$this->min_price,$this->max_price])->paginate($this->pagesize);  
        }
        
        $this->min_price = 500000;
        $this->max_price = 10000000;
        $categories = Category::where('status', 1)->get();
        $lproducts = Product::orderBy('created_at','DESC')->get()->take(8);

        if(Auth::check())
        {
            if(DB::table('shoppingcart')->where('identifier', Auth::user()->email)->get()->count() == 1)
            {
                Cart::instance('cart')->erase(Auth::user()->email);
            }
            Cart::instance('cart')->store(Auth::user()->email);
        }

        return view('livewire.category-component', [
            'products'=> $products, 
            'categories'=>$categories, 
            'category_name'=>$category_name,
            'lproducts'=>$lproducts
            ])
            ->layout('layout');
    }
}
