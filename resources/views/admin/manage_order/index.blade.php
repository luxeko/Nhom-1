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
        <div class="d-flex bg-light justify-content-between mb-3">
            <h2>Danh sách order</h2>
            <div class="form-inline">
                <input class="form-control" type="text" id="search" name="search" placeholder="Search">
            </div>
        </div>
        <div class="d-flex justify-content-end mb-3">    
            <div> 
                <form class="form-inline">
                    <div class="d-flex flex-row form-group mr-sm-4">
                        <button class="btn btn-success">Lọc <i class="fas fa-filter"></i></button>
                    </div>
                    <div class="d-flex flex-row form-group mr-sm-4">
                    
                        <select  class="form-control input-xs"  name="" >
                            <option value="">Giá tiền</option>
                            <option value="">Thấp đến cao</option>
                            <option value="">Cao đến thấp</option>
                        </select>
                    </div>
                    <div class="d-flex flex-row mr-sm-4">
                  
                        <select name="category_filter" class="form-control input-xs">
                            <option value=""> Danh mục </option>
                        
                        </select>
                    </div>
                    <div class="d-flex flex-row">
                
                        <select  class="form-control input-xs"  name="" >
                            <option value="">Status</option>
                            <option value="1">Active</option>
                            <option value="2">Disable</option>
                        </select>
                    </div>
                </form>
            </div>
           
        </div>
        
        @php             
            $success = Session::get('success_order');
            if($success){
                echo "<div class='alert alert-success' id='order_alert'>";
                    echo $success;
                    Session::put('success_order', null);
                echo "</div>";
            }
        @endphp
        <div id="table_data">
            <table class="table table-striped table-hover table-bordered shadow-lg" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark ">
                    <tr>
                        <th colspan="1" class="text-center" style="width:5%">STT</th>
                        <th class="text-center">Tên khách hàng</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">SĐT</th>
                        <th class="text-center">Thành phố</th>
                        <th class="text-center">Giá</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Thao tác</th>
                    </tr>
                </thead> 
                <tbody id="list-order">
                    @if(!empty($data) && $data->count()>0)
                        @foreach ($data as $key => $value)                         
                            <tr>
                                <th colspan='1' class='text-center' style='width:5%'>{{ ( $currentPage - 1 ) * $perPage + $key + 1 }}</th>
                                <td class="text-center">{{ $value->lastname.' '.$value->firstname}}</td>
                                <td class="text-center">{{ $value->email }}</td>
                                <td class="text-center">{{ $value->mobile }}</td>
                                <td class="text-center">{{ optional($value->getCity)->vn_name }}</td>
                                {{-- <td class="text-center">{{ $value->getProduct->name }}</td> --}}
                                <td class="text-center"><span class="text-success">{{ number_format($value->total, 0) }} VNĐ</span>
                                </td>
                                <td class="text-center">
                                    <?php
                                        if($value->status == 'ordered'){
                                            echo "<span class='badge bg-warning text-white'>Ordered</span>";
                                        } elseif ($value->status == 'delivered') {
                                            echo "<span class='badge bg-success text-white'>Delivered</span>";
                                        } else {
                                            echo "<span class='badge bg-danger text-white'>Canceled</span>";
                                        }  
                                    ?>
                                </td>
                                <td colspan="1" class="text-center" style="width:15%">
                                    <a class="btn btn-primary" href="#" onclick="viewOrderDetail({{$value->id}})" data-toggle="modal" data-target="#modalDetailOrder"><i class="fas fa-eye"></i></a>
                                    {{-- @can('product-edit') --}}
                                        <a href="{{ Route('order.edit', ['id'=>$value->id])}}" class="btn btn-success"><i class="fas fa-pencil-alt"></i></a>
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
                {!! $data->links() !!}
            </div>
        </div>
        <input type="hidden" name="hidden_page" id="hidden_page" value="1">
        <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="id" />
        <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc" />
        
        <section>
            <!-- Modal -->
            <div class="modal fade" id="modalDetailOrder" tabindex="-1" aria-labelledby="order-modal-label" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-dark">
                            <span class="text-white modal-title" id="myModalLabel150">Chi tiết sản phẩm</span>
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
                 var query = $(this).val(); 
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
               
                 var value = $(this).text();
                 $('#search').val(value);
                 $('#list-order').html("");
             });
         });
</script> --}}

<script type="text/javascript" >  
    // $(document).ready(function(){
        function viewOrderDetail(id){
            let formatter = new Intl.NumberFormat('vn-VN', {
                style: 'currency',
                currency: 'VND',
            });
            $.ajax({
                url:'/admin/order/details/',
                method:'GET',
                data:{id:id},
                success:(order)=>{
                    console.log(order);
                    // var statusProduct = '';
                    // if (product.status == 1) {
                    //     statusProduct = '<p class="mb-0"><span> Status: </span><span class="ml-2 text-success font-italic" style="font-size: 15px">Active</span></p>';
                    // } else {
                    //     statusProduct = '<p class="mb-0"><span> Status: </span><span class="ml-2 text-danger font-italic" style="font-size: 15px">Disable</span></p>';
                    // }
                  
                    // var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                    let orderDetails = ``
                    $('#modal-order-detail').html('').append(orderDetails);
                }
            });
        }
    // });

</script>

