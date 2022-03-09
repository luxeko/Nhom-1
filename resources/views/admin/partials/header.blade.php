<!-- Topbar -->
<nav class="header_admin navbar navbar-expand navbar-light  topbar mb-4 static-top shadow">
    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>
    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
        <li class="d-flex align-items-center justify-content-center">
            <div class="mr-2 d-none d-lg-inline text-white" id="getTCurrentTime"></div>
        </li>
        <div class="topbar-divider d-none d-sm-block"></div>
        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-white small">
                    {{ auth()->user()->full_name }}
                </span>
                <img class="img-profile rounded-circle" src="{{ auth()->user()->avatar_img_path }}">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('admin.profile',['id'=>auth()->user()->id] ) }}" >

                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Hồ sơ
                </a>
                {{-- <a class="dropdown-item" href="#">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    Lịch sử hoạt động
                </a> --}}
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-list fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Đăng xuất
                </a>
            </div>
        </li>
    </ul>
</nav>
<!-- End of Topbar -->
<script src="{{URL::asset('backend/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{URL::asset('backend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script>
    $(document).ready(function(){
        currentTime = function()
        {
            var date = new Date(); // today
            console.log(date);
            var thisday=date.getDay();
            var thismonth=date.getMonth();
            var thisdate=date.getDate();
            var thisyear=date.getFullYear();
            var thisminute = String(date.getMinutes()).padStart(2, "0");
            var thishour = date.getHours();
            var thisseconds = String(date.getSeconds()).padStart(2, "0");
            var months = new Array("Tháng Một", "Tháng Hai", "Tháng Ba", "Tháng Tư", "Tháng Năm", "Tháng Sáu", "Tháng Bảy", "Tháng Tám", "Tháng Chín", "Tháng Mười", "Tháng Mười Một", "Tháng Mười Hai");
            var name_of_days = new Array("Chủ nhật", "Thứ Hai", "Thứ Ba", "Thứ Tư", "Thứ Năm", "Thứ Sáu"+"'"+"at", "Thứ Bảy");
            var day_name = name_of_days[thisday];
            var monthname = months[thismonth];
            var time = day_name+", "+thisdate+" "+monthname+" "+thisyear +', '+ thishour+': '+ thisminute+': ' +thisseconds;

            document.getElementById('getTCurrentTime').innerHTML = time;
        }

        show = function() {
            currentTime();
        }
        show();
        loadTime = function(){
            currentTime();
            setTimeout(loadTime, 1)
        }
        loadTime();
    })
</script>