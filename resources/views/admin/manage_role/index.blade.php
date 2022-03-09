{{-- Các bước để tạo khung trang Dashboard --}}

{{-- Bước 1: @extends('admin/layouts.admin_layout') --}}
@extends('admin/layouts.admin_layout')

{{-- Bước 2: Đặt tên cho title  --}}
@section('title')
    <title>Vai trò</title>
@endsection
{{-- Bước 3: Viết code cần show data ở sau thẻ div  --}}
@section('content')
    @include('admin/partials.preloader')
    <div class="container-fluid" id="preloader">
        <!-- code database bắt đầu từ đây  -->
        <div class="d-flex bg-light justify-content-between mb-3">
            <h2>Danh sách vai trò</h2>
            
        </div>
        <div class="d-flex justify-content-between mb-3">    
            <div>
                @can('role-add')
                    <a href="{{ asset('admin/roles/create') }} " class="btn btn-primary">Thêm vai trò</a>
                @endcan
            </div>    
            {{-- <form action=" "  class="form-inline mb-3">
                <div class="form-group">
                    <input class="form-control input-xs mr-sm-2" type="text" id="search" name="search" placeholder="Search">
                </div>
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Tìm kiếm</button>      
            </form>  --}}
        </div>
        
        @php             
            $success = Session::get('success_role');
            if($success){
                echo "<div class='alert alert-success' id='role_alert' >";
                    echo $success;
                    Session::put('success_role', null);
                echo "</div>";
            }
        @endphp
        <div id="table_data">
            <div class="text-dark font-weight-bold">Có {{ $data->count() }} kết quả / trang</div>
            <table class="table table-hover table-bordered shadow-lg" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark ">
                    <tr>
                        <th colspan="1" class="text-center" style="width:5%">STT</th>
                        <th class="text-center">Tên</th>
                        <th class="text-center">Mô tả</th>
                        <th class="text-center">Thao tác</th>
                    </tr>
                </thead> 
                <tbody id="list-blog">
                    @if(!empty($data) && $data->count()>0)
                        @foreach ($data as $key => $value)                         
                            <tr>
                                <th colspan='1' class='text-center' style='width:5%'>{{ ( $currentPage - 1 ) * $perPage + $key + 1 }}</th>
                                <td class="text-dark font-weight-bold">{{$value->name}}</td>
                                <td class="">{{$value->desc_name}}</td>
                                <td colspan="1" class="text-center" style="width:15%">
                                    @can('role-edit')
                                        <a href="{{ Route('role.edit', ['id'=>$value->id]) }}" class="btn btn-success"><i class="fas fa-pencil-alt"></i></a>
                                    @endcan
                                    @can('role-delete')
                                        <a data-url="{{Route('role.delete', ['id'=>$value->id])}}" class="btn btn-danger action_delete"><i class="fas fa-trash-alt"></i></a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td class="text-center text-danger" colspan="12">Chưa có dữ liệu</td>
                        </tr>
                    @endif
                    
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {!! $data->links() !!}
            </div>
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
<script src="{{URL::asset('backend/js/role/main.js')}}"></script>




