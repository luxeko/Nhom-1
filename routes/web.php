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
    Route::group(['middleware'=>'CheckLogedOut'], function(){
        Route::get('/public/blogs/index',[PublicBlogController::class,'index'])->name('blog.index');
        Route::get('/public/blogs/detail/{id}',[PublicBlogController::class,'detail'])->name('blog.detail');
        Route::get('/public/blogs/test',[PublicBlogController::class,'test'])->name('blog.test');
    }); 
    //Route::group(['prefix'=>'public/'], function(){
    //    Route::get('/index', [PublicProductController::class, 'index']);
    //}); 
});

// Admin route
Route::group(['namespace'=>'Admin'], function(){
    // xử lý đến trang login
    Route::get('/admin',[LoginController::class,'goLogin'])->name('admin.login');
    Route::group(['middleware'=>'CheckLogedIn'], function(){
        Route::get('/admin/login',[LoginController::class,'getlogin']);
        Route::post('/admin/login',[LoginController::class,'postlogin']);
    });

    // xử lý khi đăng nhập thành công
    Route::get('/admin/logout',[HomeController::class,'getLogout'])->name('admin.logout'); // xử lý khi đăng xuất
    Route::group(['middleware'=>'CheckLogedOut'], function(){
        Route::get('/admin/home',[HomeController::class,'showDashboard'])->name('admin.home');
        Route::get('/admin/error',[HomeController::class,'showErr']);
        Route::get('/admin/profile/{id}',[AdminUserController::class,'profile'])->name('user.profile');
        Route::post('/admin/update_profile/{id}',[AdminUserController::class,'update_profile'])->name('user.profile_update');
    }); 


    // xử lý CRUD Category
    Route::group(['middleware'=>'CheckLogedOut'], function(){
        Route::get('/admin/categories/show',[CategoryController::class,'show'])->name('category.index')->middleware('can:category-list');
        Route::get('/admin/categories/create',[CategoryController::class,'create'])->middleware('can:category-add');
        Route::post('/admin/categories/store',[CategoryController::class,'store'])->name('category.store');
        Route::get('/admin/categories/edit/{id}',[CategoryController::class,'edit'])->name('category.edit')->middleware('can:category-edit');
        Route::post('/admin/categories/update/{id}',[CategoryController::class,'update'])->name('category.update');
        Route::get('/admin/categories/delete/{id}',[CategoryController::class,'delete'])->name('category.delete')->middleware('can:category-delete');
        Route::get('/admin/categories/search',[ProductController::class,'search'])->name('product.search');
    }); 

    // Xử lý CRUD Product
    Route::group(['middleware'=>'CheckLogedOut'], function(){
        Route::get('/admin/products/show',[ProductController::class,'show'])->name('product.index')->middleware('can:product-list');
        Route::get('/admin/products/details',[ProductController::class,'details_product']);
        Route::get('/admin/products/getCategoryById/{id}',[ProductController::class,'get_category_name']);
        Route::get('/admin/products/getThumbnail/{id}',[ProductController::class,'get_thumbnail']);
        // Route::get('/getDiscountById/{id}',[ProductController::class,'get_discount']);
        Route::get('/admin/products/create',[ProductController::class,'create'])->middleware('can:product-add');
        Route::post('/admin/products/store',[ProductController::class,'store']);
        Route::get('/admin/products/edit/{id}',[ProductController::class,'edit'])->name('product.edit')->middleware('can:product-edit');
        Route::post('/admin/products/update/{id}',[ProductController::class,'update'])->name('product.update');
        Route::get('/admin/products/delete/{id}',[ProductController::class,'delete'])->name('product.delete')->middleware('can:product-delete');
        // Route::get('/show/fetch_data',[ProductController::class,'fetch_data'])->name('product.fetch_data');

    }); 

    // Xử lý CRUD Blogs
    Route::group(['middleware'=>'CheckLogedOut'], function(){
        Route::get('/admin/blogs/index',[BlogController::class,'index'])->name('blog.index')->middleware('can:blog-list');
        Route::get('/admin/blogs/create',[BlogController::class,'create'])->name('blog.create')->middleware('can:blog-add');
        Route::post('/admin/blogs/store',[BlogController::class,'store'])->name('blog.store');
        Route::get('/admin/blogs/edit/{id}',[BlogController::class,'edit'])->name('blog.edit')->middleware('can:blog-edit');
        Route::post('/admin/blogs/update/{id}',[BlogController::class,'update'])->name('blog.update');
        Route::get('/admin/blogs/delete/{id}',[BlogController::class,'delete'])->name('blog.delete')->middleware('can:blog-delete');
        Route::get('/admin/blogs/details',[BlogController::class,'details_blog']);
    }); 

    // Xử lý CRUD Roles
    Route::group(['middleware'=>'CheckLogedOut'], function(){
        Route::get('/admin/roles/index',[RoleController::class,'index'])->name('role.index')->middleware('can:role-list');
        Route::get('/admin/roles/create',[RoleController::class,'create'])->name('role.create')->middleware('can:role-add');
        Route::post('/admin/roles/store',[RoleController::class,'store'])->name('role.store');
        Route::get('/admin/roles/edit/{id}',[RoleController::class,'edit'])->name('role.edit')->middleware('can:role-edit');
        Route::post('/admin/roles/update/{id}',[RoleController::class,'update'])->name('role.update');
        Route::get('/admin/roles/delete/{id}',[RoleController::class,'delete'])->name('role.delete')->middleware('can:role-delete');
    }); 

    // Xử lý CRUD Permission
    Route::group(['middleware'=>'CheckLogedOut'], function(){
        Route::get('/admin/permissions/create',[PermissionController::class,'create'])->name('permission.create')->middleware('can:permission-add');
        Route::post('/admin/permissions/store',[PermissionController::class,'store'])->name('permission.store');
    }); 


    // Xử lý CRUD Combo
    Route::group(['middleware'=>'CheckLogedOut'], function(){
        Route::get('/admin/combos/index',[ComboController::class,'index'])->name('combo.index')->middleware('can:combo-list');
        Route::get('/admin/combos/create',[ComboController::class,'create'])->name('combo.create')->middleware('can:combo-add');
        Route::post('/admin/combos/store',[ComboController::class,'store'])->name('combo.store');
        Route::get('/admin/combos/edit/{id}',[ComboController::class,'edit'])->name('combo.edit')->middleware('can:combo-edit');
        Route::post('/admin/combos/update/{id}',[ComboController::class,'update'])->name('combo.update');
        Route::get('/admin/combos/delete/{id}',[ComboController::class,'delete'])->name('combo.delete')->middleware('can:combo-delete');
        Route::get('/admin/combos/details',[ComboController::class,'details_combo']);
    }); 

    // Xử lý CRUD User
    Route::group(['middleware'=>'CheckLogedOut'], function(){
        Route::get('/admin/users/index',[AdminUserController::class,'index'])->name('user.index')->middleware('can:user-list');
        Route::get('/admin/users/create',[AdminUserController::class,'create'])->name('user.create')->middleware('can:user-add');
        Route::post('/admin/users/store',[AdminUserController::class,'store'])->name('user.store');
        Route::get('/admin/users/edit/{id}',[AdminUserController::class,'edit'])->name('user.edit')->middleware('can:user-edit');
        Route::post('/admin/users/update/{id}',[AdminUserController::class,'update'])->name('user.update');
        Route::get('/admin/users/delete/{id}',[AdminUserController::class,'delete'])->name('user.delete')->middleware('can:user-delete');
        Route::get('/admin/users/details',[AdminUserController::class,'details']);
    }); 
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
