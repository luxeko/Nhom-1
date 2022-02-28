{{-- Các bước để tạo khung trang Dashboard --}}

{{-- Bước 1: @extends('admin/layouts.admin_layout') --}}
@extends('admin/layouts.admin_layout')

{{-- Bước 2: Đặt tên cho title  --}}
@section('title')
    <title>404 Error</title>
@endsection

{{-- Bước 3: Viết code cần show data ở sau thẻ div  --}}
@section('content')
    <div class="container-fluid">
        <!-- code database bắt đầu từ đây  -->
        <div class="container-fluid">
            <!-- 404 Error Text -->
            <div class="text-center">
                <div class="error mx-auto" data-text="404">404</div>
                <p class="lead text-gray-800 mb-5">Page Not Found</p>
                <p class="text-gray-500 mb-0">Lỗi hệ thống  </p>
                <a href="{{asset('admin/home')}}">&larr; Back to Dashboard</a>
            </div>

        </div>
        <!-- kết thúc code ở đây  -->
    </div>
    
@endsection
