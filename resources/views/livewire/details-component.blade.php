<div>
    @if(Session::has('success_message'))
      <div class="alert alert-success">
        <strong>Success</strong> {{Session::get('success_message')}}
      </div>
    @endif
    <div class="content-container">
        <div class="left-container">
            <div class="product-image-container">
                <img class="product-image-featured" 
                  id="featured" src="{{$product->feature_image_path}}"
                  alt="Canon Image">
                <ul class="product-image-list">
                  @foreach($product_image_detail as $item)
                    <li class="item-selected">
                        <img src="{{$item->image_path}}" class="product-image-item"
                        alt="Canon Image">
                    </li>
                  @endforeach
                </ul>
            </div>
        </div>
        <div class="right-container">
            <div>
                <h1 class="title">{{$product->name}}</h1>
                <h2 class="subtitle subtitle-container">
                    Mirrorless with EF-M 15-45 is STM Lens
                </h2>
             <div>
          </div>
         </div>
        <span>
            <p>Price: <span class="price">${{number_format($product->price,0,',','.')}}</span></p>
            <div style="display:flex">
              <label for="quantity" style="padding-top: 3px;margin-right: 10px;">Quantity:</label>
              <div class="buttons_added">
                <input class="minus is-form" type="button" value="-">
                <input aria-label="quantity" class="input-qty" max="100" min="1" name="" type="number" value="1">
                <input class="plus is-form" type="button" value="+">
              </div>
            </div>
          </span>
          <div>
            <h2 class="title">Product Description</h2>
            <div class="subtitle-container">
                <span>Display: 3 inches</span>
                <span>|</span>
                <span>Color: Black</span>
            </div> {{$product->content}}
        </div>
        <div style="margin-top:20px"><button class="btn" wire:click.prevent="store( {{$product->id}}, '{{$product->name}}', {{$product->price}} )">Add To Cart</button></div>
    </div>
    </div>
  <!--================End Single Product Area =================-->

  <!--================Product Description Area =================-->
  <section class="product_description_area">
    <div class="container">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
            aria-selected="true">Description</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
            aria-selected="false">Specification</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
            aria-selected="false">Comments</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review"
            aria-selected="false">Reviews</a>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
          <p>
            Beryl Cook is one of Britain’s most talented and amusing artists
            .Beryl’s pictures feature women of all shapes and sizes enjoying
            themselves .Born between the two world wars, Beryl Cook eventually
            left Kendrick School in Reading at the age of 15, where she went
            to secretarial school and then into an insurance office. After
            moving to London and then Hampton, she eventually married her next
            door neighbour from Reading, John Cook. He was an officer in the
            Merchant Navy and after he left the sea in 1956, they bought a pub
            for a year before John took a job in Southern Rhodesia with a
            motor company. Beryl bought their young son a box of watercolours,
            and when showing him how to use it, she decided that she herself
            quite enjoyed painting. John subsequently bought her a child’s
            painting set for her birthday and it was with this that she
            produced her first significant work, a half-length portrait of a
            dark-skinned lady with a vacant expression and large drooping
            breasts. It was aptly named ‘Hangover’ by Beryl’s husband and
          </p>
          <p>
            It is often frustrating to attempt to plan meals that are designed
            for one. Despite this fact, we are seeing more and more recipe
            books and Internet websites that are dedicated to the act of
            cooking for one. Divorce and the death of spouses or grown
            children leaving for college are all reasons that someone
            accustomed to cooking for more than one would suddenly need to
            learn how to adjust all the cooking practices utilized before into
            a streamlined plan of cooking that is more efficient for one
            person creating less
          </p>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
          <div class="table-responsive">
            <table class="table">
              <tbody>
                <tr>
                  <td>
                    <h5>Width</h5>
                  </td>
                  <td>
                    <h5>128mm</h5>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h5>Height</h5>
                  </td>
                  <td>
                    <h5>508mm</h5>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h5>Depth</h5>
                  </td>
                  <td>
                    <h5>85mm</h5>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h5>Weight</h5>
                  </td>
                  <td>
                    <h5>52gm</h5>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h5>Quality checking</h5>
                  </td>
                  <td>
                    <h5>yes</h5>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h5>Freshness Duration</h5>
                  </td>
                  <td>
                    <h5>03days</h5>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h5>When packeting</h5>
                  </td>
                  <td>
                    <h5>Without touch of hand</h5>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h5>Each Box contains</h5>
                  </td>
                  <td>
                    <h5>60pcs</h5>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
          <div class="row">
            <div class="col-lg-6">
              <div class="comment_list">
                <div class="review_item">
                  <div class="media">
                    <div class="d-flex">
                      <img src="{{ URL::asset('/frontend/img/product/single-product/review-1.png'); }}" alt="" />
                    </div>
                    <div class="media-body">
                      <h4>Blake Ruiz</h4>
                      <h5>12th Feb, 2017 at 05:56 pm</h5>
                      <a class="reply_btn" href="#">Reply</a>
                    </div>
                  </div>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna
                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco laboris nisi ut aliquip ex ea commodo
                  </p>
                </div>
                <div class="review_item reply">
                  <div class="media">
                    <div class="d-flex">
                      <img src="{{ URL::asset('/frontend/img/product/single-product/review-2.png'); }}" alt="" />
                    </div>
                    <div class="media-body">
                      <h4>Blake Ruiz</h4>
                      <h5>12th Feb, 2017 at 05:56 pm</h5>
                      <a class="reply_btn" href="#">Reply</a>
                    </div>
                  </div>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna
                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco laboris nisi ut aliquip ex ea commodo
                  </p>
                </div>
                <div class="review_item">
                  <div class="media">
                    <div class="d-flex">
                      <img src="{{ URL::asset('/frontend/img/product/single-product/review-3.png'); }}" alt="" />
                    </div>
                    <div class="media-body">
                      <h4>Blake Ruiz</h4>
                      <h5>12th Feb, 2017 at 05:56 pm</h5>
                      <a class="reply_btn" href="#">Reply</a>
                    </div>
                  </div>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna
                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco laboris nisi ut aliquip ex ea commodo
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="review_box">
                <h4>Post a comment</h4>
                <form class="row contact_form" action="contact_process.php" method="post" id="contactForm"
                  novalidate="novalidate">
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" class="form-control" id="name" name="name" placeholder="Your Full name" />
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" />
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" class="form-control" id="number" name="number" placeholder="Phone Number" />
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <textarea class="form-control" name="message" id="message" rows="1"
                        placeholder="Message"></textarea>
                    </div>
                  </div>
                  <div class="col-md-12 text-right">
                    <button type="submit" value="submit" class="btn_3">
                      Submit Now
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
          <div class="row">
            <div class="col-lg-6">
              <div class="row total_rate">
                <div class="col-6">
                  <div class="box_total">
                    <h5>Overall</h5>
                    <h4>4.0</h4>
                    <h6>(03 Reviews)</h6>
                  </div>
                </div>
                <div class="col-6">
                  <div class="rating_list">
                    <h3>Based on 3 Reviews</h3>
                    <ul class="list">
                      <li>
                        <a href="#">5 Star

                        <ion-icon style="color: #fbd600" name="star"></ion-icon>
                        <ion-icon style="color: #fbd600" name="star"></ion-icon>
                        <ion-icon style="color: #fbd600" name="star"></ion-icon>
                        <ion-icon style="color: #fbd600" name="star"></ion-icon>
                        <ion-icon style="color: #fbd600" name="star"></ion-icon></a>
                      </li>
                      <li>
                        <a href="#">4 Star
                        <ion-icon style="color: #fbd600" name="star"></ion-icon>
                        <ion-icon style="color: #fbd600" name="star"></ion-icon>
                        <ion-icon style="color: #fbd600" name="star"></ion-icon>
                        <ion-icon style="color: #fbd600" name="star"></ion-icon>
                        <ion-icon style="color: #fbd600" name="star"></ion-icon></a>
                      </li>
                      <li>
                        <a href="#">3 Star
                        <ion-icon style="color: #fbd600" name="star"></ion-icon>
                        <ion-icon style="color: #fbd600" name="star"></ion-icon>
                        <ion-icon style="color: #fbd600" name="star"></ion-icon>
                        <ion-icon style="color: #fbd600" name="star"></ion-icon>
                        <ion-icon style="color: #fbd600" name="star"></ion-icon></a>
                      </li>
                      <li>
                        <a href="#">2 Star
                        <ion-icon style="color: #fbd600" name="star"></ion-icon>
                        <ion-icon style="color: #fbd600" name="star"></ion-icon>
                        <ion-icon style="color: #fbd600" name="star"></ion-icon>
                        <ion-icon style="color: #fbd600" name="star"></ion-icon>
                        <ion-icon style="color: #fbd600" name="star"></ion-icon></a>
                      </li>
                      <li>
                        <a href="#">1 Star
                        <ion-icon style="color: #fbd600" name="star"></ion-icon>
                        <ion-icon style="color: #fbd600" name="star"></ion-icon>
                        <ion-icon style="color: #fbd600" name="star"></ion-icon>
                        <ion-icon style="color: #fbd600" name="star"></ion-icon>
                        <ion-icon style="color: #fbd600" name="star"></ion-icon></a>

                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="review_list">
                <div class="review_item">
                  <div class="media">
                    <div class="d-flex">
                      <img src="{{ URL::asset('/frontend/img/product/single-product/review-1.png'); }}" alt="" />
                    </div>
                    <div class="media-body">
                      <h4>Blake Ruiz</h4>
                      <ion-icon style="color: #fbd600" name="star"></ion-icon>
                        <ion-icon style="color: #fbd600" name="star"></ion-icon>
                        <ion-icon style="color: #fbd600" name="star"></ion-icon>
                        <ion-icon style="color: #fbd600" name="star"></ion-icon>
                        <ion-icon style="color: #fbd600" name="star"></ion-icon>

                    </div>
                  </div>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna
                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco laboris nisi ut aliquip ex ea commodo
                  </p>
                </div>
                <div class="review_item">
                  <div class="media">
                    <div class="d-flex">
                      <img src="{{ URL::asset('/frontend/img/product/single-product/review-2.png'); }}" alt="" />
                    </div>
                    <div class="media-body">
                      <h4>Blake Ruiz</h4>
                      <ion-icon style="color: #fbd600" name="star"></ion-icon>
                        <ion-icon style="color: #fbd600" name="star"></ion-icon>
                        <ion-icon style="color: #fbd600" name="star"></ion-icon>
                        <ion-icon style="color: #fbd600" name="star"></ion-icon>
                        <ion-icon style="color: #fbd600" name="star"></ion-icon>

                    </div>
                  </div>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna
                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco laboris nisi ut aliquip ex ea commodo
                  </p>
                </div>
                <div class="review_item">
                  <div class="media">
                    <div class="d-flex">
                      <img src="{{ URL::asset('/frontend/img/product/single-product/review-3.png'); }}" alt="" />
                    </div>
                    <div class="media-body">
                      <h4>Blake Ruiz</h4>
                      <ion-icon style="color: #fbd600" name="star"></ion-icon>
                        <ion-icon style="color: #fbd600" name="star"></ion-icon>
                        <ion-icon style="color: #fbd600" name="star"></ion-icon>
                        <ion-icon style="color: #fbd600" name="star"></ion-icon>
                        <ion-icon style="color: #fbd600" name="star"></ion-icon>
                    </div>
                  </div>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna
                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco laboris nisi ut aliquip ex ea commodo
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="review_box">
                <h4>Add a Review</h4>
                <p>Your Rating:</p>
                <ul class="list">
                  <li>
                    <a href="#">
                    <ion-icon style="color: #fbd600" name="star"></ion-icon>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                    <ion-icon style="color: #fbd600" name="star"></ion-icon>

                    </a>
                  </li>
                  <li>
                    <a href="#">
                    <ion-icon style="color: #fbd600" name="star"></ion-icon>

                    </a>
                  </li>
                  <li>
                    <a href="#">
                    <ion-icon style="color: #fbd600" name="star"></ion-icon>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                    <ion-icon style="color: #fbd600" name="star"></ion-icon>
                    </a>
                  </li>
                </ul>
                <p>Outstanding</p>
                <form class="row contact_form" action="contact_process.php" method="post" novalidate="novalidate">
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" class="form-control" name="name" placeholder="Your Full name" />
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="email" class="form-control" name="email" placeholder="Email Address" />
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" class="form-control" name="number" placeholder="Phone Number" />
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <textarea class="form-control" name="message" rows="1" placeholder="Review"></textarea>
                    </div>
                  </div>
                  <div class="col-md-12 text-right">
                    <button type="submit" value="submit" class="btn_3">
                      Submit Now
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================End Product Description Area =================-->

  <!-- product_list part start-->
  <section class="product_list best_seller">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="section_tittle text-center">
            <h2>Best Sellers <span>shop</span></h2>
          </div>
        </div>
      </div>
      <div class="row align-items-center justify-content-between">
        <div class="col-lg-12">
          <div class="best_product_slider owl-carousel">
            @foreach($new_product as $item)
              <div class="single_product_item">
                <a href="{{route('product.details', ['slug'=>$item->slug])}}"><img src="{{$item->feature_image_path}}" alt=""></a>
                <div class="single_product_text">
                <a href="{{route('product.details', ['slug'=>$item->slug])}}" style="color:$fefefe; opacity: 100; visibility: visible;"><h4><span>{{$item->name}}</span></h4></a>
                  <h3>{{number_format($item['price'],0,',','.')}}</h3>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
