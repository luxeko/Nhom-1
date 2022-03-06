<div>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
        @foreach ($categories as $category)
            <a class="dropdown-item" href="{{route('product.category',['category_slug'=>$category->slug])}}">{{$category->name}}</a>
        @endforeach
    </div>
</div>
