<!DOCTYPE html>
{{-- Các bước để tạo khung trang Dashboard --}}

{{-- Bước 1: @extends('admin/layouts.admin_layout') --}}
@extends('admin/layouts.admin_layout')

{{-- Bước 2: Đặt tên cho title  --}}
@section('title')
    <title>Thêm vai trò</title>
@endsection

{{-- Bước 3: Viết code cần show data ở sau thẻ div  --}}
@section('content')
    <!-- code database bắt đầu từ đây  -->
    @include('admin/partials.preloader')
    <div class="container-fluid" id="preloader">
        <h2 class="form-title">Thêm vai trò</h2>
        <form action="{{ URL::to('admin/roles/store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group" style="width:100%">
                        <input type="text" class="form-control form-control-sm py-4 px-3 mb-1" name="name" style="width: 100%;" placeholder="Tên" value="{{ old('name') }}" />
                    </div>
                    @php         
                        $err_name = Session::get('err_name');
                        if($err_name){
                            echo "<div class='alert alert-danger'>";
                                echo $err_name;
                            echo "</div>";
                            Session::put('err_name', null);
                        }
                    @endphp
                    
                    <div class="form-group" style="width:100%">
                        <textarea class="form-control" name="desc_name" style="resize: none; height: 140px;" placeholder="Miêu tả"></textarea>
                    </div>
                    @php         
                        $err_desc = Session::get('err_desc');
                        if($err_desc){
                            echo "<div class='alert alert-danger'>";
                                echo $err_desc;
                            echo "</div>";
                            Session::put('err_desc', null);
                        }
                    @endphp
                
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="card border-primary mb-3 md-3 col-md-12">
                            <div class="card-header">
                                <label >
                                    <input type="checkbox" value="">
                                </label>
                                Module sản phẩm
                            </div>
                            <div class="row">
                                @for($i = 1; $i <= 4; $i++)
                                <div class="card-body text-primary col-md-3"  >
                                    <h5 class="card-title">
                                        <label >
                                            <input type="checkbox" value="">
                                        </label>
                                        Thêm sản phẩm
                                    </h5>
                                </div>
                                @endfor

                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <button class="btn btn-primary">Thêm vai trò</button>
                        <a href="{{ asset('admin/blogs/index')}}" class="btn btn-secondary">Huỷ</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- kết thúc code ở đây  -->
@endsection
<script src="{{URL::asset('backend/vendor/jquery/jquery.min.js')}}"></script>
<script type='text/javascript'>
    $(document).ready(function(){
        $('#collapsePermission').addClass('show');
        $('.role_active').addClass('active');
    });
</script>




