<!DOCTYPE html>
{{-- Các bước để tạo khung trang Dashboard --}}

{{-- Bước 1: @extends('admin/layouts.admin_layout') --}}
@extends('admin/layouts.admin_layout')

{{-- Bước 2: Đặt tên cho title  --}}
@section('title')
    <title>Thêm User</title>
@endsection

{{-- Bước 3: Viết code cần show data ở sau thẻ div  --}}
@section('content')
    <!-- code database bắt đầu từ đây  -->
    @include('admin/partials.preloader')
    <div class="container-fluid" id="preloader">
        <h2 class="form-title">Thêm User</h2>
        <hr>
        <form action="{{ URL::to('admin/users/store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 ">
                    <div class="form-group mb-3" style="width:100%">
                        <input type="text" class="form-control " name="full_name" style="width: 100%;" placeholder="Full name" value="{{old('full_name')}}" />
                    </div>
                    @php         
                        $err_fullname = Session::get('fullname_null');
                        if($err_fullname){
                            echo "<div class='alert alert-danger'>";
                                echo $err_fullname;
                            echo "</div>";
                            Session::put('fullname_null', null);
                        }
                    @endphp
                    <div class="form-group d-flex justify-content-between mb-1" style="width:100%">
                        <div style="width:49%">
                            <div class="form-group" style="width:100%">
                                <input type="text" class="form-control " name="telephone" style="width: 100%;" placeholder="Telephone" value="{{old('telephone')}}"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"/>
                            </div>
                            @php         
                                $err_telephone = Session::get('telephone_null');
                                $duplicate_phone = Session::get('duplicate_phone');
                                if($err_telephone){
                                    echo "<div class='alert alert-danger'>";
                                        echo $err_telephone;
                                    echo "</div>";
                                    Session::put('telephone_null', null);
                                } 
                                if($duplicate_phone){
                                    echo "<div class='alert alert-danger'>";
                                        echo $duplicate_phone;
                                    echo "</div>";
                                    Session::put('duplicate_phone', null);
                                }
                            @endphp
                        </div>
                        <div style="width:49%">
                            <div class="form-group" style="width:100%">
                                <input type="email" class="form-control " name="email" style="width: 100%;" placeholder="Email" value="{{old('email')}}" />
                            </div>
                            @php         
                                $err_email = Session::get('err_email');
                                $duplicate_email = Session::get('duplicate_email');
                                if($err_email){
                                    echo "<div class='alert alert-danger'>";
                                        echo $err_email;
                                    echo "</div>";
                                    Session::put('err_email', null);
                                } 
                                if($duplicate_email){
                                    echo "<div class='alert alert-danger'>";
                                        echo $duplicate_email;
                                    echo "</div>";
                                    Session::put('duplicate_email', null);
                                }
                            @endphp
                        </div>
                    </div>

                   
                    <div class="form-group d-flex justify-content-between mb-1" style="width:100%">
                        <div style="width:49%">
                            <div class="form-group" >
                                <input type="password" class="form-control " name="password" style="width: 100%;" placeholder="Password" value="{{old('password')}}" />
                            </div>
                            @php         
                                $err_password = Session::get('password_null');
                                if($err_password){
                                    echo "<div class='alert alert-danger'>";
                                        echo $err_password;
                                    echo "</div>";
                                    Session::put('password_null', null);
                                }
                            @endphp
                        </div>

                        <div style="width:49%">
                            <div class="form-group" >
                                <input type="password" class="form-control " name="re_password" style="width: 100%;" placeholder="Confirm password" value="{{old('re_password')}}" />
                            </div>
                            @php         
                                $err_confirm_password = Session::get('confirm_password_notEqual');
                                if($err_confirm_password){
                                    echo "<div class='alert alert-danger'>";
                                        echo $err_confirm_password;
                                    echo "</div>";
                                    Session::put('confirm_password_notEqual', null);
                                }
                            @endphp
                        </div>
                    </div>
                    <div class="form-group">
                        <select name="role_id[]" class="form-control role_select2 tags_select_choose" style="width:100%" multiple="multiple">
                            @foreach ($roles as $item)
                                <option value="{{$item->id}}" style="font-size:15px" > {{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="avatar_img_path">Chọn ảnh đại diện <span class="text-danger">(Có thể để trống)</span></label>
                        <input class="form-control-file" type="file" id="avatar_img_path" name="avatar_img_path">
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Bạn có muốn thêm địa chỉ?
                        </label>
                    </div>
                    <div class="address_form">
                        <div class="form-group">
                            <input type="text" class="form-control " name="address_line" style="width: 100%;" placeholder="Địa chỉ" value="{{old('address_line')}}" />
                        </div>
                        <div class="form-group d-flex flex-row justify-content-between" style="width:100%">
                            <div style="width:68%">
                                <select name="city" class="form-control form-control-md  mb-1" style="width:100%">
                                    <option value=""> Thành phố </option>
                                    <option value="1"> Hà Nội </option>
                                    <option value="2"> TP.HCM </option>
                                </select>
                            </div>
                            <div style="width:30%">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-md  mb-1" name="postal_code" style="width: 100%;" placeholder="Postal code" value="{{old('postal_code')}}" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <button class="btn btn-primary">Thêm User</button>
                        <a href="{{ asset('admin/users/index')}}" class="btn btn-secondary">Huỷ</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- kết thúc code ở đây  -->
@endsection
<script src="{{URL::asset('backend/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{URL::asset('backend/js/tags.js')}}"></script>
<script src="{{URL::asset('backend/js/user/main.js')}}"></script>

<script type='text/javascript'>
   
</script>




