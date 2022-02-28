@if(Session::has('password_null'))
    <div style='color: red; font-weight: bold; font-size: 14px'>{{Session::get('password_null')}} </div>
    {{Session::put('password_null', null)}}
@endif
