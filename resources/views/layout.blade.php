<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Computer Store</title>
    <link rel="icon" href="{{ URL::asset('/frontend/img/favicon.png'); }}">
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
    <link rel="stylesheet" href="{{ URL::asset('/frontend/css/price_rangs.css'); }}">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{ URL::asset('/frontend/css/style.css'); }}">
</head>

<body>
    <button onclick="topFunction()" id="myBtn" title="Go to top"><ion-icon name="arrow-up-outline"></ion-icon></button>
    <!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="index.html"> <img src="{{ URL::asset('/frontend/img/logo.png'); }}" alt="logo"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="menu_icon"><i class="fas fa-bars"></i></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{URL::to('/home')}}">Home</a>
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
    <!--================Home Banner Area =================-->
    @yield('all_products')
    @yield('detail')
    @yield('audio')
    @yield('cam')
    @yield('cases')
    @yield('components')
    @yield('cooling')

    <!--::footer_part start::-->
    <footer class="footer_part">
        <div class="container">
            <div class="row justify-content-around">
                <div class="col-sm-6 col-lg-2">
                    <div class="single_footer_part">
                    <h4>Contact</h4>
                        <ul class="list-unstyled">
                            <li><a href="">Company</a></li>
                            <li><a href="">Custom support</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-2">
                    <div class="single_footer_part">
                        <h4>About us</h4>
                        <ul class="list-unstyled">
                            <li><a href="">Q & A</a></li>
                            <li><a href="">Careers</a></li>
                            <li><a href="">Customer review</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-2">
                    <div class="single_footer_part">
                        <h4>Features</h4>
                        <ul class="list-unstyled">
                            <li><a href="">Jobs</a></li>
                            <li><a href="">Brand Assets</a></li>
                            <li><a href="">Investor Relations</a></li>
                            <li><a href="">Terms of Service</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-2">
                    <div class="single_footer_part">
                        <h4>Community</h4>
                        <ul class="list-unstyled">
                            <li><a href="">Our discord</a></li>
                            <li><a href="">Blog</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="single_footer_part">
                        <h4>Notification</h4>
                        <p>Please to back information if as you want to accept the new message of us, I want to receive our latest notifications
                        </p>
                        <div id="mc_embed_signup">
                            <form target="_blank"
                                action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                                method="get" class="subscribe_form relative mail_part">
                                <input type="email" name="email" id="newsletter-form-email" placeholder="Email Address"
                                    class="placeholder hide-on-focus" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = ' Email Address '">
                                <button type="submit" name="submit" id="newsletter-submit"
                                    class="email_icon newsletter-submit button-contactForm">subscribe</button>
                                <div class="mt-10 info"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="copyright_part">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="copyright_text">
                            <P><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Hope you will have the best experience with our products <i class="ti-heart" aria-hidden="true"></i> by <a href="https://github.com/maibica00" target="_blank">team 1</a>
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
    <script src="{{ URL::asset('/frontend/js/stellar.js'); }}"></script>
    <script src="{{ URL::asset('/frontend/js/price_rangs.js'); }}"></script>
    <!-- custom js -->
    <script src="{{ URL::asset('/frontend/js/custom.js'); }}"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script>
$(document).ready(function(){

 $(document).on('click', '.pagination a', function(event){
  event.preventDefault(); 
  var page = $(this).attr('href').split('page=')[1];
  fetch_data(page);
 });

 function fetch_data(page)
 {
  $.ajax({
   url:"/all_product/fetch_data?page="+page,
   success:function(data)
   {
    $('#table_data').html(data);
   }
  });
 }
 
});
</script>
</body>

</html>
