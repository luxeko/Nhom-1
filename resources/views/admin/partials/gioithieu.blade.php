<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@extends('admin.home')
@section('gioi_thieu')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tổng quan</h1>
        <div>
            <button  class="btn btn-danger click_show_calendar">Lịch</button>
            <button hidden  class="btn btn-danger click_hide_calendar">Ẩn</button>
            <div class="row">
                <div hidden id="hide_calendar" style="position:relative;" class="col-md-12 ">
                    <div style="z-index: 1000; position:absolute; left:-500%; top:30%" id="container" class="calendar-container px-5 py-3 bg-white border rounded shadow-lg "></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Doanh thu (Ngày)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($sumPrice, 0)}} VNĐ</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Số đơn hàng xác nhận (ngày)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$countOrder}} Đơn hàng đã gửi</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-money-bill fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Đơn hàng đang xử lý </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$countOrderWait}} Đơn hàng chờ xử lý</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-cart-plus fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">

                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Số lượng người dùng
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$countUser}} Users</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-friends fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <!-- Area Chart -->
        <!-- Calender -->
        <div class="col-md-6">
            <div class="card">
    			<div class="card-body">
    				<div class="chart-container" style="width: 100%; height: 500px; margin:auto">
                        <canvas id="barChart"></canvas>
    				</div>
    			</div>
    		</div>
        </div>
        <div class="col-md-6">
            <div class="card">
    			<div class="card-body">
    				<div class="chart-container" style="width: 100%; height: 500px; margin:auto">
                        <canvas id="topUser"></canvas>
    				</div>
    			</div>
    		</div>
        </div>
       
    </div>
    <div class="row">
        <div class="col-md-6">
            <div id="table_data">
                <table class="table mb-0 pb-0" width="100%">
                    <thead class="thead-dark">
                        <tr class="text-center">
                            <th>
                                <a class="text-white" href="{{ route('product.index') }}">Danh sách sản phẩm mới nhất</a> 
                            </th>
                        </tr>
                    </thead>
                </table>
                <table class="table table-hover table-bordered shadow-lg" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th colspan="1" class="text-center" style="width:5%">STT</th>
                            <th class="text-center">Hình ảnh</th>
                            <th class="text-center sorting" data-sorting_type="asc" data-column_name="name" style="cursor: pointer">Tên <span id="id_icon"></span></th>
                            <th class="text-center sorting" data-sorting_type="asc" data-column_name="price" style="cursor: pointer">Giá <span id="post_title_icon"></span> </th>
                            <th class="text-center">Danh mục</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead> 
                    <tbody id="list-product">
                        @if(isset($products) && $products->count()>0)
                            @foreach ($products as $key => $value)                              
                                <tr>
                                    <th colspan='1' class='text-center ' style='width:5%'>{{ ( $currentPage - 1 ) * $perPage + $key + 1 }}</th>
                                    <td class='text-center admin_product_img'><img src='{{$value->feature_image_path}}'></td>
                                    <td class=" text-dark font-weight-bold">{{$value->name}}</td>
                                    
                                    <td class=""><span class="text-success font-weight-bolder font-italic">{{ number_format($value->price, 0) }} VNĐ</span>
                                    </td>
                                    <td class="text-center text-dark font-weight-bold">{{ optional($value->category)->name }}</td>
                                    <td class="text-center">
                                        <?php
                                            if($value->status == 1){
                                                echo "<span class='badge bg-success p-2 text-white'>Active</span>";
                                            } else {
                                                echo "<span class='badge bg-danger p-2 text-white'>Disable</span>";
                                            }  
                                        ?>
                                    </td>
                                   
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="text-center text-danger" colspan="12">Chưa có dữ liệu</td>
                            </tr>
                        @endif                    
                    </tbody>
                    <tbody id="list-product"></tbody>
                    
                </table>
            </div>
        </div>
        <div class="col-md-6">
            <div id="table_data">
                <table class="table mb-0 pb-0" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr class="text-center">
                            <th>
                                <a class="text-white" href="{{ route('order.index') }}">Danh sách orders chờ xử lý</a> 
                            </th>
                        </tr>
                    </thead>
                </table>
                <table class="table  table-hover table-bordered shadow-lg" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark ">
                        <tr>
                            <th colspan="1" class="text-center" style="width:5%">STT</th>
                            <th class="text-center">Giá trị đơn hàng</th>
                            <th class="text-center">Firt Name</th>
                            <th class="text-center">Last Name</th>
                            <th class="text-center">SĐT</th>
                            <th class="text-center">Thành phố</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead> 
                    <tbody id="list-order">
                        @if(!empty( $orders) &&  $orders->count()>0)
                            @foreach ( $orders as  $key => $value)                         
                                <tr>
                                    <th colspan='1' class='text-center' style='width:5%'>{{ (  $currentPage - 1 ) *  $perPage +  $key + 1 }}</th>
                                    <td colspan='1'><p class="text-success font-weight-bolder">{{ number_format( $value->total, 0) }} VNĐ</p>
                                    <td class="font-weight-bold text-dark">{{  $value->firstname }}</td>
                                    <td class="font-weight-bold text-dark">{{  $value->lastname}}</td>
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
                                </tr>
                                
                            @endforeach
                        @else
                            <tr>
                                <td class="text-center text-danger" colspan="12">Chưa có dữ liệu</td>
                            </tr>
                        @endif
                    </tbody>                    
                </table>
            </div>
        </div>
    </div>
@endsection
<script src="{{URL::asset('backend/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{URL::asset('backend/js/dashboard/main.js')}}"></script>
{{-- <script src="{{URL::asset('backend/js/loader.js')}}"></script> --}}
<script type="text/javascript">
    var $calendar;
    $(document).ready(function () {
        let container = $("#container").simpleCalendar({
        fixedStartDay: 0, // begin weeks by sunday
        disableEmptyDetails: true,
        });
        $calendar = container.data('plugin_simpleCalendar')
    });
</script>

<script>
    $(function(){
        var price = [];
        var categoryName = [];
        let element;
        var datas = {!! json_encode($result_one) !!};
        for (let i = 0; i < datas.length; i++) {        
            element = datas[i];
            categoryName.push(element['name'])
            price.push(element['subtotal'])
        }
        console.log(categoryName);
        console.log(price);
        var barCanvas = $('#barChart');
        var barChart = new Chart(barCanvas, {
            type: 'bar',
            data: {
               
                labels: categoryName,
                datasets:[{
                    label: 'Biểu đồ doanh thu theo danh mục sản phẩm',
                    data: price,
                    backgroundColor: [
                        '   rgb(146, 168, 209) ', 
                        '   rgb(149,212,122)   ',
                        '   RGB(149, 82, 81)   ', 
                        '   RGB(239, 192, 80)  ',
                        '   #DB7093            ', 
                        '   rgb(255, 111, 97)  ', 
                        '   #E9967A            ',
                        '   rgb(107, 91, 149)  ',
                        '   rgb(52, 86, 139)   ',
                    ]
                }]
            },
            options: {
                scales: {
                     y: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        })
    })
</script>
<script>
    $(function(){
        var total = [];
        var user_name = [];
        let element;
        var datas_user = {!! json_encode($getTopUser) !!};
        var datas_total = {!! json_encode($getTopTotal) !!};
        console.log(user_name);
        console.log(total);
        var barCanvas = $('#topUser');
        var barChart = new Chart(barCanvas, {
            type: 'bar',
            data: {
                labels: datas_user,
                datasets:[{
                    label: 'Top 3 khách hàng mua nhiều nhất ',
                    data: datas_total,
                    backgroundColor: [
                        '   RGB(239, 192, 80)  ', 
                        '   RGB(152, 180, 212) ',
                        '   RGB(149, 82, 81)   '
                    ]
                }]
            },
            options: {
                scales: {
                     y: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        })
    })
    
</script>
<script>
    $(document).ready(function(){
        $(".click_show_calendar").on('click' ,function(){
            $("#hide_calendar").prop("hidden", false);;
            $(".click_hide_calendar").prop("hidden", false);
            $(".click_show_calendar").prop("hidden", true);
        });
        $(".click_hide_calendar").on('click',function(){
            $("#hide_calendar").prop("hidden", true);;
            $(".click_hide_calendar").prop("hidden", true);
            $(".click_show_calendar").prop("hidden", false);
        });
    })
</script>
