{{-- Các bước để tạo khung trang Dashboard --}}

{{-- Bước 1: @extends('admin/layouts.admin_layout') --}}
@extends('admin/layouts.admin_layout')

{{-- Bước 2: Đặt tên cho title  --}}
@section('title')
    <title>Category</title>
@endsection

{{-- Bước 3: Viết code cần show data ở sau thẻ div  --}}
@section('content')
    @include('admin/partials.preloader')
    <div class="container-fluid" id="preloader">
        <!-- code database bắt đầu từ đây  -->
        <div class="d-flex bg-light justify-content-between mb-3">
            <h2 class="border-bottom border-secondary">Danh sách Category</h2>
        </div>            
        <div class="d-flex justify-content-between mb-2">   
            <div>
                @can('category-add')
                    <a href="{{ asset('admin/categories/create') }} " class="btn btn-primary mb-3">Thêm Category</a>
                @endcan
            </div> 
            <form action="{{  route('category.search') }}" method="get" class="form-inline">
                <div class="form-group">
                    <input value="{{ isset($search) ? $search : '' }}" class="form-control mr-sm-2" name="search" type="search" placeholder="Tên category" aria-label="Search">
                </div>
                <div class="form-group">
                    <select class="form-control input-xs mr-sm-2" name="status_filter" >
                        <option value="">Chọn status </option>
                        @if(isset($status)  && $status == 1)
                            <option selected value="1">Active</option>
                            <option value="2">Disable</option>
                        @endif
                        @if(isset($status) && $status == 2)
                            <option value="1">Active</option>
                            <option selected value="2">Disable</option>
                        @endif
                        @if(empty($status))
                            <option value="1">Active</option>
                            <option value="2">Disable</option>
                        @endif
                    </select>
                </div>
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Tìm kiếm</button>
            </form>
            
        </div>

        @php             
            $success = Session::get('success_category');
            if($success){
                echo "<div class='alert alert-success' id='category_alert'>";
                    echo $success;
                    Session::put('success_category', null);
                echo "</div>";
            }
        @endphp
        <div class="text-dark font-weight-bold">Có {{ $all_category->count() }} kết quả / trang</div>
        <table class="table table-hover table-bordered shadow-lg" id="dataTable" width="100%" cellspacing="0">
            <thead class="thead-dark ">
                <tr >
                    <th colspan="1" class="text-center" style="width:5%">STT</th>
                    <th class="text-center" >Tên</th>
                    <th class="text-center" >Miêu tả</th>
                    <th class="text-center" >Status</th>
                    <th class="text-center" >Ngày thêm vào</th>
                    <th class="text-center" >Thao tác</th>
                </tr>
            </thead> 
            <tbody> 
                @if(!empty($all_category) && $all_category->count() > 0)
                    @foreach ($all_category as $key => $value)
                        <tr>
                            <td colspan="1" class="text-center" style="width:5%">{{ ( $currentPage - 1 ) * $perPage + $key + 1 }}</td>
                            <td class="text-dark font-weight-bold">{{$value->name}}</td>
                            <td class="">{{$value->desc_name}}</td>
                            <td class="text-center">
                                <?php
                                    if($value->status == 1){
                                        echo "<span class='badge bg-success  p-2 text-white'>Active</span>";
                                    } else {
                                        echo "<span class='badge bg-danger  p-2 text-white'>Disable</span>";
                                    }   
                                ?>
                            </td>
                            <td class="text-center">{{date('d-m-Y', strtotime($value->created_at))}}</td>
                            <td class="text-center">
                                @can('category-edit')
                                    <a href="{{ Route('category.edit', ['id'=>$value->id])}}" class="btn btn-success"><i class="fas fa-pencil-alt"></i></a>
                                @endcan
                                @can('category-delete')
                                    <a class="btn btn-danger action_delete" data-url="{{Route('category.delete', ['id'=>$value->id])}}"><i class="fas fa-trash-alt"></i></a>
                                @endcan
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
            @if (!empty($all_category))
                {!! $all_category->links() !!}
            @endif  
            
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
<script type='text/javascript' src="{{URL::asset('backend/js/category/main.js')}}"></script>
