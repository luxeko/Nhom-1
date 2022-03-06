<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <base href="{{asset('public/backend')}}/">
    <script src="https://kit.fontawesome.com/64d58efce2.js"></script>
    <link rel="stylesheet" href="{{ URL::asset('/backend/css/admin.css'); }}">
    <link rel="stylesheet" href="{{ URL::asset('/backend/css/admin.css'); }}">
    <link rel="icon" href="{{ URL::asset('/frontend/img/logoteam.png'); }}">
</head>
<body>
    <div class="admin_container">
        <div class="forms-container">
            <div class="signin-signup">
                <!-- form đăng nhập  -->
                <form action="{{ route('admin.login') }}" method="post" class="sign-in-form">
                    @csrf
                    @php             
                        $not_admin = Session::get('not_admin');
                        echo "<div style='color: red; font-weight: bold; font-size: 14px'>";
                            if($not_admin){
                                echo $not_admin;
                                Session::put('not_admin', null);
                            }
                        echo "</div>";
                    @endphp
                    @include('admin/errors.note_not_loged')
                    @include('admin/errors.note_login_faild')
                    <h2 class="title">Admin login</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="admin_email" placeholder="Email" value="{{old('admin_email')}}"/>
                    </div>
                    @include('admin/errors.note_username_null')
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="admin_password" placeholder="Password" value="{{old('admin_password')}}"/>
                    </div>
                    @include('admin/errors.note_password_null')
                    <div class="checkbox-field">
                        <div class="checkbox-children">
                            <input type="checkbox" id="remember_admin" name="remember">
                        <label for="remember_admin">Remember me</label>
                        </div>
                    </div>
                    <button type="submit" name="loginadmin" class="btn solid">Đăng nhập</button>
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <img src="{{ URL::asset('/frontend/img/new2.png')}}">
                    <p>
                       <i>"Dao có mài mới sắc, người có học mới nên. Dốt đến đâu học lâu cũng biết."</i> 
                    </p>
                </div>
                <img src="{{ URL::asset('/backend/img/log.svg')}}" class="image"/>
            </div>
        </div>
    </div>
    <script src="{{ URL::asset('/backend/js/jquery-3.6.0.min.js')}}"></script>
</body>
</html>