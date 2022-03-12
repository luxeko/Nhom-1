<div>
    <!-- breadcrumb start-->
    <section>
        <div>
            <img src="{{ URL::asset('/frontend/img/gamingroom4.jpg'); }}" style="width: 100%; height:700px">
        </div>
    </section>
    <!-- breadcrumb start-->  
    <section class="mt-5">
        <div class="container-fluild mx-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div  class="col-md-6 mr-2">
                            <div  class="row align-items-center latest_product_inner" id="scroll_combo">
                               <img style="width: 100%; height:700px" src="{{ URL::asset('/frontend/img/bg_combo.jpg'); }}" alt="">
                            </div>
                        </div>
                        <div class="col-md-5 ml-2">
                            <div class="mb-5">
                                <p><span style="font-size: 20px" class="font-weight-bold text-dark">MATIVINA</span><span style="font-size: 13px; font-weight:600"> COMBO</span> </p>
                                <h1>
                                    Gaming PCs Made Simple
                                </h1>
                                <h3>
                                    We build custom PCs around your budget, optimized for the games you love, all protected by a 2-year warranty.
                                </h3>
                            </div>
                            <div class="row align-items-center latest_product_inner" id="table_data">
                                @foreach($combos as $item)
                                    <div class="col-sm-6">
                                        <div class="single_product_item">
                                            <a href=""><img src="{{$item->image_combo_path}}" alt=""></a>
                                            <div class="single_product_text">
                                                <a href="" style="color:$fefefe; opacity: 100; visibility: visible;"><h4><span>{{$item->name}}</span></h4></a>
                                                <h3>{{number_format($item->price,0,',','.')}} VND</h3>
                                                <a href="#" class="add_cart" wire:click.prevent="store( {{$item->id}}, '{{$item->name}}', {{$item->price}} )">+ add to cart<i class="ti-heart"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                                        
                                <div class="col-lg-12">
                                    <div class="pageination">
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination justify-content-center">
                                                {{-- {{ $combos->links() }} --}}
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--================End Category Product Area =================-->
</div>
<script src="{{URL::asset('backend/vendor/jquery/jquery.min.js')}}"></script>
<script>
    $(document).ready(function(){
        $(window).scroll(function(){
            if( $(window).scrollTop() > 800  && $(window).scrollTop() < 900){
                // $("#scroll_combo").stop().animate({"marginTop": 450 + "px"}, "slow" ); 
                $("#scroll_combo").css({
    "top": ($(window).scrollTop()) + "px",
    "left": ($(window).scrollLeft()) + "px"
  });
            }
                // if($(window).scrollTop() <= 900){
                    //     $("#scroll_combo").stop().animate({"marginTop": 0 + "px"}, "fast" );
            // }
        });
    })
</script>