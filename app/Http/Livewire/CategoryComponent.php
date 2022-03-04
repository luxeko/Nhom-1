<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class CategoryComponent extends Component
{
    public $sorting;
    public $pagesize;
    public $category_slug;
    protected $paginationTheme = 'bootstrap';
    
    public function store($id, $name, $price)
    {
        Cart::add($id, $name, 1, $price)->associate('App\Models\Product');
        session()->flash('success_message', 'Item has been added to Cart');
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
            $products = Product::where('category_id',$category_id)->orderBy('created_at','DESC')->paginate($this->pagesize);  
        }
        else if($this->sorting == "price")
        {
            $products = Product::where('category_id',$category_id)->orderBy('price','ASC')->paginate($this->pagesize); 
        }
        else if($this->sorting == "price-desc")
        {
            $products = Product::where('category_id',$category_id)->orderBy('price','DESC')->paginate($this->pagesize); 
        }
        else{
            $products = Product::where('category_id',$category_id)->paginate($this->pagesize);  
        }

        $categories = Category::all();
        return view('livewire.category-component', [
            'products'=> $products, 
            'categories'=>$categories, 
            'category_name'=>$category_name
            ])
            ->layout('layout');
    }
}
