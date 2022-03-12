{{-- Các bước để tạo khung trang Dashboard --}}

{{-- Bước 1: @extends('admin/layouts.admin_layout') --}}
@extends('admin/layouts.admin_layout')

{{-- Bước 2: Đặt tên cho title  --}}
@section('title')
    <title>Thêm discount</title>
@endsection

{{-- Bước 3: Viết code cần show data ở sau thẻ div  --}}
@section('content')
    <!-- code database bắt đầu từ đây  -->
    @include('admin/partials.preloader')
    <div class="container-fluid" id="preloader">
        <form action="{{ route('discount.store') }}" method="post" style="width:50%">
            @csrf
            <h2 class="form-title">Thêm Discount</h2>
            <div class="form-group" style="width:100%">
                <input 
                    type="text" 
                    class="form-control form-control-sm py-4 px-3 mb-1 @error('discount_name') is-invalid @enderror" 
                    name="discount_name" 
                    style="width: 100%;" 
                    placeholder="Tên discount" 
                    value="{{old('discount_name')}}" />
            </div>
            @error('discount_name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <input 
                    type="text" 
                    class="form-control form-control-sm py-4 px-3 mb-1 @error('discount_percent') is-invalid @enderror" 
                    name="discount_percent" 
                    placeholder="Phần trăm" 
                    value="{{old('discount_percent')}}">
            </div>
            @error('discount_percent')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <input 
                    type="date" 
                    class="form-control form-control-sm py-4 px-3 mb-1 @error('date_end') is-invalid @enderror" 
                    name="date_end" 
                    placeholder="Ngày kết thúc sự kiện" 
                    value="{{old('date_end')}}">
            </div>
            @php         
                $date_err = Session::get('date_err');
                if($date_err){
                    echo "<div class='alert alert-danger'>";
                        echo $date_err;
                    echo "</div>";
                    Session::put('date_err', null);
                }
            @endphp
            @error('date_end')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <select name="status" class="form-control input-xs @error('status') is-invalid @enderror" style="width:30%">
                    <option value="0"> Trạng thái </option>
                    <option value="active"> Active </option>
                    <option value="disable"> Disable </option>
                </select>
            </div>
            @error('status')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <textarea 
                    class="form-control @error('discount_desc') is-invalid @enderror" 
                    name="discount_desc" 
                    style="resize: none; height: 140px;" 
                    placeholder="Miêu tả">{{old('discount_desc')}}</textarea>
            </div>
            @error('discount_desc')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <button class="btn btn-primary">Thêm sản phẩm</button>
                <a href="{{ route('discount.index')}}" class="btn btn-secondary">Huỷ</a>
            </div>
        </form>
    </div>
    <!-- kết thúc code ở đây  -->
@endsection
<script type="text/javascript" src="{{URL::asset('backend/vendor/jquery/jquery.min.js')}}"></script>
<script type='text/javascript'>
    $(document).ready(function(){
        $('.active_discount_sliderbar').addClass('active');
    });
</script>

