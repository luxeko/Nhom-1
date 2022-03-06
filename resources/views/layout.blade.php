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
    <!-- nice select CSS -->
    <link rel="stylesheet" href="{{ URL::asset('/frontend/css/nice-select.css'); }}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{ URL::asset('/frontend/css/all.css'); }}">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="{{ URL::asset('/frontend/css/flaticon.css'); }}">
    <link rel="stylesheet" href="{{ URL::asset('/frontend/css/themify-icons.css'); }}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{ URL::asset('/frontend/css/magnific-popup.css'); }}">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="{{ URL::asset('/frontend/css/slick.css'); }}">
    <!-- <link rel="stylesheet" href="{{ URL::asset('/frontend/css/price_rangs.css'); }}"> -->
    <!-- style CSS -->
    <link rel="stylesheet" href="{{ URL::asset('/frontend/css/style.css'); }}">
    <!-- css trang checkout -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/style-01.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/color-01.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/nouislider.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('backend/vendor/fontawesome-free/css/all.min.css') }} " >
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
    @livewireStyles
</head>

<body>
    <button onclick="topFunction()" id="myBtn" title="Go to top"><ion-icon name="arrow-up-outline"></ion-icon></button>
    <!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="/"> <img src="{{ URL::asset('/frontend/img/new2.png'); }}" alt="logo"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="menu_icon"><i class="fas fa-bars"></i></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                            <ul class="navbar-nav" style="margin-top: 20px;">
                                <li class="nav-item">
                                    <a class="nav-link" href="/">Home</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_1"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Special
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                        <a class="dropdown-item" href="">Combo </a>
                                        <a class="dropdown-item" href="">New product</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="/shop" >
                                    <!-- id="navbarDropdown_3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" -->
                                        Product
                                    </a>
                                    @livewire('header-category-component');
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="{{ asset('public/blogs/index') }}" id="navbarDropdown_2" role="button">
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
                            <div class="dropdown navbar__icon" style="margin-top: 5px; padding-top:10px">
                                <a class="navbar__icon" id="search_1" href="javascript:void(0)"><ion-icon name="search-outline"></ion-icon></a>
                            </div>
                            @auth
                                @if(Auth::user()->utype === "USR")
                                    <div class="dropdown navbar__icon" style="margin-top: 5px; padding-top:10px">
                                        <a class="navbar__icon">
                                            <ion-icon  name="person-circle-outline" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></ion-icon>
                                        </a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" title="My Account" href="" style="color:#fefefe">My Account ({{Auth::user()->name}})</a>
                                            <!-- <a class="dropdown-item" title="My Account" href="{{route('user.dashboard')}}" style="color:#fefefe">Dashboard</a> -->
                                            <a class="dropdown-item" title="My Orders" href="{{ route('user.orders') }}">My Orders</a>
                                        <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="{{ route('logout') }}" style="color:#fefefe"
                                            onclick="event.preventDefault() document.getElementById('logout-form').submit()";>Logout</a>
                                        </div>
                                        <form id="logout-form" method="POST" action="{{route('logout')}}">
                                            @csrf
                                        </form>
                                    </div>
                                @endif
                            @else
                                <div class="dropdown navbar__icon" style="margin-top: 5px; padding-top:10px">
                                    <a class="navbar__icon">
                                        <ion-icon  name="person-circle-outline" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></ion-icon>
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" title="My Account" href="{{ route('login') }}" style="color:#fefefe">Login</a>
                                        <a class="dropdown-item" title="My Account" href="{{ route('register') }}" style="color:#fefefe">Register</a>
                                    </div>
                                </div>
                            @endif

                            @livewire('cart-count-component')
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        @livewire('header-search-component')
    </header>
    <!-- Header part end-->
    <!--================Home Banner Area =================-->
<<<<<<< HEAD
<<<<<<< HEAD
    @yield('all_products')
    @yield('detail')
    @yield('audio')
    @yield('cam')
    @yield('cases')
    @yield('components')
    @yield('cooling')
    @yield('combo')
=======
	
    {{$slot}}
>>>>>>> e960135583243601a50389da9258ef4e41130b40
=======

	
    {{$slot}}

>>>>>>> 8c95c5f9c503abb1ffbd3dcea236a5cd7c734a68

    <!--::footer_part start::-->
    <footer class="footer-distributed">

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 8c95c5f9c503abb1ffbd3dcea236a5cd7c734a68
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
<<<<<<< HEAD
=======
        </div>
        <div class="copyright_part">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="copyright_text">
                            <P><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved&nbsp;<i class="ti-heart" aria-hidden="true"></i> by <a href="https://github.com/luxeko/Nhom-1.git" target="_blank" class="text-primary">team 1</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></P>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="footer_icon social_icon">
                            <ul class="list-unstyled">
                                <li><a href="#" class="single_social_icon"><ion-icon name="logo-facebook"></ion-icon></a></li>
                                <li><a href="#" class="single_social_icon"><ion-icon name="logo-twitter"></ion-icon></a></li>
                                <li><a href="#" class="single_social_icon"><ion-icon name="logo-instagram"></ion-icon></a></li>
                                <li><a href="#" class="single_social_icon"><ion-icon name="logo-github"></ion-icon></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
>>>>>>> e960135583243601a50389da9258ef4e41130b40
=======

>>>>>>> 8c95c5f9c503abb1ffbd3dcea236a5cd7c734a68
    <!--::footer_part end::-->

    <!-- jquery plugins here-->
    @livewireScripts
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
    <!-- <script src="{{ URL::asset('/frontend/js/jquery.nice-select.min.js'); }}"></script> -->
    <!-- slick js -->
    <script src="{{ URL::asset('/frontend/js/slick.min.js'); }}"></script>
    <script src="{{ URL::asset('/frontend/js/jquery.counterup.min.js'); }}"></script>
    <script src="{{ URL::asset('/frontend/js/waypoints.min.js'); }}"></script>
    <script src="{{ URL::asset('/frontend/js/contact.js'); }}"></script>
    <script src="{{ URL::asset('/frontend/js/jquery.ajaxchimp.min.js'); }}"></script>
    <script src="{{ URL::asset('/frontend/js/jquery.form.js'); }}"></script>
    <script src="{{ URL::asset('/frontend/js/jquery.validate.min.js'); }}"></script>
    <script src="{{ URL::asset('/frontend/js/mail-script.js'); }}"></script>
    <script src="{{ URL::asset('/frontend/js/stellar.js'); }}"></script>
    <!-- <script src="{{ URL::asset('/frontend/js/price_rangs.js'); }}"></script> -->
    <script src="{{ URL::asset('/frontend/js/functions.js'); }}"></script>
    <script src="{{ URL::asset('/frontend/js/nouislider.min.js'); }}"></script>
    <!-- custom js -->
    <script src="{{ URL::asset('/frontend/js/custom.js'); }}"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
