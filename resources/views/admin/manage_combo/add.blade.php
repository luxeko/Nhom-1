<!DOCTYPE html>
{{-- Các bước để tạo khung trang Dashboard --}}

{{-- Bước 1: @extends('admin/layouts.admin_layout') --}}
@extends('admin/layouts.admin_layout')

{{-- Bước 2: Đặt tên cho title  --}}
@section('title')
    <title>Thêm Combo</title>
@endsection

{{-- Bước 3: Viết code cần show data ở sau thẻ div  --}}
@section('content')
    <!-- code database bắt đầu từ đây  -->
    @include('admin/partials.preloader')
    <div class="container-fluid" id="preloader">
        <h2 class="form-title">Thêm Combo</h2>
        <hr>
        <form action="{{ URL::to('admin/combos/store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group" style="width:100%">
                        <input type="text" class="form-control form-control-sm py-4 px-3 mb-1" name="name" style="width: 100%;" placeholder="Tên combo (min: 5)" value="{{old('name')}}" />
                    </div>
                    @php         
                        $err_name = Session::get('combo_name_null');
                        if($err_name){
                            echo "<div class='alert alert-danger'>";
                                echo $err_name;
                            echo "</div>";
                            Session::put('combo_name_null', null);
                        }
                    @endphp
                    <div class="form-group">
                        <input type="text" class="numberformat form-control form-control-sm py-4 px-3 mb-1" name="price" placeholder="Giá combo (min: 1)" value="{{old('price')}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                    </div>
                    @php         
                        $price_null = Session::get('price_null');
                        if($price_null){
                            echo "<div class='alert alert-danger'>";
                                echo $price_null;
                            echo "</div>";
                            Session::put('price_null', null);
                        }
                    @endphp
                    <div class="form-group">
                        <label for="avatar">Chọn ảnh đại diện</label>
                        <input class="form-control-file" type="file" id="avatar" name="image_combo_path">
                    </div>
                    @php         
                        $image_null = Session::get('image_null');
                        if($image_null){
                            echo "<div class='alert alert-danger'>";
                                echo $image_null;
                            echo "</div>";
                            Session::put('image_null', null);
                        }
                    @endphp
        
                    <div class="form-group">
                        <select name="status" class="form-control input-xs" style="width:30%">
                            <option value=""> Trạng thái </option>
                            <option value="Active"> Active </option>
                            <option value="Disable"> Disable </option>
                        </select>
                    </div>
                    @php         
                        $status_null = Session::get('status_null');
                        if($status_null){
                            echo "<div class='alert alert-danger'>";
                                echo $status_null;
                            echo "</div>";
                            Session::put('status_null', null);
                        }
                    @endphp
                </div>
                <div class="col-md-12">
                    <div class="form-group" >
                        <textarea id="mytextarea" name="desc" placeholder="Mô tả">{{old('desc')}}</textarea>
                    </div>
                    @php         
                        $content_null = Session::get('content_null');
                        if($content_null){
                            echo "<div class='alert alert-danger'>";
                                echo $content_null;
                            echo "</div>";
                            Session::put('content_null', null);
                        }
                    @endphp
                </div>
            </div>

            <div class="order">
                <h1>KFCC</h1>
                <ul id="order-items" class="order-items">
                   
                </ul>
                <a class="btn btn-danger" id="btn-test">Add product</a>
                <div>
                    <p>Subtotal <span id="sub-total" class="money"></span></p>
                    <p>Shippng <span id="shipping" class="money"></span></p>
                    <p>Total <span id="total" class="money"></span></p>
                </div>
            </div>

            <h3>Sản phẩm trong combo</h3>
            <hr>
            <div id="firstproduct">
                
            </div>
            <div class="col-md-6" style="width:100%">
                <hr>
                <div class="form-group d-flex justify-content-end" >
                    <div style="width:12%" class="mr-4">
                        <label for="">Discount</label>
                        <select class="form-control input-xs" name="discount" id="discount">
                            <option value="0">0 %</option>
                            @php
                                $stt = 0;
                            @endphp
                            @for($i = 1; $i <= 10; $i++)
                                {{$stt++}}
                                <option class="form-control" value="{{ $stt*10 }}">{{ $stt*10 }} %</option>
                            @endfor
                        </select>
                    </div>
                    <div style="width:30%" >
                        <label for="">Tổng</label>
                        <input readonly class="form-control" type="text" name="total_price" id="total_price">
                    </div>
                </div>
            </div>

            {{-- more product  --}}
            <div id="moreproduct"></div>         
            <div class="">
                <div class="form-group">
                    <button type="button"  class="addProduct btn btn-success"><i class="fas fa-plus-circle"></i></button>
                    <button type="button"  class="removeProduct btn btn-danger"><i class="fas fa-minus-circle"></i></button>
                </div>
            </div>
            <hr>
            <div class="">
                <div class="form-group">
                    <button class="btn btn-primary">Thêm Combo</button>
                    <a href="{{ asset('admin/combo/index')}}" class="btn btn-secondary">Huỷ</a>
                </div>
            </div>
        </form>
    </div>
    <!-- kết thúc code ở đây  -->
@endsection
<script src="{{URL::asset('backend/vendor/jquery/jquery.min.js')}}"></script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>tinymce.init({ selector: '#mytextarea'});</script>
<script src="{{URL::asset('backend/js/combo/main.js')}}"></script>

<script>
    $(document).ready(function(){
        const items = [
            {
                name: 'Pizza 001', 
                price: 6},
            {
                name: 'Pizza 002', 
                price: 6},
            {
                name: 'Pizza 003', 
                price: 6},
        ]
        const Shipping = 5
        function render(){
            let subtotal = 0;
            items.forEach(item => {
                subtotal += item.price;
            })

            const total = subtotal + Shipping;
            const html = items.map(item => `
                <li class="order-item">
                    <span>${item.name}</span>

                    <span class="price">
                        <span>${item.price.toFixed(2)}</span>
                        <a style="color:red; border:solid 1px #ccc; cursor:pointer" class"btn-delete">X</a>
                    </span>
                </li>`).join('')
            $('#order-items').html(html)  

            const deleteBtn = [$('.btn-delete')]
            for(let i = 0; i < deleteBtn.length; i++){
                deleteBtn[i].on('click', function(){
                    remove(i);
                })
            }
            $("#sub-total").text(`$${subtotal.toFixed(2)}`)
            $("#shipping").text(`$${Shipping}`) 
            $("#total").text(`$${total.toFixed(2)}`) 
        }

        function add(){
            items.push({
                name: `Pizza ${Math.random().toFixed(3)}`,
                price: Math.random()*10
            })

            render();
        }
        $('#btn-test').on('click', function(){
            add();
        })
        render();
    })
</script>
<script>
    $(document).ready(function(){
        $('.removeProduct').click(function(){
            $('.productdiv').last().remove();
        })
        $('.addProduct').click(function(){
            genderSelect();
            // $('#firstproduct .productdiv').clone().find('select').val('').end().appendTo('#moreproduct');
        })
        let products = {!! json_encode($products) !!};
        genderSelect();

        function genderSelect(){
            let container = $("#firstproduct");
            let selectOption ='';
            products.forEach(opt =>{
               selectOption += `<option value="${opt.id}" class="getPrice" data-price="${opt.price}">${opt.name}</option>`;
            });
            let item = `
            <div class="productdiv">
                <div class="row">
                    <div class="col-md-6">
                        <div class=" form-group d-flex justify-content-between " style="width:100%" >
                            <div style="width:67%">
                                <div class="form-group " >
                                    <label >Sản phẩm</label>
                                    <select type="text" name="product_name[]" class="form-control selectProduct">
                                        <option value="">Chọn sản phẩm</option>
                                        ${selectOption}
                                        </select>
                                    </div>
                                </div>
                                <div style="width:30%">
                                    <div class="form-group">
                                        <label>Giá sản phẩm</label>
                                        <input id="price-product-input" readonly type="text" name="product_price[]" class="form-control price-product-input">
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>      
                </div>   
            `
            container.append(item);
            document.querySelectorAll('.selectProduct').forEach(item =>{
                item.addEventListener('change',function(){
                    let parent = item.parentNode.parentNode.parentNode;
                    let input = parent.querySelector("input");
                    let value = item.value;
                    if(value){
                        let productFind = products.filter(item =>{
                            return item.id  == parseInt(value);
                        });
                        input.value = productFind[0].price; 
                    }else{
                        input.value = ""; 
                    }
                    
                    handlerTotalPrice();
                })
            })
            function handlerTotalPrice(){
                let total  = 0;
                document.querySelectorAll(".price-product-input").forEach(item=>{
                    const itemElemt = item.value == "" ? 0 : item.value;
                    total += parseInt(itemElemt);
                })
                    let finishPrice = (100 - $("#discount").val())/100;
                    total = total*finishPrice
                $("#total_price").val(total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
            }
        }
    })
</script>