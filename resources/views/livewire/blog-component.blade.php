<div>
    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg1">
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumb_iner">
                <div class="breadcrumb_iner_item">
                <h1 style="color:#fff;text-align:center;margin-top: 35%;" >Blog</h1>
                <p style="color:#fff;text-align:center">Monster computer</p>
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--================Blog Area =================-->
    <section class="blog_area padding_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-5">
                    <div class="blog_left_sidebar">
                        @foreach ($blogs as $item)
                            <article class="blog_item">
                                <div class="blog_item_img">
                                    <img class="card-img rounded-0" src="{{ $item->image }}" alt="">
                                    <a href="#" class="blog_item_date">
                                        <h3>{{ $item->updated_at->format('d') }}</h3>
                                        <p>{{ $item->updated_at->format('M') }}</p>
                                    </a>
                                </div>

                                <div class="blog_details">
                                    <a class="d-inline-block" href="single-blog.html">
                                        <h2>{{ $item->title}}</h2>
                                    </a>
                                    <p>That dominion stars lights dominion divide years for fourth have don't stars is that
                                        he earth it first without heaven in place seed it second morning saying... <a href="{{ route('detail.blog') }}" class="text-primary">Read More</a></p>
                                    {{-- <p>That dominion stars lights dominion divide years for fourth have don't stars is that
                                        he earth it first without heaven in place seed it second morning saying... <a href="{{ Route('blog.detail', ['id'=>$item->id])}}" class="text-primary">Read More</a></p> --}}
                                    <ul class="blog-info-link">
                                        <li><i class="fas fa-user"></i> {{ $item->author }}</li>
                                    </ul>
                                </div>
                            </article>
                        @endforeach
                    </div>
                    <div class="d-flex justify-content-center">
                        {!! $blogs->links() !!}
                    </div>
                </div>
            <style>
            .w-5{
                display: none;
            }
            </style>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Recent Post</h3>
                            @foreach($blogs as $value)
                                <div class="media post_item" >
                                    <img style="width: 100px; height:100px" src="{{ $value->image }}" alt="post">
                                    <div class="media-body">
                                        <a href="{{ route('blog') }}">
                                            <h3>{{ $value->title }}</h3>
                                        </a>
                                        <p>{{$value->updated_at->format('d/m/Y') }}</p>
                                    </div>
                                </div>
                            @endforeach
                          
                        </aside>


                        <aside class="single_sidebar_widget instagram_feeds">
                            <h4 class="widget_title">PC Room Custom</h4>
                            <ul class="instagram_row flex-wrap">
                                <li>
                                    <a href="#">
                                        <img style="width: 100px; height:100px" class="img-fluid" src="{{ URL::asset('/frontend/img/post/1.png'); }}" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img style="width: 100px; height:100px" class="img-fluid" src="{{ URL::asset('/frontend/img/post/2.png'); }}" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img style="width: 100px; height:100px" class="img-fluid" src="{{ URL::asset('/frontend/img/post/4.png'); }}" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img style="width: 100px; height:100px" class="img-fluid" src="{{ URL::asset('/frontend/img/post/3.png'); }}" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img style="width: 100px; height:100px" class="img-fluid" src="{{ URL::asset('/frontend/img/post/5.png'); }}" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img style="width: 100px; height:100px" class="img-fluid" src="{{ URL::asset('/frontend/img/post/6.png'); }}" alt="">
                                    </a>
                                </li>
                            </ul>
                            <a href="" class="text-primary">See more</a>
                        </aside>
                        <aside class="single_sidebar_widget search_widget">
                            <ul class="tags">
                                <li><a href="#" class="tag">Gaming</a></li>
                                <li><a href="#" class="tag">PC</a></li>
                                <li><a href="#" class="tag">Product</a></li>
                                <li><a href="#" class="tag">Card</a></li>
                                <li><a href="#" class="tag">Custom Pc</a></li>
                                <li><a href="#" class="tag">Cooling</a></li>
                                <li><a href="#" class="tag">Wallpaer</a></li>
                                <li><a href="#" class="tag">Tips</a></li>
                                <li><a href="#" class="tag">Combo</a></li>
                              </ul>
                        </aside>


                        <!-- {{-- <aside class="single_sidebar_widget newsletter_widget">
                            <h4 class="widget_title">Newsletter</h4>

                            <form action="#">
                                <div class="form-group">
                                    <input type="email" class="form-control" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Enter email'" placeholder='Enter email' required>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_1"
                                    type="submit">Subscribe</button>
                            </form>
                        </aside> --}} -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->
</div>
