{{-- Các bước để tạo khung trang Dashboard --}}

{{-- Bước 1: @extends('admin/layouts.admin_layout') --}}
@extends('admin/layouts.admin_layout')

{{-- Bước 2: Đặt tên cho title  --}}
@section('title')
    <title>Discount</title>
@endsection

{{-- Bước 3: Viết code cần show data ở sau thẻ div  --}}
@section('content')
@include('admin/partials.preloader')
    <div class="container-fluid" id="preloader">
        <!-- code database bắt đầu từ đây  -->
        <div class="d-flex bg-light justify-content-between mb-3">
            <h2>Bảng danh sách Discount</h2>
            <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Tìm kiếm</button>
            </form>
        </div>
        
        
        <!-- button to add admin  -->
        <a href="{{ route('discount.create') }} " class="btn btn-primary mb-3">Thêm discount</a>
        @php             
            $success = Session::get('success_discount');
            if($success){
                echo "<div class='alert alert-success' role='alert'>";
                    echo $success;
                    Session::put('success_discount', null);
                echo "</div>";
            }
        @endphp
        <table class="table table-striped table-hover table-bordered shadow-lg" id="dataTable" width="100%" cellspacing="0">
            <thead class="thead-dark ">
                <tr >
                    <th colspan="1" class="text-center" style="width:5%">STT</th>
                    <th class="text-center">Tên</th>
                    <th class="text-center">Miêu tả</th>
                    <th class="text-center">Discount Percent</th>
                    <th class="text-center">Ngày bắt đầu</th>
                    <th class="text-center">Ngày kết thúc</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Thao tác</th>
                </tr>
            </thead> 
            <tbody> 
                @if(!empty($all_discount) && $all_discount->count() > 0)
                    @foreach ($all_discount as $key => $value)                         
                        <tr>
                            <th colspan="1" class="text-center" style="width:5%">{{ ( $currentPage - 1 ) * $perPage + $key + 1 }}</th>
                            <td class="text-center">{{$value->name}}</td>
                            <td class="text-center">{{$value->desc}}</td>
                            <td class="text-center">{{$value->discount_percent}}%</td>
                            <td class="text-center">{{date('d-m-Y', strtotime($value->created_at))}}</td>
                            <td class="text-center">{{date('d-m-Y', strtotime($value->date_end))}}</td>
                            <td class="text-center">
                                @if ($value->status == 'Active')
                                    <span class="text-success">{{$value->status}}</span>
                                @else
                                    <span class="text-danger">{{$value->status}}</span>
                                @endif
                            </td>
                            <td colspan="1" class="text-center" style="width:15%">
                                <a href="{{ Route('discount.edit', ['id'=>$value->id])}}" class="btn btn-success"><i class="fas fa-pencil-alt"></i></a>
                                <a data-url="{{ Route('discount.delete', ['id'=>$value->id])}}" class="btn btn-danger action_delete"><i class="fas fa-trash-alt"></i></a>
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
            {!! $all_discount->links() !!}
        </div>
        <style>
            .w-5{
                display: none;
            }
        </style>
        <!-- kết thúc code ở đây  -->   
    </div>
@endsection

<script type="text/javascript" src={{URL::asset('backend/js/actionDelete.js')}}></script>
<script type="text/javascript" src="{{URL::asset('backend/vendor/jquery/jquery.min.js')}}"></script>
<script type='text/javascript'>
    $(document).ready(function(){
        $('.active_discount_sliderbar').addClass('active');
    });
</script>