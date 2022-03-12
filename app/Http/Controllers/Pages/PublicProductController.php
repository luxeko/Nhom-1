<?php

namespace App\Http\Controllers\Pages;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublicProductController extends Controller
{
    //
    public function index(){
        $products = Product::all();
        $new_pro = Product::latest()->get();
        return view('pages.home',compact('products','new_pro'));
    }
    public function productDetail($id){
        $product_detail = Product::find($id);
        $product_category = Category::all();
        $product_image_detail = DB::table('product_images')->where('product_id','=',$id)->get();
        $new_product = Product::latest()->get();
        return view('pages.products.product_detail',compact('product_detail','product_category','new_product','product_image_detail'));
    }
    public function productList(){
        $products = Product::all();
        return view('pages.layout',compact('products'));
    }
    // public function filterCategory(){
    //     $categories = Category::all();
    //     return view('pages.products.all_product',compact('categories'));
    // }
   
    public function searchPaginate(Request $request)
    {
        $products=Product::when($request->has("name"),function($q)use($request){
            return $q->where("name","like","%".$request->get("name")."%");
        })->paginate(9); 
        $count = 0;
        if($request->ajax()){
            $count = count($products);
            return view('pages.products.pagination_data' ,compact('products','count')); 
        } 
        return view('pages.products.all_product',compact('products'));
    }
    
    public function store($product_id,$product_name,$product_price)
    {
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');              
        session()->flash('success_message','Item added in Cart');
        return view ('/cart');
    }   

}
