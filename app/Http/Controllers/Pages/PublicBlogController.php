<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class PublicBlogController extends Controller
{
    private $blog;
    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }
    public function index(){
        $blogs = $this->blog->where('status', '=', 1)->paginate(5);
        return view('pages.social.blog',compact('blogs'));
    }
    public function detail(){
        
    }
    public function test(){
        return view('pages.social.single_blog');
    }
}
