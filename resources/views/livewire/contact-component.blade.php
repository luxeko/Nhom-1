<div>
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
  <section class="contact-section mt-3">
    <div class="container">
      <div class="d-none d-sm-block mb-5 pb-4">
        <div id="map" style="height: 480px;">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.0964841656846!2d105.78010801533206!3d21.02882509315103!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab86cece9ac1%3A0xa9bc04e04602dd85!2zRlBUIEFwdGVjaCBIw6AgTuG7mWkgLSBI4buHIFRo4buRbmcgxJDDoG8gVOG6oW8gTOG6rXAgVHLDrG5oIFZpw6puIFF14buRYyBU4bq_IChTaW5jZSAxOTk5KQ!5e0!3m2!1svi!2s!4v1646216209564!5m2!1svi!2s" width="100%" height="450px" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
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
            {{-- @php
                $success = Session::get('success_contact');
                if($success){
                    echo "<div class='alert alert-success' id='contact_alert'>";
                        echo $success;
                        Session::put('success_contact', null);
                    echo "</div>";
                }    
            @endphp --}}
            @if (Session::has('success'))
                <div class='alert alert-success' id='contact_alert'>
                    {{ Session::get('success') }}
                </div>
            @endif
          <form class="form-contact contact_form" action="{{ route('send.contact') }}" method="POST">
            @csrf
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" placeholder='Enter Message'>{{ old('message') }}</textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input value="{{ old('name') }}" class="form-control" name="name" id="name" type="text" placeholder='Enter your name'>
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <input value="{{ old('email_contact') }}" class="form-control" name="email_contact" type="text" placeholder='Enter email address'>
                </div>
              </div>
              
              <div class="col-12">
                <div class="form-group">
                  <input value="{{ old('subject') }}" class="form-control" name="subject" id="subject" type="text"  placeholder='Enter Subject'>
                </div>
              </div>
            </div>
            <div class="form-group mt-3">
              <button class="btn_3 button-contactForm">Send Message</button>
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
</div>
<script src="{{URL::asset('backend/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{URL::asset('backend/js/contact/main.js')}}"></script>
