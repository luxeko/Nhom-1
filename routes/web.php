<?php

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Pages\PublicBlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pages\PublicHomeController;
use App\Http\Controllers\Pages\PublicProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route for Home
// Route::get('/',[PublicHomeController::class,'index']);
Route::get('/home',[PublicHomeController::class,'index']);
Route::get('/layout',[PublicHomeController::class,'layoutMaster']);
Route::get('/product_detail',[PublicHomeController::class,'productDetails']);
Route::get('/all_product',[PublicHomeController::class,'showAllProduct']);
Route::get('/checkout',[PublicHomeController::class,'checkOut']);
Route::get('/cart',[PublicHomeController::class,'cart']);
Route::get('/blog',[PublicHomeController::class,'blog']);
Route::get('/single_blog',[PublicHomeController::class,'singleBlog']);
// 3 cái router dưới này không sửa nhé ae
Route::get('/',[PublicProductController::class,'index']);
Route::get('detail/{id}',[PublicProductController::class,'productDetail']);
Route::get('products/list',[PublicProductController::class,'productList']);
Route::get('/all_product', [PublicProductController::class,'allProduct']);
Route::get('all_product/fetch_data', [PublicProductController::class,'fetch_data']);
// Route for social
Route::get('/contact',[PublicHomeController::class,'contactUs']);


// Public route (Đức Anh)
Route::group(['namespace'=>'Public'], function(){
    // Xử lý CRUD Blogs
    Route::group(['prefix'=>'public/blogs','middleware'=>'CheckLogedOut'], function(){
        Route::get('/index',[PublicBlogController::class,'index'])->name('blog.index');
        Route::get('/detail/{id}',[PublicBlogController::class,'detail'])->name('blog.detail');
        Route::get('/test',[PublicBlogController::class,'test'])->name('blog.test');
    }); 
});

// Admin route
Route::group(['namespace'=>'Admin'], function(){

    // xử lý đến trang login
    Route::get('admin',[LoginController::class,'goLogin']);
    Route::group(['prefix'=>'admin','middleware'=>'CheckLogedIn'], function(){
        Route::get('login',[LoginController::class,'getlogin']);
        Route::post('login',[LoginController::class,'postlogin']);
    });

    // xử lý khi đăng nhập thành công
    Route::get('logout',[HomeController::class,'getLogout']);
    Route::group(['prefix'=>'admin/home','middleware'=>'CheckLogedOut'], function(){
        Route::get('/',[HomeController::class,'showDashboard']);
        Route::get('error',[HomeController::class,'showErr']);
    }); 

    // xử lý phân quyền
    Route::group(['prefix'=>'admin/users', 'middleware'=>'CheckLogedOut'], function(){
        Route::get('/',[AdminUserController::class,'index'])->name('users.index');
    });

    // xử lý CRUD Category
    Route::group(['prefix'=>'admin/categories','middleware'=>'CheckLogedOut'], function(){
        Route::get('/show',[CategoryController::class,'show'])->name('category.index');
        Route::get('/create',[CategoryController::class,'create']);
        Route::post('/store',[CategoryController::class,'store'])->name('category.store');
        Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
        Route::post('/update/{id}',[CategoryController::class,'update'])->name('category.update');
        Route::get('/delete/{id}',[CategoryController::class,'delete'])->name('category.delete');
        Route::get('/search',[ProductController::class,'search'])->name('product.search');
    }); 

    // Xử lý CRUD Product
    Route::group(['prefix'=>'admin/products','middleware'=>'CheckLogedOut'], function(){
        Route::get('/show',[ProductController::class,'show'])->name('product.index');
        Route::get('/details',[ProductController::class,'details_product']);
        Route::get('/getCategoryById/{id}',[ProductController::class,'get_category_name']);
        Route::get('/getThumbnail/{id}',[ProductController::class,'get_thumbnail']);
        // Route::get('/getDiscountById/{id}',[ProductController::class,'get_discount']);
        Route::get('/create',[ProductController::class,'create']);
        Route::post('/store',[ProductController::class,'store']);
        Route::get('/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
        Route::post('/update/{id}',[ProductController::class,'update'])->name('product.update');
        Route::get('/delete/{id}',[ProductController::class,'delete'])->name('product.delete');
        // Route::get('/show/fetch_data',[ProductController::class,'fetch_data'])->name('product.fetch_data');

    }); 

    // Xử lý CRUD Blogs
    Route::group(['prefix'=>'admin/blogs','middleware'=>'CheckLogedOut'], function(){
        Route::get('/index',[BlogController::class,'index'])->name('blog.index');
        Route::get('/create',[BlogController::class,'create'])->name('blog.create');
        Route::post('/store',[BlogController::class,'store'])->name('blog.store');
        Route::get('/edit/{id}',[BlogController::class,'edit'])->name('blog.edit');
        Route::post('/update/{id}',[BlogController::class,'update'])->name('blog.update');
        Route::get('/delete/{id}',[BlogController::class,'delete'])->name('blog.delete');
        Route::get('/details',[BlogController::class,'details_blog']);
    }); 

});
