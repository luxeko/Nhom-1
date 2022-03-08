{{-- Các bước để tạo khung trang Dashboard --}}

{{-- Bước 1: @extends('admin/layouts.admin_layout') --}}
@extends('admin/layouts.admin_layout')

{{-- Bước 2: Đặt tên cho title  --}}
@section('title')
    <title>Setting</title>
@endsection

{{-- Bước 3: Viết code cần show data ở sau thẻ div  --}}
@section('content')
    @include('admin/partials.preloader')
    <div class="container-fluid" id="preloader">
        <!-- code database bắt đầu từ đây  -->
        <div class="d-flex bg-light justify-content-between mb-3">
            <h2 class="border-bottom border-secondary">Danh sách Setting</h2>
        </div>            
        <div class="d-flex justify-content-between mb-2">   
            <div>
                @can('setting-add')
                    <a href="{{ asset('admin/settings/create') }} " class="btn btn-primary mb-3">Thêm Setting</a>
                @endcan
            </div>            
        </div>

        @php             
            $success = Session::get('success_setting');
            if($success){
                echo "<div class='alert alert-success' id='setting_alert'>";
                    echo $success;
                    Session::put('success_setting', null);
                echo "</div>";
            }
        @endphp
        <div class="text-dark font-weight-bold">Có {{ $data->count() }} kết quả / trang</div>
        <table class="table table-hover table-bordered shadow-lg" id="dataTable" width="100%" cellspacing="0">
            <thead class="thead-dark ">
                <tr >
                    <th colspan="1" class="text-center" style="width:5%">STT</th>
                    <th class="text-center" >Name</th>
                    <th class="text-center" >Link</th>
                    <th class="text-center" >Thao tác</th>
                </tr>
            </thead> 
            <tbody> 
                @if(!empty($data) && $data->count() > 0)
                    @foreach ($data as $key => $value)
                        <tr>
                            <td colspan="1" class="text-center" style="width:5%">{{ ( $currentPage - 1 ) * $perPage + $key + 1 }}</td>
                            <td class="text-center text-dark font-weight-bold">{{$value->name}}</td>
                            <td class="">{{$value->link}}</td>
                            <td class="text-center">
                                @can('setting-edit')
                                    <a href="{{ Route('setting.edit', ['id'=>$value->id])}}" class="btn btn-success"><i class="fas fa-pencil-alt"></i></a>
                                @endcan
                                @can('setting-delete')
                                    <a class="btn btn-danger action_delete" data-url="{{Route('setting.delete', ['id'=>$value->id])}}"><i class="fas fa-trash-alt"></i></a>
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
            @if (!empty($data))
                {!! $data->links() !!}
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
<script type='text/javascript' src="{{URL::asset('backend/js/setting/main.js')}}"></script>
