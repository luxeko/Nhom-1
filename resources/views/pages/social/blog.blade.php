<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Mativina</title>
    <link rel="icon" href="{{ URL::asset('/frontend/img/logoteam.png'); }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ URL::asset('/frontend/css/bootstrap.min.css'); }}">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{ URL::asset('/frontend/css/animate.css'); }}">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{ URL::asset('/frontend/css/owl.carousel.min.css'); }}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{ URL::asset('/frontend/css/all.css'); }}">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="{{ URL::asset('/frontend/css/flaticon.css'); }}">
    <link rel="stylesheet" href="{{ URL::asset('/frontend/css/themify-icons.css'); }}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{ URL::asset('/frontend/css/magnific-popup.css'); }}">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="{{ URL::asset('/frontend/css/slick.css'); }}">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{ URL::asset('/frontend/css/style.css'); }}">
    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="{{ URL::asset('frontend/vendor/fontawesome-free/css/all.min.css') }}">
</head>


<body>
    <!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="{{ asset('/public/index') }}"> <img src="{{ URL::asset('/frontend/img/new2.png'); }}" alt="logo"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="menu_icon"><i class="fas fa-bars"></i></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ asset('/public/index') }}"">Home</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_1"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Special
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                        <a class="dropdown-item" href="category.html"> Combo </a>
                                        <a class="dropdown-item" href="single-product.html">New product</a>
                                        
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_3"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Product
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                        <a class="dropdown-item" href="login.html"> cases</a>
                                        <a class="dropdown-item" href="tracking.html">cooling</a>
                                        <a class="dropdown-item" href="checkout.html">components</a>
                                        <a class="dropdown-item" href="cart.html">Audio</a>
                                        <a class="dropdown-item" href="confirmation.html">CAM</a>
                                        <a class="dropdown-item" href="elements.html">accessories</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="blog.html" id="navbarDropdown_2" role="button">
                                        blog
                                    </a>
                                    <div  aria-labelledby="navbarDropdown_2">

                                    </div>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="contact.html">Contact</a>
                                </li>
                            </ul>
                        </div>
                        <div class="hearer_icon d-flex">
                            <a class="navbar__icon" id="search_1" href="javascript:void(0)"><ion-icon name="search-outline"></ion-icon></a>
                            <a class="navbar__icon" href=""><ion-icon name="person-circle-outline"></ion-icon></i></a>
                                <a class="navbar__icon" class="dropdown-toggle navbar__icon" href="#" id="navbarDropdown3" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <ion-icon name="cart-outline"></ion-icon>
                                </a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <div class="search_input" id="search_input_box">
            <div class="container ">
                <form class="d-flex justify-content-between search-inner">
                    <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                    <button type="submit" class="btn"></button>
                    <span class="ti-close" id="close_search" title="Close Search"></span>
                </form>
            </div>
        </div>
    </header>
    <!-- Header part end-->
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

                        {{-- <aside class="single_sidebar_widget post_category_widget">
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
                        </aside> --}}

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
                        {{-- <aside class="single_sidebar_widget tag_cloud_widget">
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
                        </aside> --}}


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


                        {{-- <aside class="single_sidebar_widget newsletter_widget">
                            <h4 class="widget_title">Newsletter</h4>

                            <form action="#">
                                <div class="form-group">
                                    <input type="email" class="form-control" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Enter email'" placeholder='Enter email' required>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_1"
                                    type="submit">Subscribe</button>
                            </form>
                        </aside> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->

    <!--::footer_part start::-->
    <footer class="footer-distributed">

<div class="footer-left">

    <h3>Mativina</h3>

    <p class="footer-links">
        <a href="#" class="link-1">Home</a>
        
        <a href="#">Blog</a>
    
        <a href="#">Product</a>
        
        <a href="#">Contact</a>
    </p>

    <p class="footer-company-name">Matavina © 2015</p>
</div>

<div class="footer-center">

    <div style="display:flex;">
        <ion-icon class="footer_icon" name="location-outline"></ion-icon>
        <p style="padding-left: 10px;">Số 8, Tôn Thất Thuyết, Mỹ Đình, Cầu Giấy</p>
    </div>

    <div style="display:flex;">
        <ion-icon class="footer_icon" name="call-outline"></ion-icon>
        <p style="padding-left: 10px;">+84.987654321</p>
    </div>

    <div style="display:flex;">
        <ion-icon class="footer_icon" name="mail-outline"></ion-icon>
        <p style="padding-left: 10px;"><a href="mailto:support@company.com">support@company.com</a></p>
    </div>

</div>

<div class="footer-right">

    <p class="footer-company-about">
        <span>About the company</span>
        Our company is a place to produce unique computer equipment. Our products have inspired many people to work. Not only that, but we also translate the unique ideas of our customers into our products. products delicately. Hope you find your favorite device and have the best experience!
    </p>

    <div class="footer-icons">

        <a href="#"><ion-icon name="logo-facebook"></ion-icon></a>
        <a href="#"><ion-icon name="logo-instagram"></ion-icon></i></a>
        <a href="#"><ion-icon name="logo-linkedin"></ion-icon></i></a>
        <a href="#"><ion-icon name="logo-github"></ion-icon></i></a>

    </div>

</div>

</footer>
    <!--::footer_part end::-->
    <!-- jquery plugins here-->
    <!-- jquery -->
    <script src="{{ URL::asset('/frontend/js/jquery-1.12.1.min.js'); }}"></script>
    <!-- popper js -->
    <script src="{{ URL::asset('/frontend/js/popper.min.js'); }}"></script>
    <!-- bootstrap js -->
    <script src="{{ URL::asset('/frontend/js/bootstrap.min.js'); }}"></script>
    <!-- easing js -->
    <script src="{{ URL::asset('/frontend/js/jquery.magnific-popup.js'); }}"></script>
    <!-- swiper js -->
    <script src="{{ URL::asset('/frontend/js/swiper.min.js'); }}"></script>
    <!-- swiper js -->
    <script src="{{ URL::asset('/frontend/js/masonry.pkgd.js'); }}"></script>
    <!-- particles js -->
    <script src="{{ URL::asset('/frontend/js/owl.carousel.min.js'); }}"></script>
    <script src="{{ URL::asset('/frontend/js/jquery.nice-select.min.js'); }}"></script>
    <!-- slick js -->
    <script src="{{ URL::asset('/frontend/js/slick.min.js'); }}"></script>
    <script src="{{ URL::asset('/frontend/js/jquery.counterup.min.js'); }}"></script>
    <script src="{{ URL::asset('/frontend/js/waypoints.min.js'); }}"></script>
    <script src="{{ URL::asset('/frontend/js/contact.js'); }}"></script>
    <script src="{{ URL::asset('/frontend/js/jquery.ajaxchimp.min.js'); }}"></script>
    <script src="{{ URL::asset('/frontend/js/jquery.form.js'); }}"></script>
    <script src="{{ URL::asset('/frontend/js/jquery.validate.min.js'); }}"></script>
    <script src="{{ URL::asset('/frontend/js/mail-script.js'); }}"></script>
    <!-- custom js -->
    <script src="{{ URL::asset('/frontend/js/custom.js'); }}"></script>
    <script src="{{ URL::asset('/frontend/js/custom.js'); }}"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script>
</body>

</html>