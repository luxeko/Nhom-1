<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{asset('admin/home')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">NZXT</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li id="dashboard_active" class="nav-item">
        <a class="nav-link " href="{{asset('admin/home')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Tổng quan</span></a>
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
            <span>Category/Product</span>
        </a>
        <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Categories:</h6>
                <a class="collapse-item category_active" href="{{asset('admin/categories/show')}}">List danh mục</a>
                <a class="collapse-item product_active" href="{{asset('admin/products/show')}}">List sản phẩm</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Combo PC</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Combo PC:</h6>
                <a class="collapse-item foundation_active" href="{{asset('admin/combos/foundation')}}">Foundation PC</a>
                <a class="collapse-item creatorPC_active" href="">Creator PC</a>
                <a class="collapse-item streaming_active" href="">Streaming PC</a>
                <a class="collapse-item startPc_active" href="">Start PC </a>
            </div>
        </div>
    </li>
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePermission"
            aria-expanded="true" aria-controls="collapsePermission">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Accounts</span>
        </a>
        <div id="collapsePermission" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">List:</h6>
                <a class="collapse-item user_active" href="{{ asset('admin/users/index') }}">Quản lý user</a>
                <a class="collapse-item role_active" href="{{ asset('admin/roles/index') }}" >Danh sách vai trò</a>
                <a class="collapse-item" href="">Logs </a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Giao diện
    </div>


    <li class="nav-item active_blogs_sliderbar">
        <a class="nav-link" href="{{asset('admin/blogs/index')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Blogs</span>
        </a>
    </li>
    <li class="nav-item active_discount_sliderbar">
        <a class="nav-link" href="">
            <i class="fas fa-fw fa-table"></i>
            <span>Sliders</span>
        </a>
    </li>
    <li class="nav-item active_discount_sliderbar">
        <a class="nav-link" href="">
            <i class="fas fa-fw fa-table"></i>
            <span>Voucher</span>
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