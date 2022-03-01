<div>
<section class="feature_part padding_top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section_tittle text-center">
                        <h2>Featured Category</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-7 col-sm-6">
                    <div class="single_feature_post_text">
                        <p>Premium Quality</p>
                        <h3>Latest foam Sofa</h3>
                        <a href="#" class="feature_btn">EXPLORE NOW <i class="fas fa-play"></i></a>
                        <img src="{{ URL::asset('/frontend/img/feature/feature_1.png'); }}" alt="">
                    </div>
                </div>
                <div class="col-lg-5 col-sm-6">
                    <div class="single_feature_post_text">
                        <p>Premium Quality</p>
                        <h3>Latest foam Sofa</h3>
                        <a href="#" class="feature_btn">EXPLORE NOW <i class="fas fa-play"></i></a>
                        <img src="{{ URL::asset('/frontend/img/feature/feature_2.png'); }}" alt="">
                    </div>
                </div>
                <div class="col-lg-5 col-sm-6">
                    <div class="single_feature_post_text">
                        <p>Premium Quality</p>
                        <h3>Latest foam Sofa</h3>
                        <a href="#" class="feature_btn">EXPLORE NOW <i class="fas fa-play"></i></a>
                        <img src="{{ URL::asset('/frontend/img/feature/feature_3.png'); }}" alt="">
                    </div>
                </div>
                <div class="col-lg-7 col-sm-6">
                    <div class="single_feature_post_text">
                        <p>Premium Quality</p>
                        <h3>Latest foam Sofa</h3>
                        <a href="#" class="feature_btn">EXPLORE NOW <i class="fas fa-play"></i></a>
                        <img src="{{ URL::asset('/frontend/img/feature/feature_4.png'); }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- upcoming_event part start-->

    <!-- product_list start-->
    <section class="product_list section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section_tittle text-center">
                        <h2>awesome <span>shop</span></h2>
                    </div>
                </div>
            </div>
            @if(Session::has('success_message'))
              <div class="alert alert-success">
                <strong>Success</strong> {{Session::get('success_message')}}
              </div>
            @endif
            <div class="row">
                <div class="col-lg-12">
                    <div class="">
                        <div class="single_product_list_slider">
                            <div class="row align-items-center justify-content-between">
                                @foreach($products->take(8) as $item)
                                <div class="col-lg-3 col-sm-6">
                                    <div class="single_product_item">
                                        <a href="{{route('product.details', ['slug'=>$item->slug])}}"><img src="{{$item->feature_image_path}}" alt=""></a>
                                        <div class="single_product_text">
                                        <a href="{{route('product.details', ['slug'=>$item->slug])}}" style="color:$fefefe; opacity: 100; visibility: visible;"><h4><span>{{$item->name}}</span></h4></a>
                                            <h3>{{number_format($item['price'],0,',','.')}}</h3>
                                            <a href="#" class="add_cart" wire:click.prevent="store( {{$item->id}}, '{{$item->name}}', {{$item->price}} )">+ add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product_list part start-->

    <!-- awesome_shop start-->
    <section class="our_offer section_padding">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6 col-md-6">
                    <div class="offer_img">
                        <img src="{{ URL::asset('/frontend/img/offer_img.png'); }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="offer_text">
                        <h2>Weekly Sale on
                            60% Off All Products</h2>
                        <div class="date_countdown">
                            <div id="timer">
                                <div id="days" class="date"></div>
                                <div id="hours" class="date"></div>
                                <div id="minutes" class="date"></div>
                                <div id="seconds" class="date"></div>
                            </div>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="enter email address"
                                aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <a href="#" class="input-group-text btn_2" id="basic-addon2">book now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- awesome_shop part start-->

    <!-- product_list part start-->
    <section class="product_list best_seller section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section_tittle text-center">
                        <h2>Best Sellers <span>shop</span></h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-12">
                    <div class="best_product_slider owl-carousel">
                        @foreach($products as $item)
                        <div class="single_product_item">
                            <a href="detail/{{$item['id']}}"><img src="{{$item['feature_image_path']}}" alt=""></a>
                            <div class="single_product_text">
                                <h4>{{$item['name']}}</h4>
                                <h3>{{number_format($item['price'],0,',','.')}}</h3>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product_list part end-->

    <!-- subscribe_area part start-->
    <section class="subscribe_area section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="subscribe_area_text text-center">
                        <h5>Join Our Newsletter</h5>
                        <h2>Subscribe to get Updated
                            with new offers</h2>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="enter email address"
                                aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <a href="#" class="input-group-text btn_2" id="basic-addon2">subscribe now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--::subscribe_area part end::-->

    <!-- subscribe_area part start-->
    <section class="client_logo padding_top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="single_client_logo">
                        <img src="{{ URL::asset('/frontend/img/client_logo/client_logo_1.png'); }}" alt="">
                    </div>
                    <div class="single_client_logo">
                        <img src="{{ URL::asset('/frontend/img/client_logo/client_logo_2.png'); }}" alt="">
                    </div>
                    <div class="single_client_logo">
                        <img src="{{ URL::asset('/frontend/img/client_logo/client_logo_3.png'); }}" alt="">
                    </div>
                    <div class="single_client_logo">
                        <img src="{{ URL::asset('/frontend/img/client_logo/client_logo_4.png'); }}" alt="">
                    </div>
                    <div class="single_client_logo">
                        <img src="{{ URL::asset('/frontend/img/client_logo/client_logo_5.png'); }}" alt="">
                    </div>
                    <div class="single_client_logo">
                        <img src="{{ URL::asset('/frontend/img/client_logo/client_logo_3.png'); }}" alt="">
                    </div>
                    <div class="single_client_logo">
                        <img src="{{ URL::asset('/frontend/img/client_logo/client_logo_1.png'); }}" alt="">
                    </div>
                    <div class="single_client_logo">
                        <img src="{{ URL::asset('/frontend/img/client_logo/client_logo_2.png'); }}" alt="">
                    </div>
                    <div class="single_client_logo">
                        <img src="{{ URL::asset('/frontend/img/client_logo/client_logo_3.png'); }}" alt="">
                    </div>
                    <div class="single_client_logo">
                        <img src="{{ URL::asset('/frontend/img/client_logo/client_logo_4.png'); }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
