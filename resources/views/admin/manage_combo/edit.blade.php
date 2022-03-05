<!DOCTYPE html>
{{-- Các bước để tạo khung trang Dashboard --}}

{{-- Bước 1: @extends('admin/layouts.admin_layout') --}}
@extends('admin/layouts.admin_layout')

{{-- Bước 2: Đặt tên cho title  --}}
@section('title')
    <title>Update Combo</title>
@endsection

{{-- Bước 3: Viết code cần show data ở sau thẻ div  --}}
@section('content')
    <!-- code database bắt đầu từ đây  -->
    @include('admin/partials.preloader')
    <div class="container-fluid" id="preloader">
        <h2 class="form-title">Update Combo</h2>
        <hr>
        <form action="{{ route('combo.update', ['id'=>$combo->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group" style="width:100%">
                        <input type="text" class="form-control form-control-sm py-4 px-3 mb-1" name="name" style="width: 100%;" placeholder="Tên combo (min: 5)" value="{{ $combo->name }}" />
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
                        <label for="avatar">Chọn ảnh đại diện</label>
                        <input class="form-control-file" type="file" id="avatar" name="image_combo_path">
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="row rounded border border-secondary p-2" style="width:120px; height:120px">
                            <img src="{{ $combo->image_combo_path }}" style="width:100%">
                        </div>
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
                        <textarea id="mytextarea" name="desc" placeholder="Mô tả">{{ $combo->desc }}</textarea>
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

            <h3>Sản phẩm trong combo</h3>
            <hr>
            
            <div id="firstproduct"></div>
            
            <button type="button"  class="addProduct btn btn-success">Thêm Product</i></button>

            <div class="col-md-6" style="width:100%">
                <hr>
                <div class="form-group d-flex justify-content-end" >
                    {{-- <div style="width:21%" class="mr-4">
                        <label for="">Discount % (0->100)</label>
                        <input type="text" class="form-control input-xs" name="discount" id="discount" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                        <div class="mt-2" id="message"></div>
                    </div> --}}
                    <div style="width:30%" >
                        <label for="">Tổng (VNĐ)</label>
                        <input readonly class="form-control" type="text" name="total_price" id="total_price">
                    </div>
                </div>
            </div>

            {{-- more product  --}}
            <div id="moreproduct"></div>         
            <hr>
            <div class="">
                <div class="form-group">
                    <button class="btn btn-primary">Update Combo</button>
                    <a href="{{ asset('admin/combos/index')}}" class="btn btn-secondary">Huỷ</a>
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
        // $('.removeProduct').click(function(){
        //     $('.productdiv').last().remove();
        // })
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
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class=" form-group d-flex justify-content-between" >
                                    <div style="width:67%">
                                        <div class="form-group">
                                            <label>Tên sản phẩm</label>
                                            <select type="text" name="product_name[]" class="form-control selectProduct">
                                                <option value="">Chọn sản phẩm</option>
                                                ${selectOption}
                                            </select>
                                        </div>
                                    </div>
                                    <div style="width:30%">
                                        <div class="form-group">
                                            <label>Giá sản phẩm (VNĐ)</label>
                                            <input id="price-product-input" readonly type="text" class="form-control price-product-input">
                                        </div>
                                    </div>
                                </div> 
                            </div>  
                            
                            <div class="col-md-6 d-flex align-items-center ">
                                <div>
                                    <button type="button"  class="removeProduct btn btn-danger"><i class="fas fa-minus-circle"></i></button>
                                </div>
                            </div>
                        </div>

                    </div>    
                </div>
            </div>   
            `              
            container.append(item);
            const deleteBtn = [$('.removeProduct')]
            document.querySelectorAll('.selectProduct').forEach(item =>{
                item.addEventListener('change',function(){ 
                    let parent = item.parentNode.parentNode.parentNode;
                    let input = parent.querySelector("input");
                    let value = item.value;
                    console.log(input);
                    if(value){
                        console.log(value);
                        let productFind = products.filter(item =>{
                            return item.id  == parseInt(value);
                        });
                        input.value = productFind[0].price.replace(/\B(?=(\d{3})+(?!\d))/g, "."); 
                    }else{
                        input.value = ""; 
                    }
                    handlerTotalPrice();
                })

            })
            function remove(index){
                container.splice(index, 1)
            }
            function handlerTotalPrice(){
                let total  = 0;
                document.querySelectorAll(".price-product-input").forEach(item=>{
                    const itemElemt = item.value == "" ? 0 : item.value.replace(/\./g, "");;
                    total += parseInt(itemElemt);
                })
                total = total*0.8
                $("#total_price").val(total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
            }

            $(document).on('click', '.removeProduct', function () {
                $(this).closest('.productdiv').remove();
            });
        }
    })
    // $(document).ready(function(){
    //     $('#discount').on('keyup', function () {
    //         if ($('#discount').val() > 100 ) {
    //             $('#message').html('Max 100% !!!').addClass("alert-danger").addClass("alert")
    //         } else {
    //             $('#message').html('').removeClass("alert-danger").removeClass("alert");
    //         }
    //     });
    // })
</script>