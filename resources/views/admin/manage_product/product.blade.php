<!DOCTYPE html>
{{-- Các bước để tạo khung trang Dashboard --}}
<meta name="csrf-token" content="{{ csrf_token() }}">

{{-- Bước 1: @extends('admin/layouts.admin_layout') --}}
@extends('admin/layouts.admin_layout')

{{-- Bước 2: Đặt tên cho title  --}}
@section('title')
    <title>Product</title>
@endsection
{{-- Bước 3: Viết code cần show data ở sau thẻ div  --}}
@section('content')
    @include('admin/partials.preloader')
    <div class="container-fluid" id="preloader">
        <!-- code database bắt đầu từ đây  -->
        <div class="d-flex bg-light justify-content-between mb-3">
            <h2 class="border-bottom border-secondary">Danh sách Product</h2>
        </div>
        <div class="d-flex justify-content-between">    
            <div>
                @can('product-add')
                    <a href="{{ asset('admin/products/create') }} " class="btn btn-primary mb-3">Thêm Product</a>
                @endcan
            </div>
            <form action="{{ route('product.search') }}" method="get" class="form-inline mb-3">
                <div class="form-group">
                    <input value="{{ isset($search) ? $search : '' }}" class="form-control mr-sm-2" name="search" type="search" placeholder="Tên sản phẩm" aria-label="Search">
                </div>
                
                <div class="form-group">
                    <select name="sort_filter" class="form-control input-xs mr-sm-2">
                        <option value="">Sắp xếp</option>
                        @if(isset($sort) && $sort === 'asc')
                            <option selected value="asc">Price: Thấp đến cao</option>
                            <option value="desc">Price: Cao đến thấp</option>
                            <option value="latest">Mới nhất</option>
                            <option value="oldest">Cũ nhất</option>
                        @endif
                        @if(isset($sort) && $sort === 'desc')
                            <option  value="asc">Price: Thấp đến cao</option>
                            <option selected value="desc">Price: Cao đến thấp</option>
                            <option value="latest">Mới nhất</option>
                            <option value="oldest">Cũ nhất</option>
                        @endif
                        @if(isset($sort) && $sort === 'latest')
                            <option value="asc">Price: Thấp đến cao</option>
                            <option value="desc">Price: Cao đến thấp</option>
                            <option selected value="latest">Mới nhất</option>
                            <option value="oldest">Cũ nhất</option>
                        @endif
                        @if(isset($sort) && $sort === 'oldest')
                            <option value="asc">Price: Thấp đến cao</option>
                            <option value="desc">Price: Cao đến thấp</option>
                            <option value="latest">Mới nhất</option>
                            <option selected value="oldest">Cũ nhất</option>
                        @endif
                        @if(empty($sort))
                            <option value="asc">Price: Thấp đến cao</option>
                            <option value="desc">Price: Cao đến thấp</option>
                            <option value="latest">Mới nhất</option>
                            <option value="oldest">Cũ nhất</option>
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <select name="category_filter" class="form-control input-xs mr-sm-2">
                        <option value="">Danh mục</option>
                        @if(isset($category))
                            @foreach($getAllCategory as $value)
                                @if($category == $value->id)
                                    <option selected value="{{$value->id}}">{{$value->name}}</option>
                                @else
                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                @endif
                            @endforeach
                        @endif
                        @if(empty($category))
                            {!! $htmlOption !!}
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control input-xs mr-sm-2" name="status_filter" >
                        @if(isset($status_filter) && $status_filter == 1)
                            <option value="">Chọn status </option>  
                            <option selected value="1">Active</option>
                            <option value="2">Disable</option>
                        @endif
                        @if(isset($status_filter) && $status_filter == 2)
                            <option value="">Chọn status </option>  
                            <option value="1">Active</option>
                            <option selected value="2">Disable</option>
                        @endif
                        @if(empty($status_filter) )
                            <option value="">Chọn status </option>  
                            <option value="1">Active</option>
                            <option value="2">Disable</option>
                        @endif
                    </select>
                </div>
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Tìm kiếm</button>
            </form>
        </div>
        
        @php             
            $success = Session::get('success_product');
            if($success){
                echo "<div class='alert alert-success' id='product_alert'>";
                    echo $success;
                    Session::put('success_product', null);
                echo "</div>";
            }
        @endphp
        <div id="table_data">
            <div class="text-dark font-weight-bold">Có {{ $data->count() }} kết quả / trang</div>
            <table class="table  table-hover table-bordered shadow-lg" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark ">
                    <tr>
                        <th colspan="1" class="text-center" style="width:5%">STT</th>
                        <th class="text-center">Hình ảnh</th>
                        <th class="text-center sorting" data-sorting_type="asc" data-column_name="name" style="cursor: pointer">Tên <span id="id_icon"></span></th>
                        <th class="text-center sorting" data-sorting_type="asc" data-column_name="price" style="cursor: pointer">Giá <span id="post_title_icon"></span> </th>
                        <th class="text-center">Danh mục</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Thao tác</th>
                    </tr>
                </thead> 
                <tbody id="list-product">
                    @if(isset($data) && $data->count()>0)
                        @foreach ($data as $key => $value)                              
                            <tr>
                                <th colspan='1' class='text-center ' style='width:5%'>{{ ( $currentPage - 1 ) * $perPage + $key + 1 }}</th>
                                <td class='text-center admin_product_img'><img src='{{$value->feature_image_path}}'></td>
                                <td class="text-dark font-weight-bold">{{$value->name}}</td>
                                
                                <td class=""><span class="text-success font-weight-bolder font-italic">{{ number_format($value->price, 0) }} VNĐ</span>
                                </td>
                                <td class="text-center text-dark font-weight-bold">{{ optional($value->category)->name }}</td>
                                <td class="text-center">
                                    <?php
                                        if($value->status == 1){
                                            echo "<span class='badge bg-success p-2 text-white'>Active</span>";
                                        } else {
                                            echo "<span class='badge bg-danger p-2 text-white'>Disable</span>";
                                        }  
                                    ?>
                                </td>
                                <td colspan="1" class="text-center" style="width:15%">
                                    @can('product-edit')
                                        <a class="btn btn-primary" href="#" onclick="getCategory({{$value->category_id}});getThumbnail({{$value->id}});viewProductDetail({{$value->id}})" data-toggle="modal" data-target="#modalDetailProduct"><i class="fas fa-eye"></i></a>
                                        <a href="{{ Route('product.edit', ['id'=>$value->id])}}" class="btn btn-success"><i class="fas fa-pencil-alt"></i></a>
                                    @endcan
                                    @can('product-delete')
                                        <a data-url="{{Route('product.delete', ['id'=>$value->id])}}" class="btn btn-danger action_delete"><i class="fas fa-trash-alt"></i></a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td class="text-center text-danger" colspan="12">Chưa có dữ liệu</td>
                        </tr>
                    @endif                    
                </tbody>
                <tbody id="list-product"></tbody>
                
            </table>
            <div class="d-flex justify-content-center">    
                @if (!empty($data))
                    {!! $data->links() !!} 
                @endif    
            </div>
        </div>

        <section>
            <!-- Modal -->
            <div class="modal fade" id="modalDetailProduct" tabindex="-1" aria-labelledby="product-modal-label" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-dark">
                            <span class="text-white modal-title" id="myModalLabel150">Chi tiết sản phẩm</span>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">x</button>
                        </div>
                        {{-- code từ đây  --}}
                        <div class="modal-body border-0" id="modal-product-detail"></div>
                        {{-- end code thông báo  --}}
                        <div class="modal-footer border-0">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <style>
            .w-5{
                display: none;
            }
        </style>
        <!-- kết thúc code ở đây  -->   
    </div>
@endsection
<script src="{{URL::asset('backend/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{URL::asset('backend/js/product/main.js')}}"></script>
<script type="text/javascript" src={{URL::asset('backend/js/actionDelete.js')}}></script>


<script type="text/javascript" >  
    // $(document).ready(function(){
        var category_name = '';
        let imagesPath = '';
        function getCategory(id){
            $.ajax({
                url:`/admin/products/getCategoryById/${id}`,
                method:'GET',
                success:(category)=>{
                    category_name = category.name;
                    console.log(category_name);
                }
            })
        }
        function getThumbnail(id){
            $.ajax({
                url:`/admin/products/getThumbnail/${id}`,
                method:'GET',
                success:(getArrayThumbnail)=>{
                    let getUrlToFileImg = '';
                    for (let i = 0; i < getArrayThumbnail.length; i++) {
                        names = getArrayThumbnail.map(function(i) {
                            getUrlToFileImg = `
                                <div class="small-img-col">
                                    <img src="{{  '${i.image_path}' }}" width="100%" class="smallImg">
                                </div>`;
                            imagesPath += getUrlToFileImg;
                        });
                        break;
                    }
                    console.log(imagesPath);
                }
            })
        }
        function viewProductDetail(id){
            let formatter = new Intl.NumberFormat('vn-VN', {
                style: 'currency',
                currency: 'VND',
            });
            $.ajax({
                url:'/admin/products/details/',
                method:'GET',
                data:{id:id},
                success:(product)=>{
                    console.log(product);
                    var statusProduct = '';
                    if (product.status == 1) {
                        statusProduct = '<p class="mb-0"><span> Status: </span><span class="ml-2 text-success font-italic" style="font-size: 15px">Active</span></p>';
                    } else {
                        statusProduct = '<p class="mb-0"><span> Status: </span><span class="ml-2 text-danger font-italic" style="font-size: 15px">Disable</span></p>';
                    }
                  
                    var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                    let productDetails = `
                        <div class="single-product small-container">
                            <div class="details_row">
                                <div class="details_col">
                                    <div class="main-img-row position-relative ">
                                        <img src="{{ '${product.feature_image_path}' }}" id="productImg"/>
                                        <p class="product-detail-status text-light position-absolute bg-primary rounded" style="top: 10px; left: 1rem; padding: 4px 12px;"><span style="font-size: 14px;">${product.name}</span></p>
                                    </div>
                                    <div class="small-img-row">
                                        ${imagesPath}
                                    </div>
                                </div>
                                <div class="details_col">
                                    <h4 class="text-center text-capitalize">${product.name}</h4>
                                    <div class="mt-1">
                                        <p class="mb-0"><span> Price: </span><span class="ml-2 text-success font-italic" style="font-size: 15px">${formatter.format(product.price)}</span></p>
                                    </div>
                                    <div class="mt-1">
                                        <p class="mb-0"><span> Category: </span><span class="ml-2 text-success font-italic" style="font-size: 15px">${category_name}</span></p>
                                    </div>
                                    <div class="mt-1">${statusProduct}</div>
                                    <div class="mt-1">
                                        <p class="mb-0"><span> Created_at: </span><span class="ml-2 text-success font-italic" style="font-size: 15px">${new Date(product.created_at).toLocaleDateString("en-US",options)}</span></p>
                                    </div>
                                    <div class="mt-1">
                                        <p class="mb-0"><span> Updated_at: </span><span class="ml-2 text-success font-italic" style="font-size: 15px">${new Date(product.updated_at).toLocaleDateString("en-US",options)}</span></p>
                                    </div>
                                    <hr style="background:#999">
                                    <div class="mt-1">
                                        <h6 class="mb-2">Content: </h6>
                                        <div class="font-italic">
                                            ${product.content}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `
                    $('#modal-product-detail').html('').append(productDetails);
                    imagesPath = '';
                }
            });
        }
    // });

</script>

