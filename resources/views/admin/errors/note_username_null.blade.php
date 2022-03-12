@if(Session::has('username_null'))
    <div  style='color: red; font-weight: bold; font-size: 14px'>{{Session::get('username_null')}} </div>
    {{Session::put('username_null', null)}}
@endif