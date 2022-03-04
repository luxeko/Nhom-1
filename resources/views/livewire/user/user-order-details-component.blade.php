<div>
    <div class="container" style="padding: 30px 0;"> 
        <div class="row">
            <div class="col-md-12">
                @if(Session::has('order_message'))
                    <div class="alert alert-success" role="alert">{{Session::get('order_message')}}</div>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>Order Details</h3>
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('user.orders')}}" class="btn btn-success" style="background: #444444; padding: .25rem .5rem; font-size: 15px; float: right;">My Orders</a>
                            @if ($order->status == 'ordered')
        						<a hred="#" class="btn btn-warning" style="margin-right: 20px; background: #444444; padding: .25rem .5rem; font-size: 15px; color: #fff; float: right;" wire:click.prevent="cancelOrder">Cancel Order</a>
        					@elseif ($order->status == 'canceled')
        						<a hred="#" class="btn btn-warning" style="margin-right: 20px; background: #444444; padding: .25rem .5rem; font-size: 15px; color: #fff; float: right;" wire:click.prevent="undoCancel">Undo Cancel Order</a>
        					@endif
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <th>Order ID</th>
                            <td>{{$order->id}}</td>
                            <th>Order Date</th>
                            <td>{{$order->created_at}}</td>
                            <th>Status</th>
                            <td>{{$order->status}}</td>
                            @if($order->status == 'delivered')
                            <th>Delivery Date</th>
                            <td>{{$order->delivered_date}}</td>
                            @elseif($order->status == 'canceled')
                            <th>Canceled Date</th>
                            <td>{{$order->canceled_date}}</td>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>        
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>Ordered Items</h3>
                    </div>
                    <div class="panel-body" style="padding: 10px;">
                        <div class="wrap-iten-in-cart">                                                       
                            <h3 class="box-title">Products Name</h3>
                            <ul class="products-cart">
                                @foreach ($order->orderItems as $item)                    
                                <li class="pr-cart-item">
                                    <div class="product-image">
                                        <figure><img src="{{$item->product->feature_image_path}}" alt="{{$item->product->name}}"></figure>
                                    </div>
                                    <div class="product-name">
                                        <a class="link-to-product" href="{{route('product.details',['slug'=>$item->product->slug])}}">{{$item->product->name}}</a>
                                    </div>
                                    <div class="price-field produtc-price"><p class="price">${{number_format($item->price)}}</p></div>
                                    <div class="quantity">
                                        <h5>{{$item->quantity}}</h5>                                        
                                    </div>
                                    <div class="price-field sub-total"><p class="price">${{number_format($item->price * $item->quantity)}}</p></div>  
                                    @if($order->status == 'delivered' && $item->rstatus == false)                                 
                                        <div class="price-field sub-total"><p class="price"><a href="{{route('user.review',['order_item_id'=>$item->id])}}">Write Review</a></p></div>
                                    @endif    
                                </li> 
                                @endforeach                   										
                            </ul>                           
                        </div>
                        <div class="summary">
                            <div class="order-summary">
                                <h4 class="title-box">Order Summary</h4>
                                <div style="float:right; width: 20%; margin-right: 20px; margin-right: 70px;">
                                    <p class="summary-info"><span class="title">Subtotal</span><b class="index">${{number_format($order->subtotal)}}</b></p>
                                    <p class="summary-info"><span class="title">Tax</span><b class="index">${{number_format($order->tax)}}</b></p>
                                    <p class="summary-info"><span class="title">Shipping</span><b class="index">Free Shipping</b></p>
                                    <p class="summary-info"><span class="title">Total</span><b class="index">${{number_format($order->total)}}</b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>Billing Details</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <th>First Name</th>
                                <td>{{$order->firstname}}</td>
                                <th>Last Name</th>
                                <td>{{$order->lastname}}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{$order->mobile}}</td>
                                <th>Email</th>
                                <td>{{$order->email}}</td>
                            </tr>
                            <tr>
                                <th>Line1</th>
                                <td>{{$order->line1}}</td>
                                <th>City</th>
                                <td>{{$order->city}}</td>
                                <!-- <th>Line2</th>
                                <td>{{$order->line2}}</td> -->
                            </tr>
                            <!-- <tr>
                                <th>City</th>
                                <td>{{$order->city}}</td>
                                <th>Province</th>
                                <td>{{$order->province}}</td>
                            </tr> -->
                            <!-- <tr>
                                <th>Country</th>
                                <td>{{$order->country}}</td>
                                <th>Zipcode</th>
                                <td>{{$order->zipcode}}</td>
                            </tr> -->
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>

        @if($order->is_shipping_different)
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>Shipping Details</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <th>First Name</th>
                                <td>{{$order->shipping->firstname}}</td>
                                <th>Last Name</th>
                                <td>{{$order->shipping->lastname}}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{$order->shipping->mobile}}</td>
                                <th>Email</th>
                                <td>{{$order->shipping->email}}</td>
                            </tr>
                            <tr>
                                <th>Line1</th>
                                <td>{{$order->shipping->line1}}</td>
                                <th>City</th>
                                <td>{{$order->shipping->city}}</td>
                                <!-- <th>Line2</th>
                                <td>{{$order->shipping->line2}}</td> -->
                            </tr>
                            <!-- <tr>
                                <th>City</th>
                                <td>{{$order->shipping->city}}</td>
                                <th>Province</th>
                                <td>{{$order->shipping->province}}</td>
                            </tr>
                            <tr>
                                <th>Country</th>
                                <td>{{$order->shipping->country}}</td>
                                <th>Zipcode</th>
                                <td>{{$order->shipping->zipcode}}</td>
                            </tr> -->
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>Transaction</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <th>Transaction Mode</th>
                                <td>{{$order->transaction->mode}}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>{{$order->transaction->status}}</td>
                            </tr>
                            <tr>
                                <th>Transaction Date</th>
                                <td>{{$order->transaction->created_at}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>