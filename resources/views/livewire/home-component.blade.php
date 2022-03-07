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
                    <h3>Latest CPUs</h3>
                    <a href="#" class="feature_btn">EXPLORE NOW <ion-icon name="cart-outline"></ion-icon></a>
                    <img src="{{ URL::asset('/frontend/img/index/4.png'); }}" alt="" width="350px">
                </div>
            </div>
            <div class="col-lg-5 col-sm-6">
                <div class="single_feature_post_text">
                    <p>Premium Quality</p>
                    <h3>Latest microphone</h3>
                    <a href="#" class="feature_btn">EXPLORE NOW <ion-icon name="cart-outline"></ion-icon></a>
                    <img src="{{ URL::asset('/frontend/img/index/8.png'); }}"  width="270px">
                </div>
            </div>
            <div class="col-lg-5 col-sm-6">
                <div class="single_feature_post_text">
                    <p>Premium Quality</p>
                    <h3>Latest headphones</h3>
                    <a href="#" class="feature_btn">EXPLORE NOW <ion-icon name="cart-outline"></ion-icon></a>
                    <img src="{{ URL::asset('/frontend/img/index/11.png'); }}" alt="" width="270px">
                </div>
            </div>
            <div class="col-lg-7 col-sm-6">
                <div class="single_feature_post_text">
                    <p>Premium Quality</p>
                    <h3>Latest cooling</h3>
                    <a href="#" class="feature_btn">EXPLORE NOW <ion-icon name="cart-outline"></ion-icon></a>
                    <img src="{{ URL::asset('/frontend/img/index/9.png'); }}" alt="" width="440px">
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
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-lg-6 col-md-6">
                    <div class="offer_text">
                        <h2 class="text-white">Weekly Sale on 60% Off All Products</h2>
                        <div class="date_countdown">
                            <div id="timer">
                                <div id="days" class="date text-white"></div>
                                <div id="hours" class="date text-white"></div>
                                <div id="minutes" class="date text-white"></div>
                                <div id="seconds" class="date text-white"></div>
                            </div>
                        </div>
                        @if(Session::has('email-message'))
                            <div class="alert alert-success" style="width: 50%;">
                                {{Session::get('email-message')}}
                            </div>
                        @endif
                        <div class="input-group align-items-center justify-content-center">
                            <form wire:submit.prevent="subscribe">
                                <div class="d-flex flex-row">
                                    <input type="email" name="email" class="form-control" placeholder="enter email address" wire:model="email"
                                        aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    @error('email') <span class="text-danger">{{$message}}</span> @enderror
                                    <div class="input-group ml-3">
                                        <button type="submit" class="input-group-text btn_2">book now</button>
                                    </div>
                                </div>
                            </form>
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
                        <h2>Lastest <span>shop</span></h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-12">
                    <div class="best_product_slider owl-carousel">
                        @foreach($lproducts as $item)
                        <div class="single_product_item">
                            <a href="{{route('product.details', ['slug'=>$item->slug])}}"><img src="{{$item->feature_image_path}}" alt=""></a>
                            <div class="single_product_text">
                                <a href="{{route('product.details', ['slug'=>$item->slug])}}" style="color:$fefefe; opacity: 100; visibility: visible;"><h4><span>{{$item->name}}</span></h4></a>
                                <h3>{{number_format($item->price,0,',','.')}}</h3>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product_list part end-->

    {{-- blog starts  --}}
    <section class="blog_public_main">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section_tittle text-center">
                    <h2>Blogs</h2>
                </div>
            </div>
        </div>
        <div class="blog_public_container">
            <div class="blog_public_box">
                <div class="blog_public_item">
                    <img src="{{ URL::asset('/frontend/img/gamingroom1.jpg'); }}" class="blog_public_image">
                    <div>
                        <h2>
                            TEst title
                        </h2>
                        <p>Content here</p>
                    </div>
                </div>
                <div class="blog_public_item">
                    <img src="{{ URL::asset('/frontend/img/gamingroom5.jpg'); }}" class="blog_public_image">
                </div>
                <div class="blog_public_item">
                    <img src="{{ URL::asset('/frontend/img/gamingroom6.jpg'); }}" class="blog_public_image">
                </div>
                <div class="blog_public_item">
                    <img src="{{ URL::asset('/frontend/img/gamingroom7.jpg'); }}" class="blog_public_image">
                </div>
                <div class="blog_public_item">
                    <img src="{{ URL::asset('/frontend/img/gamingroom8.jpg'); }}" class="blog_public_image">
                </div>
                <div class="blog_public_item">
                    <img src="{{ URL::asset('/frontend/img/gamingroom3.jpg'); }}" class="blog_public_image">
                </div>
            </div>
        </div>
    </section>
    {{-- blog ends  --}}

    <!---------- Testimonial ---------->
     <section class="mt-5">
         <div class="row justify-content-center">
             <div class="col-lg-12">
                 <div class="section_tittle text-center">
                     <h2>Feedback</h2>
                 </div>
             </div>
         </div>
        <div class="feedback">
            <div class="home-testimonial">
                <div class="home-row">

                    <div class="home-col-2">
                        <div class="tes-info">
                            <img src="{{ URL::asset('/frontend/img/avatar/s1mple.jpg'); }}">
                            <div>
                                <h4>S1mple Leo</h4>
                                <p>Pro Gamer</p>
                            </div>
                        </div> 
                        <p> <i class="fa fa-quote-left"> </i>&#160;&#160; Great product and service from the team at MATIVINA. Thank you for support. @s1mpleleo</p>   
                    </div>
                    <div class="home-col-2">                      
                       
                        <div class="tes-info">
                            <img src="{{ URL::asset('/frontend/img/avatar/niko.jpg'); }}">
                            <div>
                                <h4>Niko Kovač</h4>
                                <p>Pro Gamer</p>
                            </div>
                        </div> 
                        <p><i class="fa fa-quote-left"></i>&#160;&#160; i hate having my game drop in fps. And MATINIVA helped me overcome it. @nikocsgo</p>
                    </div>
                    <div class="home-col-2">                       
                        <div class="tes-info">
                            <img src="{{ URL::asset('/frontend/img/avatar/faker.jpg'); }}">
                            <div>
                                <h4>Faker</h4>
                                <p>Pro Gamer</p>
                            </div>
                        </div>  
                        <p><i class="fa fa-quote-left"></i>&#160;&#160; Come with MATIVINA if you want pro like me. @fake_r</p>
                    </div>
                    <div class="home-col-2">
                        <div class="tes-info">
                            <img src="{{ URL::asset('/frontend/img/avatar/domixi.jpg'); }}">
                            <div>
                                <h4>Mixi Moi</h4>
                                <p>Streamer</p>
                            </div>
                        </div> 
                        <p><i class="fa fa-quote-left"></i>&#160;&#160; Cuộc sống này phức tạp là do bạn làm quá nó lên. @mixigaming</p>
                    </div>
                </div>
            </div>
        </div>
     </section>


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
