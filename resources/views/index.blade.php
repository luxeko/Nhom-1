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
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/nouislider.min.css') }}"> -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('backend/vendor/fontawesome-free/css/all.min.css') }}">
    @livewireStyles
</head>

<body>
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
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{URL::to('/')}}">Home</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="{{URL::to('/home')}}" id="navbarDropdown_1"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Special
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                        <a class="dropdown-item" href="#"> Combo </a>
                                        <a class="dropdown-item" href="#">New product</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="/shop" >
                                    <!-- id="navbarDropdown_3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" -->
                                        Product
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                        <a class="dropdown-item" href="/case">cases</a>
                                        <a class="dropdown-item" href="/cooling">cooling</a>
                                        <a class="dropdown-item" href="/component">components</a>
                                        <a class="dropdown-item" href="/audio">Audio</a>
                                        <a class="dropdown-item" href="/cam">CAM</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="{{ asset('public/blogs/index') }}" id="navbarDropdown_2" role="button">
                                        blog
                                    </a>
                                    <div  aria-labelledby="navbarDropdown_2">

                                    </div>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="{{URL::to('/contact')}}">Contact</a>
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
                                            <a class="dropdown-item" title="My Account" href="{{route('user.dashboard')}}" style="color:#fefefe">Dashboard</a>
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

    <!-- banner part start-->
    <div class="bg-video-wrap">
    <video src="{{ URL::asset('/frontend/img/background.mp4'); }}" loop muted autoplay>
    </video>
    <div class="overlay">
    </div>
    <div class="banner-text">
        <h1> The H1
        </h1>
    </div>
    </div>
    <button onclick="topFunction()" id="myBtn" title="Go to top"><ion-icon name="arrow-up-outline"></ion-icon></button>
    <!-- banner part start-->
    {{$slot}}
    <!--::subscribe_area part end::-->
    
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
    @livewireScripts
    <!-- jquery plugins here-->
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
    
    <!-- slick js -->
    <script src="{{ URL::asset('/frontend/js/slick.min.js'); }}"></script>
    <script src="{{ URL::asset('/frontend/js/jquery.counterup.min.js'); }}"></script>
    <script src="{{ URL::asset('/frontend/js/waypoints.min.js'); }}"></script>
    <script src="{{ URL::asset('/frontend/js/contact.js'); }}"></script>
    <script src="{{ URL::asset('/frontend/js/jquery.ajaxchimp.min.js'); }}"></script>
    <script src="{{ URL::asset('/frontend/js/jquery.form.js'); }}"></script>
    <script src="{{ URL::asset('/frontend/js/jquery.validate.min.js'); }}"></script>
    <script src="{{ URL::asset('/frontend/js/mail-script.js'); }}"></script>
    <script src="{{ URL::asset('/frontend/js/functions.js'); }}"></script>
    <!-- <script src="{{ URL::asset('/frontend/js/nouislider.min.js'); }}"></script> -->
    <!-- custom js -->
    <script src="{{ URL::asset('/frontend/js/custom.js'); }}"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- <script>
        var slider = document.getElementById('slider');

        noUiSlider.create(slider, {
            start: [20, 80],
            connect: true,
            range: {
                'min': 0,
                'max': 100
            }
        });
    </script> -->
    
</body>

</html>