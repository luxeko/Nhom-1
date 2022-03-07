<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    {{-- <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{asset('admin/home')}}">
        <img src="{{ URL::asset('/frontend/img/new2.png')}}" >
    </a> --}}
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin.index')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">MATIVINA</div>
    </a>


    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li id="dashboard_active" class="nav-item">
        <a class="nav-link " href="{{route('admin.index')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Tổng quan</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Quản lý
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
            aria-expanded="true" aria-controls="collapseOne">
            <i class="fas fa-fw fa-cog"></i>
            <span>Quản lý</span>
        </a>
        <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">List:</h6>
                @can('category-list')
                    <a class="collapse-item category_active" href="{{asset('admin/categories/show')}}">Danh mục</a>
                @endcan
                @can('product-list')
                    <a class="collapse-item product_active" href="{{asset('admin/products/show')}}">Sản phẩm</a>
                @endcan
                @can('combo-list')
                    <a class="collapse-item combo_active" href="{{ route('combo.index') }}">Combo</a>
                @endcan

                @can('order-list')
                    <a class="collapse-item order_active" href="{{ route('order.index') }}">Đơn hàng</a>
                @endcan
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePermission"
            aria-expanded="true" aria-controls="collapsePermission">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Tài khoản</span>
        </a>
        <div id="collapsePermission" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">List:</h6>
                @can('user-list')
                    <a class="collapse-item user_active" href="{{ asset('admin/users/index') }}">Nhân viên</a>  
                @endcan
                
                @can('customer-list')
                    <a class="collapse-item customer_active" href="{{ route('customer.index') }}">Khách hàng</a>  
                @endcan
                @can('role-list')
                    <a class="collapse-item role_active" href="{{ asset('admin/roles/index') }}">Vai trò</a>
                @endcan
                @can('permission-add')
                    <a class="collapse-item permission_active" href="{{ asset('admin/permissions/create') }}" >Tạo phân quyền</a>
                @endcan
                {{-- <a class="collapse-item" href="">Logs </a> --}}
            </div>
        </div>
    </li>
    <li class="nav-item active_blogs_sliderbar">
        <a class="nav-link" href="{{asset('admin/blogs/index')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Contact</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Giao diện
    </div>


    @can('blog-list')
        <li class="nav-item active_blogs_sliderbar">
            <a class="nav-link" href="{{asset('admin/blogs/index')}}">
                <i class="fas fa-fw fa-table"></i>
                <span>Blogs</span>
            </a>
        </li>
    @endcan
    @can('setting-list')    
        <li class="nav-item active_settings_sliderbar" >
            <a class="nav-link" href="{{ route('setting.index') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>Setting</span>
            </a>
        </li>
    @endcan
    <li class="nav-item ">
        <a class="nav-link" >
            <i class="fas fa-fw fa-table"></i>
            <span>Image</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
<script src="{{URL::asset('backend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
