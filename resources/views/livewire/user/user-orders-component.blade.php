<div>
    <!-- <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
    </style> -->
    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb_iner">
                        <img src="{{ URL::asset('/frontend/img/product/banner/all_product.png'); }}" alt="logo">
                        <div class="breadcrumb_iner_item">
                        <h2></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->  
    <div class="container" style="padding: 30px 0;">        
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>My Orders</h2>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped" style="font-weight: bold;">
                            <thead>
                                <tr>
                                    <th>OrderId</th>
                                    <th>Subtotal</th>
                                    <th>Tax</th>
                                    <th>Total</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Order Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{$loop->index +1}}</td>
                                        <td>${{number_format($order->subtotal)}}</td>
                                        <td>${{number_format($order->tax)}}</td>
                                        <td>${{number_format($order->total)}}</td>
                                        <td>{{$order->firstname}}</td>
                                        <td>{{$order->lastname}}</td>
                                        <td>{{$order->mobile}}</td>
                                        <td>{{$order->email}}</td>
                                        <td>{{$order->status}}</td>
                                        <td>{{$order->created_at}}</td>
                                        <td><a href="{{route('user.orderdetails',['order_id'=>$order->id])}}" class="btn btn-info btn-sm" style="background: #444444; padding: .25rem .5rem; font-size: 15px;">Details</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$orders->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>