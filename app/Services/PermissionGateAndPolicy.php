<?php

namespace App\Services;

use Illuminate\Support\Facades\Gate;

class PermissionGateAndPolicy{
    public function setGateAndPolicyAccess(){
        $this->defineGateCategory();
        $this->defineGateCombo();
        $this->defineGateProduct();
        $this->defineGateUser();
        $this->defineGateBlog();
        $this->defineGateRole();
        $this->defineGatePermission();
        $this->defineGateImage();
        $this->defineGateVoucher();
        $this->defineGateSlider();
        $this->defineGateSetting();
        $this->defineGateOrder();
        $this->defineGateCustomer();
    }
    public function defineGateCustomer(){
        Gate::define('customer-list', 'App\Policies\CustomerPolicy@view');
        Gate::define('customer-delete', 'App\Policies\CustomerPolicy@delete');
        Gate::define('customer-detail', 'App\Policies\CustomerPolicy@detail');
    }
    public function defineGateCategory(){
        Gate::define('category-list', 'App\Policies\CategoryPolicy@view');
        Gate::define('category-add', 'App\Policies\CategoryPolicy@create');
        Gate::define('category-edit', 'App\Policies\CategoryPolicy@update');
        Gate::define('category-delete', 'App\Policies\CategoryPolicy@delete');
    }
    public function defineGateSetting(){
        Gate::define('setting-list', 'App\Policies\SettingPolicy@view');
        Gate::define('setting-add', 'App\Policies\SettingPolicy@create');
        Gate::define('setting-edit', 'App\Policies\SettingPolicy@update');
        Gate::define('setting-delete', 'App\Policies\SettingPolicy@delete');
    }
    public function defineGateOrder(){
        Gate::define('order-list', 'App\Policies\OrderPolicy@view');
        Gate::define('order-detail', 'App\Policies\OrderPolicy@detail');
        Gate::define('order-edit', 'App\Policies\OrderPolicy@update');
    }
    public function defineGateProduct(){
        Gate::define('product-list', 'App\Policies\ProductPolicy@view');
        Gate::define('product-add', 'App\Policies\ProductPolicy@create');
        Gate::define('product-edit', 'App\Policies\ProductPolicy@update');
        Gate::define('product-delete', 'App\Policies\ProductPolicy@delete');
    }
    public function defineGateCombo(){
        Gate::define('combo-list', 'App\Policies\ComboPolicy@view');
        Gate::define('combo-add', 'App\Policies\ComboPolicy@create');
        Gate::define('combo-edit', 'App\Policies\ComboPolicy@update');
        Gate::define('combo-delete', 'App\Policies\ComboPolicy@delete');
    }
    public function defineGateUser(){
        Gate::define('user-list', 'App\Policies\UserPolicy@view');
        Gate::define('user-add', 'App\Policies\UserPolicy@create');
        Gate::define('user-edit', 'App\Policies\UserPolicy@update');
        Gate::define('user-delete', 'App\Policies\UserPolicy@delete');
    }
    public function defineGateBlog(){
        Gate::define('blog-list', 'App\Policies\BlogPolicy@view');
        Gate::define('blog-add', 'App\Policies\BlogPolicy@create');
        Gate::define('blog-edit', 'App\Policies\BlogPolicy@update');
        Gate::define('blog-delete', 'App\Policies\BlogPolicy@delete');
    }
    public function defineGateRole(){
        Gate::define('role-list', 'App\Policies\RolePolicy@view');
        Gate::define('role-add', 'App\Policies\RolePolicy@create');
        Gate::define('role-edit', 'App\Policies\RolePolicy@update');
        Gate::define('role-delete', 'App\Policies\RolePolicy@delete');
    }
    public function defineGatePermission(){
        // Gate::define('permission-list', 'App\Policies\PermissionPolicy@view');
        Gate::define('permission-add', 'App\Policies\PermissionPolicy@create');
        // Gate::define('permission-edit', 'App\Policies\PermissionPolicy@update');
        // Gate::define('permission-delete', 'App\Policies\PermissionPolicy@delete');
    }
    public function defineGateImage(){
        // Gate::define('image-list', 'App\Policies\ImagePolicy@view');
        // Gate::define('image-add', 'App\Policies\ImagePolicy@create');
        // Gate::define('image-edit', 'App\Policies\ImagePolicy@update');
        // Gate::define('image-delete', 'App\Policies\ImagePolicy@delete');
    }
    public function defineGateVoucher(){
        // Gate::define('voucher-list', 'App\Policies\VoucherPolicy@view');
        // Gate::define('voucher-add', 'App\Policies\VoucherPolicy@create');
        // Gate::define('voucher-edit', 'App\Policies\VoucherPolicy@update');
        // Gate::define('voucher-delete', 'App\Policies\VoucherPolicy@delete');
    }
    public function defineGateSlider(){
        // Gate::define('slider-list', 'App\Policies\SliderPolicy@view');
        // Gate::define('slider-add', 'App\Policies\SliderPolicy@create');
        // Gate::define('slider-edit', 'App\Policies\SliderPolicy@update');
        // Gate::define('slider-delete', 'App\Policies\SliderPolicy@delete');
    }

}