<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Mativina</title>
    <link rel="icon" href="{{ URL::asset('/frontend/img/logoteam.png'); }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('backend/vendor/fontawesome-free/css/all.min.css') }}">
    
</head>

<body>
    <!--::header part start::-->
    <header class="main_menu home_menu" id="nav_bar">
        <div class="container ">
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
                                    <a class="nav-link" href="{{URL::to('/')}}">Home</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link"  href="{{URL::to('/combo')}}" id="navbarDropdown_1" role="button">
                                        Combo
                                    </a>
                                    <!-- <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                        <a class="dropdown-item" href="#">Combo </a>
                                        <a class="dropdown-item" href="#">New product</a>
                                    </div> -->
                                    <div  aria-labelledby="navbarDropdown_2">

                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="/shop" >
                                    <!-- id="navbarDropdown_3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" -->
                                        Product
                                    </a>
                                 
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="/blog" id="navbarDropdown_2" role="button">
                                        blog
                                    </a>
                                    <div  aria-labelledby="navbarDropdown_2">

                                    </div>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="/contact">Contact</a>
                                </li>
                            </ul>
                        </div>
                        <div class="hearer_icon d-flex">
                            <div class="dropdown navbar__icon" style="margin-top: 5px; padding-top:10px">
                                <a class="navbar__icon" id="search_1" href="javascript:void(0)"><ion-icon name="search-outline"></ion-icon></a>
                            </div>
                            @auth
                                @if(Auth::user()->utype === "USR" || Auth::user()->utype === "ADM" )
                                    <div class="dropdown navbar__icon" style="margin-top: 5px; padding-top:10px">
                                        <a class="navbar__icon">
                                            <ion-icon  name="person-circle-outline" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></ion-icon>
                                        </a>

                                        <div class="dropdown-menu" style="margin-top: 0.125rem" >

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
                                        <div class="dropdown-menu" style="margin-top: 0.125rem"  >

                                            <a class="dropdown-item" title="My Account" href="{{ route('login') }}" style="color:#fefefe">Login</a>
                                            <a class="dropdown-item" title="My Account" href="{{ route('register') }}" style="color:#fefefe">Register</a>
                                        </div>
                                    </div>
                                @endif
                        
                        </div>
                    </nav>
                </div>
            </div>
        </div>
       
        
    </header>
    <!-- Header part end-->

    <!-- banner part start-->
    <div class="bg-video-wrap">
    <video src="{{ URL::asset('/frontend/img/newBackground.mp4'); }}" loop muted autoplay>
    </video>
    <div class="overlay">
    </div>
    <div class="banner-text">
        <h1> Life Is More Fun If You <span style="font-size: 50px">PLAY GAMES</span> </h1>
    </div>
    </div>
    <button onclick="topFunction()" id="myBtn" title="Go to top"><ion-icon name="arrow-up-outline"></ion-icon></button>
    <!-- banner part start-->
    {{$slot}}
    <!--::subscribe_area part end::-->
    
    <!--::footer_part start::-->
    {{-- <footer class="footer-distributed">

			<div class="footer-left">

				<h3>Mativina</h3>
				<p class="footer-links">
					<a href="/" class="link-1">Home</a>
					
					<a href="/blog">Blog</a>
				
					<a href="/shop">Product</a>
					
					<a href="/contact">Contact</a>
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

	</footer> --}}

    <footer class="footer">
        <div class="home-container">
            <div class="footer-row">
                <div class="footer-col-1">
                    <ul>
                        <li>
                            <h3>MATIVINA STORE</h3>
                            <p>We always provide you with the best quality products at a reasonable price. Besides. we have a professional support team. Always consult and make customers satisfied</p>
                        </li>
                        <li>
                            <a href=""><i class="fa fa-map-marker">&#160;&#160;</i>8A Ton That Thuyet, My Dinh, Ha Noi</a>
                        </li>
                        <li>
                            <a href="tel:+849666666666"><i class="fa fa-phone">&#160;&#160;</i>+84-96-6666-6666</a>
                        </li>
                        <li>
                            <a href="mailto:support@cosy.com"><i class="fa fa-envelope">&#160;&#160;</i>support@mantivia.com</a>
                        </li>
                        <div class="social-links">
                            <a href="http://facebook.com"><i class="fab fa-facebook-f"></i></a>
                            <a href="http://twitter.com"><i class="fab fa-twitter"></i></a>
                            <a href="http://instagram.com"><i class="fab fa-instagram"></i></a>
                        </div>
                    </ul>
                </div>
                <div class="footer-col ">
                    <h4>Map</h4>
                    <ul>
                        <li><a href="">Home</a></li>
                        <li><a href="">Combo</a></li>
                        <li><a href="">All Product</a></li>
                        <li><a href="l">Blogs</a></li>
                        <li><a href="">Contact Us</a></li>
                    </ul>
                </div> 

               
                <div class="footer-col">
                    <h4>Store Ha Noi </h4>
                    <div>
                        <ul>    
                            <li>
                                <div class="footer-showroom">
                                    <h1>Store 1</h1>
                                    <p>Adress : <span>79B, Hai Ba Trung, Ha Noi</span></p>
                                    <p>Support : <a href="tel:0693 993 323">0693 993 323</a></p>
                                    <p>Email : <a href="mailto:Cosy_79B@gmail.com">Cosy_79B@gmail.com</a></p>
                                </div>   
                            </li> 

                            <li>
                                <div class="footer-showroom ">
                                    <h1>Store 2</h1>
                                    <p>Adress : <span>8, Ba Dinh, Ha Noi</span></p>
                                    <p>Support : <a  href="tel:0685 221 999">0685 221 999</a></p>
                                    <p>Email : <a href="mailto:Cosy_8BaDinh@gmail.com">Cosy_8Ba@gmail.com</a></p>
                                </div>
                            </li>
                        </ul>
                    </div>   
                </div>
                <div class="footer-col">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.0964841656846!2d105.78010801533206!3d21.02882509315103!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab86cece9ac1%3A0xa9bc04e04602dd85!2zRlBUIEFwdGVjaCBIw6AgTuG7mWkgLSBI4buHIFRo4buRbmcgxJDDoG8gVOG6oW8gTOG6rXAgVHLDrG5oIFZpw6puIFF14buRYyBU4bq_IChTaW5jZSAxOTk5KQ!5e0!3m2!1svi!2s!4v1646650815072!5m2!1svi!2s"  width="100%" height="300px"></iframe>
                </div>
            </div>
        </div>
        <hr>
        <div class="copyright">
            <p>Coyright &#169; 2021 Mativina. All Right Reserved</p>
            <a href="warranty.html">Terms of Use</a>
            <a href="contact.html">Contact Us</a>
        </div>

    </footer>
    <!--::footer_part end::-->


    
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
    <script src="{{ URL::asset('/frontend/js/main.js'); }}"></script>
    <!-- custom js -->
    <script src="{{ URL::asset('/frontend/js/custom.js'); }}"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>   
</body>

</html>