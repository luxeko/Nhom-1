@if(Session::has('checklogedout'))
    <div  style='color: red; font-weight: bold; font-size: 14px'>{{Session::get('checklogedout')}} </div>
    {{Session::put('checklogedout', null)}}
@endif