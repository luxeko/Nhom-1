{{-- Các bước để tạo khung trang Dashboard --}}

{{-- Bước 1: @extends('admin/layouts.admin_layout') --}}
@extends('admin/layouts.admin_layout')

{{-- Bước 2: Đặt tên cho title  --}}
@section('title')
    <title>Cập nhật Category</title>
@endsection

{{-- Bước 3: Viết code cần show data ở sau thẻ div  --}}
@section('content')
    <!-- code database bắt đầu từ đây  -->
    @include('admin/partials.preloader')
    <div class="container-fluid" id="preloader">
        <div class="">
            <form action="{{ route('category.update', ['id'=>$category->id]) }}" method="post" style="width:50%">
                @csrf
                <h2 class="form-title">Cập nhật Category</h2>
                <div class="form-group" style="width:100%">
                    <input  type="text" class="form-control form-control-sm py-4 px-3 mb-1" name="category_name" style="width: 100%;" placeholder="Tên danh mục" value="{{$category->name}}" />
                </div>
                @php         
                    $name_undefined = Session::get('name_undefined');
                    if($name_undefined){
                        echo "<div class='alert alert-danger'>";
                            echo $name_undefined;
                        echo "</div>";
                        Session::put('name_undefined', null);
                    }
                @endphp
                <div class="form-group">
                    <textarea class="form-control" name="category_desc" style="resize: none; height: 140px;" placeholder="Miêu tả">{{$category->desc_name}}</textarea>
                </div>
                @php         
                    $desc_null = Session::get('desc_null');
                    if($desc_null){
                        echo "<div class='alert alert-danger'>";
                            echo $desc_null;
                        echo "</div>";
                        Session::put('desc_null', null);
                    }
                @endphp
                <div class="form-group">
                    <select name='parent_id' class="form-control input-xs" style="width:40%" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                        <option value="0"> Chọn danh mục cha </option>
                        {!! $htmlOption !!}
                    </select>
                </div>
                <div class="form-group">
                    <select name="status" class="form-control input-xs" style="width:30%">
                        @if($product->status == 1)
                            <option value=""> Trạng thái </option>
                            <option selected value="1"> Active </option>
                            <option value="2"> Disable </option>
                        @endif
                        @if($product->status == 2)
                            <option value=""> Trạng thái </option>
                            <option value="1"> Active </option>
                            <option selected value="2"> Disable </option>
                        @endif
                        @if($product->status == "")
                        <option value=""> Trạng thái </option>
                            <option value="1"> Active </option>
                            <option value="2"> Disable </option>
                        @endif
                </select>
                    </select>
                </div>
                @php         
                    $status_null = Session::get('status_null');
                    if($status_null){
                        echo "<div class='alert alert-danger'>";
                            echo $status_null;
                        echo "</div>";
                        Session::put('status_null', null);
                    }
                @endphp
                <div class="form-group">
                    <button class="btn btn-primary">Cập nhật</button>
                    <a href="{{ asset('admin/categories/show')}}" class="btn btn-secondary">Huỷ</a>
                </div>
            </form>
        </div>
    </div>
    <!-- kết thúc code ở đây  -->
@endsection
<script src="{{URL::asset('backend/vendor/jquery/jquery.min.js')}}"></script>
<script type='text/javascript' src="{{URL::asset('backend/js/category/main.js')}}"></script>

