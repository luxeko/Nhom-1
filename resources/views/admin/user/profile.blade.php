{{-- Các bước để tạo khung trang Dashboard --}}

{{-- Bước 1: @extends('admin/layouts.admin_layout') --}}
@extends('admin/layouts.admin_layout')

{{-- Bước 2: Đặt tên cho title  --}}
@section('title')
    <title>Trang cá nhân</title>
@endsection
{{-- Bước 3: Viết code cần show data ở sau thẻ div  --}}
@section('content')
    @include('admin/partials.preloader')
    <div class="container-fluid" id="preloader">
        <!-- code database bắt đầu từ đây  -->
        <h2 class="mb-5">Hồ sơ cá nhân</h2>
        @php             
        $success = Session::get('success_user');
        if($success){
            echo "<div class='alert alert-success' id='profile_alert'>";
                echo $success;
                Session::put('success_user', null);
            echo "</div>";
        }
        @endphp
    
        <form action="{{ route('user.profile_update',['id'=>auth()->user()->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="bg-white shadow rounded-lg d-block d-sm-flex">
                <div class="profile-tab-nav border-right px-3 py-4">
                    <div class="mb-5">
                        <div class="img-circle text-center" >
                            <img style="width:100px; height 100px"  src="{{URL::asset($user->avatar_img_path)}}" >
                        </div>
                        <h6 class="pt-4 text-center">{{$user->email}}</h6>
                    </div>
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">
                            <i class="fa fa-home text-center mr-1"></i> 
                            Tài khoản
                        </a>
                        <a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="password" aria-selected="false">
                            <i class="fa fa-key text-center mr-1"></i> 
                            Mật khẩu
                        </a>
                        <a class="nav-link" id="security-tab" data-toggle="pill" href="#security" role="tab" aria-controls="security" aria-selected="false">
                            <i class="fa fa-user text-center mr-1"></i> 
                            Bảo mật
                        </a>
                        {{-- <a class="nav-link" id="notification-tab" data-toggle="pill" href="#notification" role="tab" aria-controls="notification" aria-selected="false">
                            <i class="fa fa-bell text-center mr-1"></i> 
                            Thông báo
                        </a> --}}
                    </div>
                </div>
                <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
                        <h3 class="mb-4">Thay đổi tài khoản</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" class="form-control" name="full_name" value="{{ $user->full_name}}">
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
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phone number</label>
                                    <input type="text" class="form-control" name="telephone" value="{{ $user->telephone}}">
                                </div>
                                @php         
                                    $telephone_null = Session::get('telephone_null');
                                    if($telephone_null){
                                        echo "<div class='alert alert-danger'>";
                                            echo $telephone_null;
                                        echo "</div>";
                                        Session::put('telephone_null', null);
                                    }
                                @endphp
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label label>Địa chỉ</label>
                                    <input type="text" class="form-control " name="address_line" style="width: 100%;" value="{{old('address_line')}}" />
                                </div>
                            </div>
                            <div class="col-md-6 d-flex justify-content-between" >
                                <div class="form-group"  style="width: 60%;" >
                                    <label>Thành phố</label>
                                    <select  name="city" class="form-control form-control-md mb-1" >
                                        <option value=""></option>
                                        <option value="1"> Hà Nội </option>
                                        <option value="2"> TP.HCM </option>
                                    </select>
                                </div>
                                <div class="form-group" style="width: 38%;">
                                    <label>Postal code</label>
                                    <input type="text" class="form-control form-control-md  mb-1" name="postal_code" value="" />
                                </div>
                            </div>
                            <div class="col-md-6 avatar_profile">
                                <div class="form-group">
                                    <label for="avatar_img_path">Ảnh đại diện</label>
                                    <input class="form-control-file " type="file" id="avatar_img_path" name="avatar_img_path">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                        <label>Bio</label>
                                    <textarea  class="form-control" style="resize: none; height: 140px;">Gần mực thì đen, gần em tôi thấy bâng khuâng, bâng khuâng con tim này như chết lặng</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <button class="btn btn-primary profile_update">Cập nhật</button>
                            <a class="btn btn-secondary profile_cancel">Huỷ</a>
                            <a class="btn btn-success profile_edit">Chỉnh sửa</a>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                        <h3 class="mb-4">Thay đổi mật khẩu</h3>
                        <div class="row ">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Mật khẩu mới</label>
                                    <input type="password" class="form-control" id="new_password" name="password">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Xác nhận mật khẩu</label>
                                    <input type="password" class="form-control" id="confirm_password" name="re_password">
                                </div>
                                <div class="" id="message"></div>
                                {{-- @php         
                                $confirm_password_notEqual = Session::get('confirm_password_notEqual');
                                    if($confirm_password_notEqual){
                                        echo "<div class='alert alert-danger' id='password_alert'>";
                                            echo $confirm_password_notEqual;
                                        echo "</div>";
                                        Session::put('confirm_password_notEqual', null);
                                    }
                                @endphp --}}
                            </div>
                        </div>
                        <div class="">
                            <button id="update_password" class="btn btn-primary profile_update">Cập nhật</button>
                            <a class="btn btn-secondary profile_cancel">Huỷ</a>
                            <a  class="btn btn-success profile_edit">Chỉnh sửa</a>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">
                        <h3 class="mb-4">Chỉnh sửa bảo mật</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                        <label>Login</label>
                                        <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                        <label>Two-factor auth</label>
                                        <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="recovery">
                                        <label class="form-check-label" for="recovery">
                                        Recovery
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <button class="btn btn-primary profile_update">Cập nhật</button>
                            <a class="btn btn-secondary profile_cancel">Huỷ</a>
                            <a  class="btn btn-success profile_edit">Chỉnh sửa</a>
                        </div>
                    </div>
                    {{-- <div class="tab-pane fade" id="notification" role="tabpanel" aria-labelledby="notification-tab">
                        <h3 class="mb-4">Notification Settings</h3>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="notification1">
                                <label class="form-check-label" for="notification1">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum accusantium accusamus, neque cupiditate quis
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="notification2" >
                                <label class="form-check-label" for="notification2">
                                    hic nesciunt repellat perferendis voluptatum totam porro eligendi.
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="notification3" >
                                <label class="form-check-label" for="notification3">
                                    commodi fugiat molestiae tempora corporis. Sed dignissimos suscipit
                                </label>
                            </div>
                        </div>
                        <div class="">
                            <a class="btn btn-primary profile_update">Cập nhật</a>
                            <a class="btn btn-secondary profile_cancel">Huỷ</a>
                            <a  class="btn btn-success profile_edit">Chỉnh sửa</a>
                        </div>
                    </div> --}}
                </div>
            </div>
        </form>
    </div>
@endsection
<script src="{{URL::asset('backend/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{URL::asset('backend/js/profile/main.js')}}"></script>
<script>
    function isEmpty(value) {
        return typeof value == 'string' && !value.trim() || typeof value == 'undefined' || value === null;
    }
    $(document).ready(function(){
        $('#new_password, #confirm_password').on('keyup', function () {
            if ($('#new_password').val() == $('#confirm_password').val() ) {
                $('#message').html('Mật khẩu khớp').addClass("alert-success").addClass("alert").removeClass("alert-danger");
            } else {
                $('#message').html('Mật khẩu không khớp').addClass("alert-danger").addClass("alert").removeClass("alert-success");
            }
            if( isEmpty($('#new_password').val()) || isEmpty($('#confirm_password').val())) {
                $('#message').html('').removeClass("alert-danger").removeClass("alert").removeClass("alert-success");
            }
        });
    })
</script>





