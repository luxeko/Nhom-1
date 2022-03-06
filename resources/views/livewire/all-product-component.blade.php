<div>
    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb_iner">
                        <img src="{{ URL::asset('/frontend/img/product/banner/all_product.png'); }}" alt="logo">
                        <div class="breadcrumb_iner_item">
                        <h2>All Products</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->  
    <section class="cat_product_area section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="left_sidebar_area">
                        <aside class="left_widgets p_filter_widgets">
                            @if(Session::has('success_message'))
                                <div class="alert alert-success">
                                    <strong>Success</strong> {{Session::get('success_message')}}
                                </div>
                            @endif
                            <div class="l_w_title">
                                <h3>Browse Categories</h3>
                            </div>
                            <div class="widgets_inner">
                                <ul class="list">
                                    @foreach($categories as $category)
                                    <li>
                                        <a href="{{route('product.category',['category_slug'=>$category->slug])}}">{{$category->name}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </aside>
                        <aside class="left_widgets p_filter_widgets price_rangs_aside">
                            <div wire:ignore x-data="{ min_price: @entangle('min_price'), max_price: @entangle('max_price') }" x-init="
                                noUiSlider.create($refs.slider, {
                                        start: [parseInt(min_price), parseInt(max_price)],
                                        connect: true,
                                        range: {
                                            'min': parseInt(min_price),
                                            'max': parseInt(max_price)
                                        },
                                        pips:{
                                            mode:'steps',
                                            stepped:true,
                                            density:10
                                        }
                                    })
                                    .on('update',function (value){
                                        min_price = value[0];
                                        max_price = value[1];
                                    });
                                ">
                                <div class="l_w_title">
                                <h3>Price Filter</h3>
                                    <p>
                                        <span x-text="parseInt(min_price)"></span> - <span x-text="parseInt(max_price)"></span>
                                    </p>
                                </div>

                                <div class="widget-content" style="padding:10px 5px 40px 5px;">
                                    <div x-ref="slider"></div>                       
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product_top_bar d-flex justify-content-between align-items-center">
                                <div class="single_product_menu">
                                    <p><span>All Products</span></p>
                                </div>
                                <div class="single_product_menu d-flex">
                                    <h5 style="margin-right: 5px;">sort by: </h5>
                                    <select name="orderby" class="use-chosen" wire:model="sorting">
                                        <option value="default" selected="selected">Default Sorting</option>
                                        <option value="price">price: low to high</option>
                                        <option value="price-desc">price: high to low</option>
                                        <option value="date">Lastest products</option>
                                    </select>
                                </div>
                                <div class="single_product_menu d-flex">
                                    <h5 style="margin-right: 5px;">show</h5>
                                    <div class="top_pageniation">
                                    <select name="orderby" class="use-chosen" wire:model="pagesize">
                                        <option value="9" selected="selected">9</option>
                                        <option value="12">12</option>
                                        <option value="15">15</option>
                                        <option value="18">18</option>
                                    </select>
                                    <h5 style="float: right; margin-left: 5px;">per page</h5>
                                    </div>
                                </div>

                                <div class="single_product_menu d-flex">
                                    <div class="input-group">
                                        <input type="search" class="form-control" placeholder="search" wire:model="search"
                                            aria-describedby="inputGroupPrepend">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">
                                                <i class="ti-search"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row align-items-center latest_product_inner" id="table_data">
                        @foreach($products as $item)
                            <div class="col-lg-4 col-sm-6">
                                <div class="single_product_item">
                                    <a href="{{route('product.details', ['slug'=>$item->slug])}}"><img src="{{$item->feature_image_path}}" alt=""></a>
                                    <div class="single_product_text">
                                        <a href="{{route('product.details', ['slug'=>$item->slug])}}" style="color:$fefefe; opacity: 100; visibility: visible;"><h4><span>{{$item->name}}</span></h4></a>
                                        <h3>${{number_format($item->price,0,',','.')}}</h3>
                                        <a href="#" class="add_cart" wire:click.prevent="store( {{$item->id}}, '{{$item->name}}', {{$item->price}} )">+ add to cart<i class="ti-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                                                
                        <div class="col-lg-12">
                            <div class="pageination">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center">
                                        {{ $products->links() }}
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Category Product Area =================-->

    <!-- product_list part start-->
    <section class="product_list best_seller section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section_tittle text-center">
                        <h2>Lastest <span>shop</span></h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-12">
                    <div class="best_product_slider owl-carousel">
                        @foreach($lproducts as $item)
                        <div class="single_product_item">
                            <a href="{{route('product.details', ['slug'=>$item->slug])}}"><img src="{{$item->feature_image_path}}" alt=""></a>
                            <div class="single_product_text">
                                <a href="{{route('product.details', ['slug'=>$item->slug])}}" style="color:$fefefe; opacity: 100; visibility: visible;"><h4><span>{{$item->name}}</span></h4></a>
                                <h3>{{number_format($item->price,0,',','.')}}</h3>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>