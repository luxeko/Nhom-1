{{-- Các bước để tạo khung trang Dashboard --}}

{{-- Bước 1: @extends('admin/layouts.admin_layout') --}}
@extends('admin/layouts.admin_layout')

{{-- Bước 2: Đặt tên cho title  --}}
@section('title')
    <title>Danh mục</title>
@endsection

{{-- Bước 3: Viết code cần show data ở sau thẻ div  --}}
@section('content')
    @include('admin/partials.preloader')
    <div class="container-fluid" id="preloader">
        <!-- code database bắt đầu từ đây  -->
        <div class="d-flex bg-light justify-content-between mb-3">
            <h2>Bảng danh sách danh mục</h2>
            <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Tìm kiếm</button>
            </form>
        </div>            
        <div class="d-flex justify-content-between">    
            <div>
                <a href="{{ asset('admin/categories/create') }} " class="btn btn-primary mb-3">Thêm danh mục</a>
            </div>
            <div> 
                <form class="form-inline">
                    <div class="d-flex flex-row form-group mr-sm-4">
                        <button class="btn btn-success">Lọc <i class="fas fa-filter"></i></button>
                    </div>
                    <div class="d-flex flex-row form-group mr-sm-4">
                    
                        <select  class="form-control input-xs"  name="" >
                            <option value="">Giá tiền</option>
                            <option value="">Thấp đến cao</option>
                            <option value="">Cao đến thấp</option>
                        </select>
                    </div>
                    <div class="d-flex flex-row mr-sm-4">
                  
                        <select name="category_filter" class="form-control input-xs">
                            <option value=""> Danh mục </option>
                            {{-- {!! $htmlOption !!} --}}
                        </select>
                    </div>
                    <div class="d-flex flex-row">
                
                        <select  class="form-control input-xs"  name="" >
                            <option value="">Status</option>
                            <option value="1">Active</option>
                            <option value="2">Disable</option>
                        </select>
                    </div>
                </form>
            </div>
           
        </div>

        @php             
            $success = Session::get('success_category');
            if($success){
                echo "<div class='alert alert-success' id='category_alert' role='alert'>";
                    echo $success;
                    Session::put('success_category', null);
                echo "</div>";
            }
        @endphp
        <table class="table table-striped table-hover table-bordered shadow-lg" id="dataTable" width="100%" cellspacing="0">
            <thead class="thead-dark ">
                <tr >
                    <th colspan="1" class="text-center" style="width:5%">STT</th>
                    <th class="text-center" >Tên</th>
                    <th class="text-center" >Miêu tả</th>
                    <th class="text-center" >Status</th>
                    <th class="text-center" >Ngày tạo</th>
                    <th class="text-center" >Thao tác</th>
                </tr>
            </thead> 
            <tbody> 
                @if(!empty($all_category) && $all_category->count() > 0)
                        @foreach ($all_category as $key => $value)
                            <tr>
                                <td colspan="1" class="text-center" style="width:5%">{{ ( $currentPage - 1 ) * $perPage + $key + 1 }}</td>
                                <td class="text-center">{{$value->name}}</td>
                                <td class="text-center">{{$value->desc_name}}</td>
                                <td class="text-center">
                                    <?php
                                        if($value->status == 1){
                                            echo "<span class='text-success'>Active</span>";
                                        } else {
                                            echo "<span class='text-danger'>Disable</span>";
                                        }   
                                    ?>
                                </td>
                                <td class="text-center">{{date('d-m-Y', strtotime($value->created_at))}}</td>
                                <td class="text-center">
                                    <a href="{{ Route('category.edit', ['id'=>$value->id])}}" class="btn btn-success"><i class="fas fa-pencil-alt"></i></a>
                                    {{-- <a onclick="return confirm('Bạn có chắc muốn xoá bản ghi không?')" href="{{ Route('category.delete', ['id'=>$value->id])}}" class="btn btn-danger">Xoá</a> --}}
                                    <a class="btn btn-danger action_delete" data-url="{{Route('category.delete', ['id'=>$value->id])}}"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                @else
                    <tr>
                        <td class="text-center text-danger" colspan="10">Chưa có dữ liệu</td>
                    </tr>
                @endif
            </tbody>                
        </table>
        <div class="d-flex justify-content-center">
            {!! $all_category->links() !!}
        </div>
        <style>
            .w-5{
                display: none;
            }
        </style>
        <!-- kết thúc code ở đây  -->   
    </div>
@endsection
<script src="{{URL::asset('backend/vendor/jquery/jquery.min.js')}}"></script>
<script type="text/javascript" src={{URL::asset('backend/js/actionDelete.js')}}></script>
<script type='text/javascript'>
    $(document).ready(function(){
        $('#collapseOne').addClass('show');
        $('.category_active').addClass('active');
        $("#category_alert").show().delay(5000).fadeOut();
    });
</script>
