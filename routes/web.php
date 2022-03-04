<?php

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ComboController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Pages\PublicBlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pages\PublicHomeController;
use App\Http\Controllers\Pages\PublicProductController;

//livewire controller
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\AllProductComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\ThankyouComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\user\UserDashboardComponent;
use App\Http\Livewire\user\UserOrdersComponent;
use App\Http\Livewire\user\UserOrderDetailsComponent;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;



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



// Livewire route

Route::get('/', HomeComponent::class);
Route::get('/shop',AllProductComponent::class);
Route::get('/cart',CartComponent::class)->name('product.cart');
Route::get('/checkout', CheckoutComponent::class)->name('checkout');
Route::get('/thankyou', ThankyouComponent::class)->name('thankyou');
Route::get('/product/{slug}',DetailsComponent::class)->name('product.details');
Route::get('/product-category/{category_slug}',CategoryComponent::class)->name('product.category');
Route::get('/search',SearchComponent::class)->name('products.search'); 
Route::middleware(['auth:sanctum','verified'])->group(function(){ 
    Route::get('/user/dashboard',UserDashboardComponent::class)->name('user.dashboard'); 
    Route::get('/user/orders',UserOrdersComponent::class)->name('user.orders');
    Route::get('/user/orders/{order_id}',UserOrderDetailsComponent::class)->name('user.orderdetails');
});



Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');


//Xem trước mail
Route::get('/mailable', function () {
    $order = App\Models\Order::find(1);
    
    return new App\Mail\Ordermail($order);
});






// Public route (Đức Anh)
Route::group(['namespace'=>'Public'], function(){
    // Xử lý CRUD Blogs
    Route::group(['prefix'=>'public/blogs','middleware'=>'CheckLogedOut'], function(){
        Route::get('/index',[PublicBlogController::class,'index'])->name('blog.index');
        Route::get('/detail/{id}',[PublicBlogController::class,'detail'])->name('blog.detail');
        Route::get('/test',[PublicBlogController::class,'test'])->name('blog.test');
    }); 
    //Route::group(['prefix'=>'public/'], function(){
    //    Route::get('/index', [PublicProductController::class, 'index']);
     //}); 
});

// Admin route
Route::group(['namespace'=>'Admin'], function(){
    // xử lý đến trang login
    Route::get('admin',[LoginController::class,'goLogin']);
    Route::group(['middleware'=>'CheckLogedIn'], function(){
        Route::get('admin/login',[LoginController::class,'getlogin']);
        Route::post('admin/login',[LoginController::class,'postlogin']);
    });

    // xử lý khi đăng nhập thành công
    Route::get('admin/logout',[HomeController::class,'getLogout'])->name('admin.logout'); // xử lý khi đăng xuất
    Route::group(['prefix'=>'admin','middleware'=>'CheckLogedOut'], function(){
        Route::get('/home',[HomeController::class,'showDashboard'])->name('admin.home');
        Route::get('error',[HomeController::class,'showErr']);
        Route::get('/profile/{id}',[AdminUserController::class,'profile'])->name('user.profile');
        Route::post('/update_profile/{id}',[AdminUserController::class,'update_profile'])->name('user.profile_update');
    }); 


    // xử lý CRUD Category
    Route::group(['prefix'=>'admin/categories','middleware'=>'CheckLogedOut'], function(){
        Route::get('/show',[CategoryController::class,'show'])->name('category.index')->middleware('can:category-list');
        Route::get('/create',[CategoryController::class,'create'])->middleware('can:category-add');
        Route::post('/store',[CategoryController::class,'store'])->name('category.store');
        Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('category.edit')->middleware('can:category-edit');
        Route::post('/update/{id}',[CategoryController::class,'update'])->name('category.update');
        Route::get('/delete/{id}',[CategoryController::class,'delete'])->name('category.delete')->middleware('can:category-delete');
        Route::get('/search',[ProductController::class,'search'])->name('product.search');
    }); 

    // Xử lý CRUD Product
    Route::group(['prefix'=>'admin/products','middleware'=>'CheckLogedOut'], function(){
        Route::get('/show',[ProductController::class,'show'])->name('product.index')->middleware('can:product-list');
        Route::get('/details',[ProductController::class,'details_product']);
        Route::get('/getCategoryById/{id}',[ProductController::class,'get_category_name']);
        Route::get('/getThumbnail/{id}',[ProductController::class,'get_thumbnail']);
        // Route::get('/getDiscountById/{id}',[ProductController::class,'get_discount']);
        Route::get('/create',[ProductController::class,'create'])->middleware('can:product-add');
        Route::post('/store',[ProductController::class,'store']);
        Route::get('/edit/{id}',[ProductController::class,'edit'])->name('product.edit')->middleware('can:product-edit');
        Route::post('/update/{id}',[ProductController::class,'update'])->name('product.update');
        Route::get('/delete/{id}',[ProductController::class,'delete'])->name('product.delete')->middleware('can:product-delete');
        // Route::get('/show/fetch_data',[ProductController::class,'fetch_data'])->name('product.fetch_data');

    }); 

    // Xử lý CRUD Blogs
    Route::group(['prefix'=>'admin/blogs','middleware'=>'CheckLogedOut'], function(){
        Route::get('/index',[BlogController::class,'index'])->name('blog.index')->middleware('can:blog-list');
        Route::get('/create',[BlogController::class,'create'])->name('blog.create')->middleware('can:blog-add');
        Route::post('/store',[BlogController::class,'store'])->name('blog.store');
        Route::get('/edit/{id}',[BlogController::class,'edit'])->name('blog.edit')->middleware('can:blog-edit');
        Route::post('/update/{id}',[BlogController::class,'update'])->name('blog.update');
        Route::get('/delete/{id}',[BlogController::class,'delete'])->name('blog.delete')->middleware('can:blog-delete');
        Route::get('/details',[BlogController::class,'details_blog']);
    }); 

    // Xử lý CRUD Roles
    Route::group(['prefix'=>'admin/roles','middleware'=>'CheckLogedOut'], function(){
        Route::get('/index',[RoleController::class,'index'])->name('role.index')->middleware('can:role-list');
        Route::get('/create',[RoleController::class,'create'])->name('role.create')->middleware('can:role-add');
        Route::post('/store',[RoleController::class,'store'])->name('role.store');
        Route::get('/edit/{id}',[RoleController::class,'edit'])->name('role.edit')->middleware('can:role-edit');
        Route::post('/update/{id}',[RoleController::class,'update'])->name('role.update');
        Route::get('/delete/{id}',[RoleController::class,'delete'])->name('role.delete')->middleware('can:role-delete');
    }); 

    // Xử lý CRUD Permission
    Route::group(['prefix'=>'admin/permissions','middleware'=>'CheckLogedOut'], function(){
        Route::get('/create',[PermissionController::class,'create'])->name('permission.create')->middleware('can:permission-add');
        Route::post('/store',[PermissionController::class,'store'])->name('permission.store');
    }); 


    // Xử lý CRUD Combo
    Route::group(['prefix'=>'admin/combos','middleware'=>'CheckLogedOut'], function(){
        Route::get('/index',[ComboController::class,'index'])->name('combo.index')->middleware('can:combo-list');
        Route::get('/create',[ComboController::class,'create'])->name('combo.create')->middleware('can:combo-add');
        Route::post('/store',[ComboController::class,'store'])->name('combo.store');
        Route::get('/edit/{id}',[ComboController::class,'edit'])->name('combo.edit')->middleware('can:combo-edit');
        Route::post('/update/{id}',[ComboController::class,'update'])->name('combo.update');
        Route::get('/delete/{id}',[ComboController::class,'delete'])->name('combo.delete')->middleware('can:combo-delete');
        Route::get('/details',[ComboController::class,'details_combo']);
    }); 

    // Xử lý CRUD User
    Route::group(['prefix'=>'admin/users','middleware'=>'CheckLogedOut'], function(){
        Route::get('/index',[AdminUserController::class,'index'])->name('user.index')->middleware('can:user-list');
        Route::get('/create',[AdminUserController::class,'create'])->name('user.create')->middleware('can:user-add');
        Route::post('/store',[AdminUserController::class,'store'])->name('user.store');
        Route::get('/edit/{id}',[AdminUserController::class,'edit'])->name('user.edit')->middleware('can:user-edit');
        Route::post('/update/{id}',[AdminUserController::class,'update'])->name('user.update');
        Route::get('/delete/{id}',[AdminUserController::class,'delete'])->name('user.delete')->middleware('can:user-delete');
        Route::get('/details',[AdminUserController::class,'details']);
    }); 
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
