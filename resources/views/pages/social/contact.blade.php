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
</head>

<body>
  <!--::header part start::-->
  <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="{{URL::to('/home')}}"> <img src="{{ URL::asset('/frontend/img/new2.png'); }}" alt="logo"> </a>
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
                                    <a class="nav-link dropdown-toggle" href="{{URL::to('/home')}}" id="navbarDropdown_1"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Special
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                        <a class="dropdown-item" href="{{URL::to('/home')}}"> Combo </a>
                                        <a class="dropdown-item" href="{{URL::to('/home')}}">New product</a>
                                        
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_3"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Product
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                        <a class="dropdown-item" href="{{URL::to('/cases')}}"> cases</a>
                                        <a class="dropdown-item" href="{{URL::to('/cooling')}}">cooling</a>
                                        <a class="dropdown-item" href="{{URL::to('/components')}}">components</a>
                                        <a class="dropdown-item" href="{{URL::to('/audio')}}">Audio</a>
                                        <a class="dropdown-item" href="{{URL::to('/cam')}}">CAM</a>
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
                            <a class="navbar__icon" id="search_1" href="javascript:void(0)"><ion-icon name="search-outline"></ion-icon></a>
                            <a class="navbar__icon" href="{{URL::to('/login')}}"><ion-icon name="person-circle-outline"></ion-icon></i></a>
                                <a class="navbar__icon" class="dropdown-toggle navbar__icon" href="{{URL::to('/cart')}}" id="navbarDropdown3" role="button"
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
  <!-- breadcrumb start-->
  <section class="breadcrumb breadcrumb_bg">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="breadcrumb_iner">
            <div class="breadcrumb_iner_item">
              <h2>contact us</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- breadcrumb start-->

  <!-- ================ contact section start ================= -->
  <section class="contact-section padding_top">
    <div class="container">
      <div class="d-none d-sm-block mb-5 pb-4">
        <div id="map" style="height: 480px;"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.0964841656846!2d105.78010801533206!3d21.02882509315103!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab86cece9ac1%3A0xa9bc04e04602dd85!2zRlBUIEFwdGVjaCBIw6AgTuG7mWkgLSBI4buHIFRo4buRbmcgxJDDoG8gVOG6oW8gTOG6rXAgVHLDrG5oIFZpw6puIFF14buRYyBU4bq_IChTaW5jZSAxOTk5KQ!5e0!3m2!1svi!2s!4v1646216209564!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe></div>
        {{-- <script>
          function initMap() {
            var uluru = {
              lat: -25.363,
              lng: 131.044
            };
            var grayStyles = [{
                featureType: "all",
                stylers: [{
                    saturation: -90
                  },
                  {
                    lightness: 50
                  }
                ]
              },
              {
                elementType: 'labels.text.fill',
                stylers: [{
                  color: '#ccdee9'
                }]
              }
            ];
            var map = new google.maps.Map(document.getElementById('map'), {
              center: {
                lat: -31.197,
                lng: 150.744
              },
              zoom: 9,
              styles: grayStyles,
              scrollwheel: false
            });
          }
        </script>
        <script
          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpfS1oRGreGSBU5HHjMmQ3o5NLw7VdJ6I&callback=initMap">
        </script> --}}

      </div>


      <div class="row">
        <div class="col-12">
          <h2 class="contact-title">Get in Touch</h2>
        </div>
        <div class="col-lg-8">
          <form class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm"
            novalidate="novalidate">
            <div class="row">
              <div class="col-12">
                <div class="form-group">

                  <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9"
                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'"
                    placeholder='Enter Message'></textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" name="name" id="name" type="text" onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Enter your name'" placeholder='Enter your name'>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" name="email" id="email" type="email" onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Enter email address'" placeholder='Enter email address'>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <input class="form-control" name="subject" id="subject" type="text" onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Enter Subject'" placeholder='Enter Subject'>
                </div>
              </div>
            </div>
            <div class="form-group mt-3">
              <a href="#" class="btn_3 button-contactForm">Send Message</a>
            </div>
          </form>
        </div>
        <div class="col-lg-4">
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-home"></i></span>
            <div class="media-body">
              <h3>8 Tôn Thất Thuyết</h3>
              <p>Mỹ Đình, Hà Nội</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
            <div class="media-body">
              <h3>00 (440) 9865 562</h3>
              <p>Mon to Fri 9am to 6pm</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-email"></i></span>
            <div class="media-body">
              <h3>eprojecttestmail@gmail.com</h3>
              <p>Send us your query anytime!</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ================ contact section end ================= -->

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
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>