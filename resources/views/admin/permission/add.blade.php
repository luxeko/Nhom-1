{{-- Các bước để tạo khung trang Dashboard --}}

{{-- Bước 1: @extends('admin/layouts.admin_layout') --}}
@extends('admin/layouts.admin_layout')

{{-- Bước 2: Đặt tên cho title  --}}
@section('title')
    <title>Thêm Permission</title>
@endsection

{{-- Bước 3: Viết code cần show data ở sau thẻ div  --}}
@section('content')
    <!-- code database bắt đầu từ đây  -->
    @include('admin/partials.preloader')
    <div class="container-fluid" id="preloader">
        <div class="">
            <form action="{{ route('permission.store') }}"  method="post" style="width:50%">
                @csrf
                <h2 class="form-title">Thêm Permission</h2>
                
               
                <div class="form-group">
                    <label for="">Chọn Permission</label>
                    <select name='module_parent' class="form-control input-xs" style="width:40%">
                        <option value="">Chọn tên Module</option>
                        @foreach(config('permissions.table_module') as $moduleItem)
                            <option value="{{ $moduleItem }}">
                                {{ $moduleItem }}
                            </option>
                        @endforeach
                        
                    </select>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="card mb-3 md-3 m-2 col-md-12">
                            <div class="row">
                                @foreach(config('permissions.module_select') as $moduleSelectItem)
                                    <div class="col-3 card-body text-primary col-md-3">
                                        <label for="">
                                            <input type="checkbox" name="module_childrent[]" id="" value="{{$moduleSelectItem}}">&nbsp; 
                                            {{ $moduleSelectItem }}
                                        </label>
                                    </div>                       
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
               
        
                <div class="form-group">
                    <button class="btn btn-primary">Thêm Permission</button>
                    <a href="{{ asset('admin/categories/show')}}" class="btn btn-secondary">Huỷ</a>
                </div>
            </form>
        </div>
    </div>
    <!-- kết thúc code ở đây  -->
@endsection
<script src="{{URL::asset('backend/vendor/jquery/jquery.min.js')}}"></script>
<script type='text/javascript' src="{{URL::asset('backend/js/permission/main.js')}}"></script>
