<!DOCTYPE html>
{{-- Các bước để tạo khung trang Dashboard --}}
<meta name="csrf-token" content="{{ csrf_token() }}">

{{-- Bước 1: @extends('admin/layouts.admin_layout') --}}
@extends('admin/layouts.admin_layout')

{{-- Bước 2: Đặt tên cho title  --}}
@section('title')
    <title>Order</title>
@endsection
{{-- Bước 3: Viết code cần show data ở sau thẻ div  --}}
@section('content')
    @include('admin/partials.preloader')
    <div class="container-fluid" id="preloader">
        <!-- code database bắt đầu từ đây  -->
        <div class="d-flex bg-light justify-content-between mb-3 ">
            <h2 class="border-bottom border-secondary">Danh sách order</h2>
        </div>
        <div class="d-flex justify-content-end mb-3">    
            <form action="{{ route('order.search') }}" method="get" class="form-inline">
                <div class="form-group">
                    <input value="{{ isset($firstname) ? $firstname : '' }}" class="form-control mr-sm-2" name="firstname" type="search" placeholder="First Name" aria-label="Search">
                </div>
                <div class="form-group">
                    <input value="{{ isset($lastname) ? $lastname : '' }}" class="form-control mr-sm-2" name="lastname" type="search" placeholder="Last Name" aria-label="Search">
                </div>
                <div class="form-group">
                    <input  value="{{ isset($email) ? $email : '' }}" class="form-control mr-sm-2" name="email" type="search" placeholder="Email" aria-label="Search">
                </div>
                <div class="form-group">
                    <input value="{{ isset($mobile) ? $mobile : '' }}" class="form-control mr-sm-2" name="mobile" type="search" placeholder="Số điện thoại" aria-label="Search">
                </div>
                <div class="form-group">
                    <select name="city"  class="pr-5 form-control input-xs mr-sm-2">
                        <option value="">Thành phố</option>
                        @if(isset($city))
                            @forEach($allCity as $value)
                                @if($city == $value->city_id)
                                    <option selected value="{{$value->city_id}}">{{$value->vn_name}}</option>
                                @else
                                    <option value="{{$value->city_id}}">{{$value->vn_name}}</option>
                                @endif
                            @endforeach
                        @endif
                        @if(empty($city))
                            @forEach($allCity as $value)
                                <option value="{{$value->city_id}}">{{ $value->vn_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <select name="sort" class="form-control input-xs mr-sm-2">
                        <option value="">Sắp xếp</option>
                        @if(isset($sort) && $sort === 'asc')
                            <option selected value="asc">Price: Thấp đến cao</option>
                            <option value="desc">Price: Cao đến thấp</option>
                            <option value="latest">Mới nhất</option>
                            <option value="oldest">Cũ nhất</option>
                        @endif
                        @if(isset($sort) && $sort === 'desc')
                            <option  value="asc">Price: Thấp đến cao</option>
                            <option selected value="desc">Price: Cao đến thấp</option>
                            <option value="latest">Mới nhất</option>
                            <option value="oldest">Cũ nhất</option>
                        @endif
                        @if(isset($sort) && $sort === 'latest')
                            <option value="asc">Price: Thấp đến cao</option>
                            <option value="desc">Price: Cao đến thấp</option>
                            <option selected value="latest">Mới nhất</option>
                            <option value="oldest">Cũ nhất</option>
                        @endif
                        @if(isset($sort) && $sort === 'oldest')
                            <option value="asc">Price: Thấp đến cao</option>
                            <option value="desc">Price: Cao đến thấp</option>
                            <option value="latest">Mới nhất</option>
                            <option selected value="oldest">Cũ nhất</option>
                        @endif
                        @if(empty($sort))
                            <option value="asc">Price: Thấp đến cao</option>
                            <option value="desc">Price: Cao đến thấp</option>
                            <option value="latest">Mới nhất</option>
                            <option value="oldest">Cũ nhất</option>
                        @endif
                    </select>
                </div>

                <div class="form-group">
                    <select class="form-control input-xs mr-sm-2" name="status_filter" >
                        <option value="">Chọn status </option>
                        @if(isset($status)  && $status == 'ordered')
                            <option selected value="ordered">ordered</option>
                            <option value="delivered">delivered</option>
                            <option value="canceled">canceled</option>
                        @endif
                        @if(isset($status) && $status == 'delivered')
                            <option value="ordered">ordered</option>
                            <option selected value="delivered">delivered</option>
                            <option value="canceled">canceled</option>
                        @endif
                        @if(isset($status) && $status == 'canceled' )
                            <option value="ordered">ordered</option>
                            <option value="delivered">delivered</option>
                            <option selected value="canceled">canceled</option>
                        @endif
                        @if(empty($status))
                            <option value="ordered">ordered</option>
                            <option value="delivered">delivered</option>
                            <option value="canceled">canceled</option>
                        @endif
                    </select>
                </div>
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Tìm kiếm</button>
            </form>
           
        </div>
        
        @php             
             $success = Session::get('success_order');
            if( $success){
                echo "<div class='alert alert-success' id='order_alert'>";
                    echo  $success;
                    Session::put('success_order', null);
                echo "</div>";
            }
        @endphp
        <div id="table_data">
            <div class="text-dark font-weight-bold">Có {{ $data->count() }} kết quả / trang</div>
            <table class="table  table-hover table-bordered shadow-lg" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark ">
                    <tr>
                        <th colspan="1" class="text-center" style="width:5%">STT</th>
                        <th class="text-center">Giá trị đơn hàng (Sau thuế)</th>
                        <th class="text-center">Firt Name</th>
                        <th class="text-center">Last Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">SĐT</th>
                        <th class="text-center">Thành phố</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Thao tác</th>
                    </tr>
                </thead> 
                <tbody id="list-order">
                    @if(!empty( $data) &&  $data->count()>0)
                        @foreach ( $data as  $key =>  $value)                         
                            <tr>
                                <th colspan='1' class='text-center' style='width:5%'>{{ (  $currentPage - 1 ) *  $perPage +  $key + 1 }}</th>
                                <td class=""><p class="text-success font-weight-bolder">{{ number_format( $value->total, 0) }} VNĐ</p>
                                <td class="font-weight-bold text-dark">{{  $value->firstname }}</td>
                                <td class="font-weight-bold text-dark">{{  $value->lastname}}</td>
                                <td class="text-center">{{  $value->email }}</td>
                                <td class="text-center">{{  $value->mobile }}</td>
                                <td class="text-center">{{  optional( $value->getCity)->vn_name }}</td>
                                {{-- <td class="text-center">{{  $value->getProduct->name }}</td> --}}
                                </td>
                                <td class="text-center">
                                    <?php
                                        if( $value->status == 'ordered'){
                                            echo "<span class='badge bg-warning text-white'>Ordered</span>";
                                        } elseif ( $value->status == 'delivered') {
                                            echo "<span class='badge bg-success text-white'>Delivered</span>";
                                        } else {
                                            echo "<span class='badge bg-danger text-white'>Canceled</span>";
                                        }  
                                    ?>
                                </td>
                                <td colspan="1" class="text-center" style="width:15%">
                                    @can('order-detail')
                                    <a class="btn btn-primary" href="#" onclick="get_product({{ $value->id}});viewOrderDetail({{ $value->id}})"data-toggle="modal" data-target="#modallist_product"><i class="fas fa-eye"></i></a>
                                    @endcan
                                    {{-- @can('product-edit') --}}
                                    {{-- <a href="{{ Route('order.edit', ['id'=> $value->id])}}" class="btn btn-success"><i class="fas fa-pencil-alt"></i></a> --}}
                                    {{-- @endcan --}}
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td class="text-center text-danger" colspan="12">Chưa có dữ liệu</td>
                        </tr>
                    @endif
                    
                </tbody>
                <tbody id="list-order"></tbody>
                
            </table>
            <div class="d-flex justify-content-center">
                @if (!empty($data))
                    {!! $data->links() !!} 
                @endif  
            </div>
        </div>
        
        <section>
            <!-- Modal -->
            <div class="modal fade" id="modallist_product" tabindex="-1" aria-labelledby="order-modal-label" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-dark">
                            <span class="text-white modal-title" id="myModalLabel150">Chi tiết Order</span>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">x</button>
                        </div>
                        {{-- code từ đây  --}}
                        <div class="modal-body border-0" id="modal-order-detail"></div>
                        {{-- end code thông báo  --}}
                        <div class="modal-footer border-0">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <style>
            .w-5{
                display: none;
            }
        </style>
        <!-- kết thúc code ở đây  -->   
    </div>
@endsection

<script src="{{URL::asset('backend/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{URL::asset('backend/js/order/main.js')}}"></script>
{{-- <script>
        $(document).ready(function () {
             
              $('#search').on('keyup',function() {
                 var query =  $(this).val(); 
                  $.ajax({
                    
                     url:"{{ route('order.search') }}",
               
                     type:"GET",
                    
                     data:{'search':query},
                    
                     success:function (data) {
                       
                          $('#list-order').html(data);
                     }
                 })
                 // end of ajax call
             });

             
              $(document).on('click', 'td', function(){
               
                 var value =  $(this).text();
                  $('#search').val(value);
                  $('#list-order').html("");
             });
         });
</script> --}}

<script type="text/javascript">  
    //  $(document).ready(function(){
        var test = ''
        var quantity = ''
        var list_product = '';
        function get_product(id){
             $.ajax({
                url:'/admin/orders/order_item',
                method:'GET',
                data:{id:id},
                success:(item)=>{
                    let getQuantityOneItem  = ''
                    item.forEach(e => {
                        getQuantityOneItem = `<tr>
                                                <td class="text-center"><span class="text-success"> ${e.quantity}</span></td>
                                            </tr>`;
                        quantity += getQuantityOneItem
                    })
                }
            });
             $.ajax({
                url:'/admin/orders/product',
                method:'GET',
                data:{id:id},
                success:(product)=>{
                    let stt = 1;
                    product.forEach(e => {
                        let product = `<tr>
                                        <th colspan='1' class='text-center' style='width:5%'> ${stt++}</th>
                                        <td class='text-center admin_product_img'><img src=' ${e.feature_image_path}'></td>
                                        <td class="text-center"> ${e.name}</td>
                                        <td class="text-center"><span class="text-success"> ${e.price.replace(/\B(?=(\d{3})+(?!\d))/g, ".")} VNĐ</span></td>
                                    </tr>`;
                        list_product += product;
                    });
                }
            });
        }
       
        function viewOrderDetail(id){
            var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
             $.ajax({
                url:'/admin/orders/details',
                method:'GET',
                data:{id:id},
                success:(order)=>{
                    console.log(order);
                    let status = '';
                    if( order.status == 'ordered'){
                        status = "<span class='badge bg-warning text-white'>Ordered</span>";
                    } else if ( order.status == 'delivered') {
                        status = "<span class='badge bg-success text-white'>Delivered</span>";
                    } else {
                        status = "<span class='badge bg-danger text-white'>Canceled</span>";
                    }  
                    let orderDetails = `
                                <div class="container-fluid">   
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p class="mb-1"><span> First name: </span><span class="text-success " style="font-size: 15px"> ${order.firstname}</span></p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="mb-1"><span> Last name: </span><span class="text-success " style="font-size: 15px"> ${order.lastname}</span></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p class="mb-1"><span> Email: </span><span class="text-success " style="font-size: 15px"> ${order.email}</span></p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="mb-1"><span> SĐT: </span><span class="text-success " style="font-size: 15px">  ${order.mobile}</span></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p class="mb-1"><span> Địa chỉ 1: </span><span class="text-success " style="font-size: 15px">  ${order.line1}</span></p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="mb-1"><span> Địa chỉ 2 (nếu có): </span><span class="text-success " style="font-size: 15px">  ${order.line2}</span></p>
                                                </div>
                                                
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p class="mb-1"><span> Trạng thái: </span><span class="text-success " style="font-size: 15px">  ${status}</span></p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="mb-1"><span> Ngày xác nhận: </span><span class="text-success " style="font-size: 15px"> ${new Date(order.created_at).toLocaleDateString("en-US",options)} </span></p>
                                                    
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p class="mb-3"><span> Ngày gửi: </span><span class="text-success " style="font-size: 15px">  ${order.delivered_date}</span></p>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <table class="table table-lg table-striped" id="dataTable" style="width:70%" cellspacing="0">
                                        <thead class="thead-primary" >
                                            <tr>
                                                <th colspan="1" class="text-center" style="width:5%">STT</th>
                                                <th class="text-center">Hình ảnh</th>
                                                <th class="text-center">Tên </th>
                                                <th class="text-center">Giá </th>
                                            </tr>
                                        </thead> 
                                        <tbody>
                                                 ${list_product}
                                        </tbody>
                                    </table>
                                    <table class="table table-lg table-striped" id="dataTable" style="width:29%" cellspacing="0">
                                        <thead class="thead-primary" >
                                            <tr>
                                                <th class="text-center">Quantity </th>
                                            </tr>
                                        </thead> 
                                        <tbody>
                                                 ${quantity}
                                        </tbody>
                                    </table>
                                </div>
                                <hr>
                                <div class="container-fluid">   
                                    <div class='d-flex justify-content-end'>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item"> Subtotal:</li>
                                            <li class="list-group-item"> Tax (10%): </li>
                                            <li class="list-group-item font-weight-bold">Total:</li>
                                        </ul>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item"><span class="text-success"> ${order.subtotal} VNĐ</span></li>
                                            <li class="list-group-item"><span class="text-success"> ${order.tax} VNĐ</span></li>
                                            <li class="list-group-item"><span class="text-success font-weight-bold"> ${order.total} VNĐ</span></li>
                                        </ul>
                                    </div>
                                </div>
                                `
                        quantity = ''
                        list_product = ''
                         $('#modal-order-detail').html('').append(orderDetails);
                    }
            })
        }
    // });

</script>

