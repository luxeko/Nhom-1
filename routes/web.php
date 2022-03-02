<?php

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ComboController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
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
    Route::group(['prefix'=>'public/'], function(){
        Route::get('/index', [PublicProductController::class, 'index']);
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
    Route::group(['prefix'=>'admin/users','middleware'=>'CheckLogedOut'], function(){
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

    // Xử lý CRUD Roles
    Route::group(['prefix'=>'admin/roles','middleware'=>'CheckLogedOut'], function(){
        Route::get('/index',[RoleController::class,'index'])->name('role.index');
        Route::get('/create',[RoleController::class,'create'])->name('role.create');
        Route::post('/store',[RoleController::class,'store'])->name('role.store');
        Route::get('/edit/{id}',[RoleController::class,'edit'])->name('role.edit');
        Route::post('/update/{id}',[RoleController::class,'update'])->name('role.update');
        Route::get('/delete/{id}',[RoleController::class,'delete'])->name('role.delete');
    }); 


    // Xử lý CRUD Combo
    Route::group(['prefix'=>'admin/combos','middleware'=>'CheckLogedOut'], function(){
        Route::get('/index',[ComboController::class,'index'])->name('combo.index');
        Route::get('/create',[ComboController::class,'create'])->name('combo.create');
        Route::post('/store',[ComboController::class,'store'])->name('combo.store');
        Route::get('/edit/{id}',[ComboController::class,'edit'])->name('combo.edit');
        Route::post('/update/{id}',[ComboController::class,'update'])->name('combo.update');
        Route::get('/delete/{id}',[ComboController::class,'delete'])->name('combo.delete');
        Route::get('/details',[ComboController::class,'details_combo']);
    }); 

    // Xử lý CRUD User
    Route::group(['prefix'=>'admin/users','middleware'=>'CheckLogedOut'], function(){
        Route::get('/index',[AdminUserController::class,'index'])->name('user.index');
        Route::get('/create',[AdminUserController::class,'create'])->name('user.create');
        Route::post('/store',[AdminUserController::class,'store'])->name('user.store');
        Route::get('/edit/{id}',[AdminUserController::class,'edit'])->name('user.edit');
        Route::post('/update/{id}',[AdminUserController::class,'update'])->name('user.update');
        Route::get('/delete/{id}',[AdminUserController::class,'delete'])->name('user.delete');
        Route::get('/details',[AdminUserController::class,'details']);
        Route::get('/getRoleName/{id}',[AdminUserController::class,'getRoles'])->name('user.test');
        Route::get('/profile/{id}',[AdminUserController::class,'profile'])->name('user.profile');
        Route::post('/update_profile/{id}',[AdminUserController::class,'update_profile'])->name('user.profile_update');
    }); 

});
