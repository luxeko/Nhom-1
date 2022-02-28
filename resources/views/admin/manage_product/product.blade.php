{{-- Các bước để tạo khung trang Dashboard --}}

{{-- Bước 1: @extends('admin/layouts.admin_layout') --}}
@extends('admin/layouts.admin_layout')

{{-- Bước 2: Đặt tên cho title  --}}
@section('title')
    <title>Sản phẩm</title>
@endsection
{{-- Bước 3: Viết code cần show data ở sau thẻ div  --}}
@section('content')
    @include('admin/partials.preloader')
    <div class="container-fluid" id="preloader">
        <!-- code database bắt đầu từ đây  -->
        <div class="d-flex bg-light justify-content-between mb-3">
            <h2>Bảng danh sách sản phẩm</h2>
            <div class="form-inline">
                <input class="form-control" type="text" id="search" name="search" placeholder="Search">
            </div>
        </div>
        <div class="d-flex justify-content-between">    
            <div>
                <a href="{{ asset('admin/products/create') }} " class="btn btn-primary mb-3">Thêm sản phẩm</a>
            </div>
            <div> 
                <form class="form-inline">
                    <div class="d-flex flex-row form-group mr-sm-4">
                        <label class="mr-sm-2" for="test1">Price </label>
                        <select  class="form-control input-xs"  name="" id="test1" >
                            <option value="">-----------</option>
                            <option value="">Low to High</option>
                            <option value="">High to Low</option>
                        </select>
                    </div>
                    <div class="d-flex flex-row mr-sm-4">
                        <label class="mr-sm-2" for="test3">Category </label>
                        <select  class="form-control input-xs "  name="" id="test3" >
                            <option value="">-----------</option>
                            <option value="">2</option>
                            <option value="">3</option>
                        </select>
                    </div>
                    <div class="d-flex flex-row">
                        <label class="mr-sm-2" for="test2">Status </label>
                        <select  class="form-control input-xs"  name="" id="test2">
                            <option value="">-----------</option>
                            <option value="1">Active</option>
                            <option value="2">Disable</option>
                        </select>
                    </div>
                </form>
            </div>
           
        </div>
        
        @php             
            $success = Session::get('success_product');
            if($success){
                echo "<div class='alert alert-success' role='alert'>";
                    echo $success;
                    Session::put('success_product', null);
                echo "</div>";
            }
        @endphp
        <div id="table_data">
            <table class="table table-striped table-hover table-bordered shadow-lg" id="dataTable" width="100%" cellspacing="0">
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
                    @include('admin/manage_product.data')
                    
                </tbody>
                               
            </table>
        </div>
        <input type="hidden" name="hidden_page" id="hidden_page" value="1">
        <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="id" />
        <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc" />
        
        <section>
            <!-- Modal -->
            <div class="modal fade" id="modalDetailProduct" tabindex="-1" aria-labelledby="product-modal-label" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header border-0">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
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
<script type="text/javascript" src={{URL::asset('backend/js/actionDelete.js')}}></script>
<script type='text/javascript'>
    $(document).ready(function(){
        $('#collapseOne').addClass('show');
        $('.product_active').addClass('active');
    });
</script>


<script type="text/javascript" >  
    $(document).ready(function(){
        var category_name = '';
        let imagesPath = '';
        function clear_icon(){
            $('#id_icon').html('');
            $('#post_title_icon').html('');
        }
        function fetch_data(page, sort_type, sort_by, query){
            $.ajax({
                url: "/admin/products/show/fetch_data?page="+page+"&sortby="+sort_by+"&sorttype="+sort_type+"&query="+query,
                success:function(data){
                    $('tbody').html('');
                    $('#table_data tbody').html(data)
                }
            });
        }
        $(document).on('click', '.pagination a', function(event){
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            $('#hidden_page').val(page);
            var column_name = $('#hidden_column_name').val();
            var sort_type = $('#hidden_sort_type').val();
            var query = $('#search').val();
            $('li').removeClass('active');
            $(this).parent().addClass('active');
            fetch_data(page, sort_type, column_name, query);

        });
        $(document).on('click', '.sorting', function(){
            var column_name = $(this).data('column_name');
            var order_type = $(this).data('sorting_type');
            var reverse_order = '';
            if(order_type == 'asc'){
                $(this).data('sorting_type', 'desc');
                reverse_order = 'desc';
                clear_icon();
                $('#'+column_name+'_icon').html('<span class="glyphicon glyphicon-triangle-bottom"></span>');
            }
            if(order_type == 'desc'){
                $(this).data('sorting_type', 'asc');
                reverse_order = 'asc';
                clear_icon
                $('#'+column_name+'_icon').html('<span class="glyphicon glyphicon-triangle-top"></span>');
            }
            $('#hidden_column_name').val(column_name);
            $('#hidden_sort_type').val(reverse_order);
            var page = $('#hidden_page').val();
            var query  = $('#search').val();
            fetch_data(page, reverse_order, column_name, query );
        });

        $(document).on('keyup', '#search', function(){
            var query  = $('#search').val();
            var column_name = $('#hidden_column_name').val();
            var sort_type = $('#hidden_sort_type').val();
            var page = $('#hidden_page').val();
            fetch_data(page, sort_type, column_name, query);
        });

        
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
                            getUrlToFileImg =   `<div class="small-img-col rounded border border-secondary">
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
                                    <div class="main-img-row position-relative rounded border border-secondary">
                                        <img src="{{ '${product.feature_image_path}' }}" id="productImg"/>
                                        <p class="product-detail-status text-light position-absolute bg-primary rounded" style="top: 10px; left: 1rem; padding: 4px 12px;"><span style="font-size: 14px;">${product.name}</span></p>
                                    </div>
                                    <div class="small-img-row">
                                        ${imagesPath}
                                    </div>
                                </div>
                                <div class="details_col">
                                    <h4 class="text-center text-capitalize">${product.name}</h4>
                                    <div class="mt-1">${product.price}</div>
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
                                    <div class="product-detail-content mt-1">
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

    });

</script>

