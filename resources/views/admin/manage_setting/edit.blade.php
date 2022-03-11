<!DOCTYPE html>
{{-- Các bước để tạo khung trang Dashboard --}}

{{-- Bước 1: @extends('admin/layouts.admin_layout') --}}
@extends('admin/layouts.admin_layout')

{{-- Bước 2: Đặt tên cho title  --}}
@section('title')
    <title>Cập nhật Setting</title>
@endsection

{{-- Bước 3: Viết code cần show data ở sau thẻ div  --}}
@section('content')
    <!-- code database bắt đầu từ đây  -->
    @include('admin/partials.preloader')
    <div class="container-fluid" id="preloader">
        <form action="{{ route('setting.update', ['id'=>$setting->id]) }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Cập nhật Setting</h3>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="form-group mb-3" style="width:100%">
                                    <input type="text" class="form-control " name="name" style="width: 100%;" placeholder="Name" value="{{ $setting->name }}" />
                                </div>
                                @php         
                                    $name_null = Session::get('name_null');
                                    if($name_null){
                                        echo "<div class='alert alert-danger'>";
                                            echo $name_null;
                                        echo "</div>";
                                        Session::put('name_null', null);
                                    }
                                @endphp
                                <div class="form-group mb-3" style="width:100%">
                                    <input type="text" class="form-control " name="link" style="width: 100%;" placeholder="Link" value="{{  $setting->link }}" />
                                </div>
                                @php         
                                    $link_null = Session::get('link_null');
                                    if($link_null){
                                        echo "<div class='alert alert-danger'>";
                                            echo $link_null;
                                        echo "</div>";
                                        Session::put('link_null', null);
                                    }
                                @endphp
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-4">
                    <div class="col-md-6 d-flex justify-content-end">
                        <div class="form-group">
                            <button class="btn btn-primary">Cập nhật Setting</button>
                            <a href="{{ asset('admin/settings/index')}}" class="btn btn-secondary">Huỷ</a>
                        </div>
                    </div>
                </div>              
            </div>
        </form>
    </div>
    <!-- kết thúc code ở đây  -->
@endsection
<script src="{{URL::asset('backend/vendor/jquery/jquery.min.js')}}"></script>
<script type="text/javascript" src={{URL::asset('backend/js/actionDelete.js')}}></script>
<script type='text/javascript' src="{{URL::asset('backend/js/setting/main.js')}}"></script>



