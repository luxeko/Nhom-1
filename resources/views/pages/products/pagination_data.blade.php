@foreach($products as $item)
    <div class="col-lg-4 col-sm-6">
        <div class="single_product_item">
            <img src="{{$item['feature_image_path']}}" alt="">
            <div class="single_product_text">
                <h4>{{$item['name']}}</h4>
                <h3>${{number_format($item['price'],0,',','.')}}</h3>
                <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
            </div>
        </div>
    </div>
@endforeach
{!! $products->links() !!}