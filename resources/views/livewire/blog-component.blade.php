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
                <div class="col-lg-8 mb-5 mb-lg-0">
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
                                        he earth it first without heaven in place seed it second morning saying... <a href="{{ asset('public/blogs/test') }}" class="text-primary">Read More</a></p>
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
                        <aside class="single_sidebar_widget search_widget">
                            <form action="#">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder='Search Keyword'
                                            onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Search Keyword'">
                                        <div class="input-group-append">
                                            <button class="btn" type="button"><i class="ti-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_1"
                                    type="submit">Search</button>
                            </form>
                        </aside>

                        <!-- {{-- <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Category</h4>
                            <ul class="list cat-list">
                                <li>
                                    <a href="#" class="d-flex">
                                        <p>Resaurant food</p>
                                        <p>(37)</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex">
                                        <p>Travel news</p>
                                        <p>(10)</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex">
                                        <p>Modern technology</p>
                                        <p>(03)</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex">
                                        <p>Product</p>
                                        <p>(11)</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex">
                                        <p>Inspiration</p>
                                        <p>21</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex">
                                        <p>Health Care (21)</p>
                                        <p>09</p>
                                    </a>
                                </li>
                            </ul>
                        </aside> --}} -->

                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Recent Post</h3>
                            <div class="media post_item">
                                <img src="{{ URL::asset('/frontend/img/post/post_1.png'); }}" alt="post">
                                <div class="media-body">
                                    <a href="single-blog.html">
                                        <h3>From life was you fish...</h3>
                                    </a>
                                    <p>January 12, 2019</p>
                                </div>
                            </div>
                            <div class="media post_item">
                                <img src="{{ URL::asset('/frontend/img/post/post_2.png'); }}" alt="post">
                                <div class="media-body">
                                    <a href="single-blog.html">
                                        <h3>The Amazing Hubble</h3>
                                    </a>
                                    <p>02 Hours ago</p>
                                </div>
                            </div>
                            <div class="media post_item">
                                <img src="{{ URL::asset('/frontend/img/post/post_3.png'); }}" alt="post">
                                <div class="media-body">
                                    <a href="single-blog.html">
                                        <h3>Astronomy Or Astrology</h3>
                                    </a>
                                    <p>03 Hours ago</p>
                                </div>
                            </div>
                            <div class="media post_item">
                                <img src="{{ URL::asset('/frontend/img/post/post_4.png'); }}" alt="post">
                                <div class="media-body">
                                    <a href="single-blog.html">
                                        <h3>Asteroids telescope</h3>
                                    </a>
                                    <p>01 Hours ago</p>
                                </div>
                            </div>
                        </aside>
                        <!-- {{-- <aside class="single_sidebar_widget tag_cloud_widget">
                            <h4 class="widget_title">Tag Clouds</h4>
                            <ul class="list">
                                <li>
                                    <a href="#">project</a>
                                </li>
                                <li>
                                    <a href="#">love</a>
                                </li>
                                <li>
                                    <a href="#">technology</a>
                                </li>
                                <li>
                                    <a href="#">travel</a>
                                </li>
                                <li>
                                    <a href="#">restaurant</a>
                                </li>
                                <li>
                                    <a href="#">life style</a>
                                </li>
                                <li>
                                    <a href="#">design</a>
                                </li>
                                <li>
                                    <a href="#">illustration</a>
                                </li>
                            </ul>
                        </aside> --}} -->


                        <aside class="single_sidebar_widget instagram_feeds">
                            <h4 class="widget_title">PC Room Custom</h4>
                            <ul class="instagram_row flex-wrap">
                                <li>
                                    <a href="#">
                                        <img class="img-fluid" src="{{ URL::asset('/frontend/img/post/post_5.png'); }}" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="img-fluid" src="{{ URL::asset('/frontend/img/post/post_6.png'); }}" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="img-fluid" src="{{ URL::asset('/frontend/img/post/post_7.png'); }}" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="img-fluid" src="{{ URL::asset('/frontend/img/post/post_8.png'); }}" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="img-fluid" src="{{ URL::asset('/frontend/img/post/post_9.png'); }}" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="img-fluid" src="{{ URL::asset('/frontend/img/post/post_10.png'); }}" alt="">
                                    </a>
                                </li>
                            </ul>
                            <a href="" class="text-primary">See more</a>
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
