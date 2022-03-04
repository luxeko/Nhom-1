<div>
    <div class="search_input wrap-search center-section" id="search_input_box">
        <div class="container wrap-search-form" style="border-color: #444444">
            <form class="d-flex justify-content-between search-inner" action="{{route('products.search')}}">
                <input type="text" class="form-control" id="search_input" placeholder="Search Here" name="search" value="{{$search}}">
                <button type="submit" class="btn"></button>
                <div class="wrap-list-cate" style="margin-top: 5px;">
                    <input type="hidden" name="product_cat" value="{{$product_cat}}" id="product-cate">
                    <input type="hidden" name="product_cat_id" value="{{$product_cat_id}}" id="product-cate-id"> 
                    <a href="#" class="link-control">{{str_split($product_cat,12)[0]}}</a>
                    <ul class="list-cate" style="color: white;">
                        <li class="level-0">All Category</li>
                        @foreach ($categories as $category)
                            <li class="level-1" data-id="{{$category->id}}">{{$category->name}}</li>    
                        @endforeach                    
                    </ul>
                </div>
                <span class="ti-close" id="close_search" title="Close Search"></span>
            </form>
        </div>
    </div>

    <!-- <div class="search_input wrap-search center-section">
        <div class="container wrap-search-form">
            <form class="d-flex justify-content-between search-inner" action="{{route('product.search')}}" id="form-search-top" name="form-search-top">
                <input type="text" name="search" value="{{$search}}" placeholder="Search here...">
                <button form="form-search-top" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                <div class="wrap-list-cate">
                    <input type="hidden" name="product_cat" value="{{$product_cat}}" id="product-cate">
                    <input type="hidden" name="product_cat_id" value="{{$product_cat_id}}" id="product-cate-id">
                    <a href="#" class="link-control">{{str_split($product_cat,12)[0]}}</a>
                    <ul class="list-cate">
                        <li class="level-0">All Category</li>
                        @foreach ($categories as $category)
                            <li class="level-1" data-id="{{$category->id}}">{{$category->name}}</li>    
                        @endforeach                    
                    </ul>
                </div>
                <span class="ti-close" id="close_search" title="Close Search"></span>
            </form>
        </div>
    </div> -->
</div>
