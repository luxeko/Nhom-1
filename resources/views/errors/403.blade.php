{{-- Các bước để tạo khung trang Dashboard --}}

{{-- Bước 1: @extends('admin/layouts.admin_layout') --}}
@extends('admin/layouts.admin_layout')

{{-- Bước 2: Đặt tên cho title  --}}
@section('title')
    <title>403 Error</title>
@endsection

{{-- Bước 3: Viết code cần show data ở sau thẻ div  --}}
@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <!-- code database bắt đầu từ đây  -->
                <!-- 403 Error Text -->
                <div class="text-center">
                        <div class="error mx-auto" data-text="403">403</div>
                        <p class="lead text-gray-800 ">Lỗi truy cập</p>
                        <p style="max-width:22%" class="border border-warning shadow-lg p-3 rounded container bg-danger text-white mb-3">Bạn không được phép xem trang này.</p>
                        <a href="{{asset('admin/home')}}">&larr; Quay trở lại Dashboard</a>
                </div>           
            <!-- kết thúc code ở đây  -->
        </div>
    </div>
@endsection
<script src="{{URL::asset('backend/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{URL::asset('backend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
