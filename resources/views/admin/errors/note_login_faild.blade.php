@if(!Session::has('username_null') && !Session::has('password_null')    )
    <div  style='color: red; font-weight: bold; font-size: 14px'>{{Session::get('login_faild')}} </div>
    {{Session::put('login_faild', null)}}
@endif  