<!DOCTYPE html>
{{-- Các bước để tạo khung trang Dashboard --}}

{{-- Bước 1: @extends('admin/layouts.admin_layout') --}}
@extends('admin/layouts.admin_layout')

{{-- Bước 2: Đặt tên cho title  --}}
@section('title')
    <title>Cập nhật Product</title>
@endsection

{{-- Bước 3: Viết code cần show data ở sau thẻ div  --}}
@section('content')
    <!-- code database bắt đầu từ đây  -->
    @include('admin/partials.preloader')
    <div class="container-fluid" id="preloader">
        <h2 class="form-title">Cập nhật Product</h2>
        <form action="{{ route('product.update', ['id'=>$product->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group" style="width:100%">
                        <input  type="text" class="form-control form-control-sm py-4 px-3 mb-1" name="product_name" style="width: 100%;"  placeholder="Tên sản phẩm (min: 5)" value="{{ $product->name }}" />
                    </div>
                    @php         
                        $err_name = Session::get('product_name_null');
                        if($err_name){
                            echo "<div class='alert alert-danger'>";
                                echo $err_name;
                            echo "</div>";
                            Session::put('product_name_null', null);
                        }
                        $duplicate_product = Session::get('duplicate_product');
                        if($duplicate_product){
                            echo "<div class='alert alert-danger'>";
                                echo $duplicate_product;
                            echo "</div>";
                            Session::put('duplicate_product', null);
                        }
                    @endphp
                    <div class="form-group">
                        <input type="text" class="numberformat form-control form-control-sm py-4 px-3 mb-1" name="product_price" placeholder="Giá sản phẩm (min: 1)" value="{{ $product->price }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                    </div>
                    @php         
                        $price_null = Session::get('price_null');
                        $price_not_int = Session::get('price_not_int');
                        if($price_null){
                            echo "<div class='alert alert-danger'>";
                                echo $price_null;
                            echo "</div>";
                            Session::put('price_null', null);
                        }
                    @endphp
                    <div class="form-group">
                        <label for="avatar">Chọn ảnh đại diện</label>
                        <input type="file" id="avatar" name="feature_image_path">
                        <div class="col-md-12">
                            <div class="row rounded border border-secondary p-2" style="width:120px; height:120px">
                                <img src="{{ $product->feature_image_path }}" style="width:100%">
                            </div>
                        </div>
                    </div>
                    @php         
                        $image_null = Session::get('image_null');
                        if($image_null){
                            echo "<div class='alert alert-danger'>";
                                echo $image_null;
                            echo "</div>";
                            Session::put('image_null', null);
                        }
                    @endphp
                    
                    <div class="form-group">
                        <label for="thumbnail">Chọn các ảnh chi tiết <span class="text-danger">(Max: 5 | Min: 3)</span></label>
                        <input multiple type="file" id="thumbnail" name="image_path[]">
                        <span id="err_thumbnail"></span>
                        <div class="col-md-12">
                            <div class="row" style="width:100%">
                                @foreach($product->productImages as $productImgItem)
                                    <div class="rounded border border-secondary mr-2" style="width: 100px; height: 110px">
                                        <img src="{{$productImgItem->image_path}}" style="width:100%">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <select name="category" class="form-control input-xs" style="width:40%" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                            <option value="">Danh mục</option>
                            {!! $htmlOption !!}
                        </select>
                    </div>
                
        
                    <div class="form-group">
                        <select name="status" class="form-control input-xs" style="width:30%">
                            @if($product->status == 1)
                                <option value=""> Trạng thái </option>
                                <option selected value="1"> Active </option>
                                <option value="2"> Disable </option>
                            @endif
                            @if($product->status == 2)
                                <option value=""> Trạng thái </option>
                                <option value="1"> Active </option>
                                <option selected value="2"> Disable </option>
                            @endif
                            @if($product->status == "")
                            <option value=""> Trạng thái </option>
                                <option value="1"> Active </option>
                                <option value="2"> Disable </option>
                            @endif
                        </select>
                    </div>
                    @php         
                        $status_null = Session::get('status_null');
                        if($status_null){
                            echo "<div class='alert alert-danger'>";
                                echo $status_null;
                            echo "</div>";
                            Session::put('status_null', null);
                        }
                    @endphp
                </div>
                <div class="col-md-12">
                    <div class="form-group" >
                        <textarea id="mytextarea" name="contents" placeholder="Nội dung">{{ $product->content }}</textarea>
                    </div>
                    @php         
                        $content_null = Session::get('content_null');
                        if($content_null){
                            echo "<div class='alert alert-danger'>";
                                echo $content_null;
                            echo "</div>";
                            Session::put('content_null', null);
                        }
                    @endphp
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <button class="btn btn-primary">Cập nhật Product</button>
                        <a href="{{ asset('admin/products/show')}}" class="btn btn-secondary">Huỷ</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
   
    <!-- kết thúc code ở đây  -->
@endsection
<script src="{{URL::asset('backend/vendor/jquery/jquery.min.js')}}"></script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>tinymce.init({ selector: '#mytextarea'});</script>
<script src="{{URL::asset('backend/js/tags.js')}}"></script>
<script src="{{URL::asset('backend/js/product/main.js')}}"></script>
