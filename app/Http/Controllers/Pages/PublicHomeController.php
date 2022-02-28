<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PublicHomeController extends Controller
{
    public function index(){
        return view('pages.home');
    }
    public function layoutMaster(){
        return view('pages.layout');
    }
    public function showAllProduct(){
        return view('pages.products.all_product');
    }
    public function productDetails(){
        return view('pages.products.product_detail');
    }
    public function checkOut(){
        return view('pages.payment.checkout');
    }
    public function cart(){
        return view('pages.payment.cart');
    }
    public function contactUs(){
        return view('pages.social.contact');
    }
    public function blog(){
        return view('pages.social.blog');
    }
    public function singleBlog(){
        return view('pages.social.single_blog');
    }
}
