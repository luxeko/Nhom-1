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
  @livewireStyles
</head>

<body>
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
                                <a class="nav-link" href="index.html">Home</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_1"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Shop
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                    <a class="dropdown-item" href="category.html"> shop category</a>
                                    <a class="dropdown-item" href="single-product.html">product details</a>
                                    
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_3"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    pages
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                    <a class="dropdown-item" href="login.html"> login</a>
                                    <a class="dropdown-item" href="tracking.html">tracking</a>
                                    <a class="dropdown-item" href="checkout.html">product checkout</a>
                                    <a class="dropdown-item" href="cart.html">shopping cart</a>
                                    <a class="dropdown-item" href="confirmation.html">confirmation</a>
                                    <a class="dropdown-item" href="elements.html">elements</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_2"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    blog
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                    <a class="dropdown-item" href="blog.html"> blog</a>
                                    <a class="dropdown-item" href="single-blog.html">Single blog</a>
                                </div>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="contact.html">Contact</a>
                            </li>
                        </ul>
                    </div>
                    <div class="hearer_icon d-flex">
                        <a id="search_1" href="javascript:void(0)"><i class="ti-search"></i></a>
                        <a href=""><i class="ti-heart"></i></a>
                        <div class="dropdown cart">
                            <a class="dropdown-toggle" href="#" id="navbarDropdown3" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-cart-plus"></i>
                            </a>
                            <!-- <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <div class="single_product">

                                </div>
                            </div> -->
                            
                        </div>
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
              <h2>Cart Products</h2>
              <p>Home <span>-</span>Cart Products</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- breadcrumb start-->

  <!--================Cart Area =================-->
  <section class="cart_area padding_top">
    <div class="container">
      <div class="cart_inner">
        <div class="table-responsive">
          @if(Cart::count() > 0)
            <table class="table">
              <thead>
                <tr>
                  <th class="text-center" scope="col">Product</th>
                  <th class="text-center" scope="col">Name</th>
                  <th scope="col">Price</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Subtotal</th>
                </tr>
              </thead>
              <tbody>
                @foreach (Cart::content() as $item)
                <tr>
                  <td colspan=1 style="width: 20%">
                    <div class="media d-flex flex-column">
                      <div class="">
                        <img src="{{ ('frontend/img/case')}}/{{$item->model->feature_image_path }}" alt="{{$item->model->name}}" style="width: 100%"/>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="text-center">
                      <a href=""><p>{{$item->model->name}}</p></a>
                    </div>
                  </td>
                  <td >
                    <h5>${{$item->model->price}}</h5>
                  </td>
                  <td>
                  <div class="quantity">
                    <div class="product_count">
                      
                      <span class="input-number-increment"><a class="ti-angle-up"wire:click.prevent="increaseQuantity('{{$item->rowId}}')"></a></span>                                            
                      <span class="input-number-decrement"><a class="ti-angle-down" wire:click.prevent="decreaseQuantity('{{$item->rowId}}')"></a></span>
                      <input class="input-number" type="text" value="{{$item->qty}}" data-max="120" pattern="[0-9]*">
                    </div>
                  </div>
                  </td>
                  <td>
                    <h5>${{$item->subtotal()}}</h5>
                  </td>
                </tr>
                @endforeach
                <!-- <tr class="bottom_button">
                  <td>
                    <a class="btn_1" href="#">Update Cart</a>
                  </td>
                  <td></td>
                  <td></td>
                  <td>
                    <div class="cupon_text float-right">
                    </div>
                  </td>
                </tr> -->
                <tr class="shipping_area">
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>
                    <h5>Subtotal</h5>
                  </td>
                  <td>
                    <h5>${{Cart::subtotal()}}</h5>
                  </td>
                </tr>
                <tr class="shipping_area">
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>
                    <h5>Tax</h5>
                  </td>
                  <td>
                    <h5>${{Cart::tax()}}</h5>
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>
                    <h5>Shipping</h5>
                  </td>
                  <td>
                    <div class="shipping_box">
                        <ul class="list">
                          <li>
                            <h5>Free shipping</h5>
                          </li>
                        </ul>
                      </div>
                  </td>
                </tr>
                <tr class="shipping_area">
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>
                    <h5>Total</h5>
                  </td>
                  <td>
                    <h5>${{Cart::total()}}</h5>
                  </td>
                </tr>
              </tbody>
            </table>
            <div class="checkout_btn_inner float-right">
              <a class="btn_1" href="/">Continue Shopping</a>
              <a class="btn_1 checkout_btn_1" href="#" wire:click.prevent="checkout">Proceed to checkout</a>
            </div>
          @else
            <div class="text-center" style="padding:30px 0;">
              <h1>Your cart is empty!</h1>
              <p>Add item to it now</p>
              <a href="/" class="btn btn-success">Shop Now</a>
            </div>
          @endif
        </div>
      </div>
    </div>
  </section>
  <!--================End Cart Area =================-->

  <!--::footer_part start::-->
  <footer class="footer_part">
    <div class="container">
      <div class="row justify-content-around">
        <div class="col-sm-6 col-lg-2">
          <div class="single_footer_part">
            <h4>Top Products</h4>
            <ul class="list-unstyled">
              <li><a href="">Managed Website</a></li>
              <li><a href="">Manage Reputation</a></li>
              <li><a href="">Power Tools</a></li>
              <li><a href="">Marketing Service</a></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-lg-2">
          <div class="single_footer_part">
            <h4>Quick Links</h4>
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
            <h4>Resources</h4>
            <ul class="list-unstyled">
              <li><a href="">Guides</a></li>
              <li><a href="">Research</a></li>
              <li><a href="">Experts</a></li>
              <li><a href="">Agencies</a></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-lg-4">
          <div class="single_footer_part">
            <h4>Newsletter</h4>
            <p>Heaven fruitful doesn't over lesser in days. Appear creeping
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
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></P>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="footer_icon social_icon">
              <ul class="list-unstyled">
                <li><a href="#" class="single_social_icon"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#" class="single_social_icon"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#" class="single_social_icon"><i class="fas fa-globe"></i></a></li>
                <li><a href="#" class="single_social_icon"><i class="fab fa-behance"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!--::footer_part end::-->

  <!-- jquery plugins here-->
  <!-- jquery -->
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
</body>

</html>