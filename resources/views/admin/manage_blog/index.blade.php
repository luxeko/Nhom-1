{{-- Các bước để tạo khung trang Dashboard --}}

{{-- Bước 1: @extends('admin/layouts.admin_layout') --}}
@extends('admin/layouts.admin_layout')

{{-- Bước 2: Đặt tên cho title  --}}
@section('title')
    <title>Blogs</title>
@endsection
{{-- Bước 3: Viết code cần show data ở sau thẻ div  --}}
@section('content')
    @include('admin/partials.preloader')
    <div class="container-fluid" id="preloader">
        <!-- code database bắt đầu từ đây  -->
        <div class="d-flex bg-light justify-content-between mb-3">
            <h2>Bảng danh sách Blogs</h2>
            <div class="form-inline">
                <input class="form-control" type="text" id="search" name="search" placeholder="Search">
            </div>
        </div>
        <div class="d-flex justify-content-between">    
            <div>
                <a href="{{ asset('admin/blogs/create') }} " class="btn btn-primary mb-3">Thêm blog</a>
            </div>
            <div> 
                <form class="form-inline">
                    <div class="d-flex flex-row form-group mr-sm-4">
                        <button class="btn btn-success">Lọc <i class="fas fa-filter"></i></button>
                    </div>
                    <div class="d-flex flex-row form-group mr-sm-4">
                    
                        <select  class="form-control input-xs"  name="" >
                            <option value="">Giá tiền</option>
                            <option value="">Thấp đến cao</option>
                            <option value="">Cao đến thấp</option>
                        </select>
                    </div>
                    <div class="d-flex flex-row mr-sm-4">
                  
                        <select name="category_filter" class="form-control input-xs">
                            <option value=""> Danh mục </option>
                            {{-- {!! $htmlOption !!} --}}
                        </select>
                    </div>
                    <div class="d-flex flex-row">
                
                        <select  class="form-control input-xs"  name="" >
                            <option value="">Status</option>
                            <option value="1">Active</option>
                            <option value="2">Disable</option>
                        </select>
                    </div>
                </form>
            </div>
           
        </div>
        
        @php             
            $success = Session::get('success_blog');
            if($success){
                echo "<div class='alert alert-success' id='blog_alert' role='alert'>";
                    echo $success;
                    Session::put('success_blog', null);
                echo "</div>";
            }
        @endphp
        <div id="table_data">
            <table class="table table-striped table-hover table-bordered shadow-lg" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark ">
                    <tr>
                        <th colspan="1" class="text-center" style="width:5%">STT</th>
                        <th class="text-center">Hình ảnh</th>
                        <th class="text-center">Tiêu đề</th>
                        <th class="text-center">Tác giả</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Thao tác</th>
                    </tr>
                </thead> 
                <tbody id="list-blog">
                    @if(!empty($data) && $data->count()>0)
                        @foreach ($data as $key => $value)                         
                            <tr>
                                <th colspan='1' class='text-center' style='width:5%'>{{ ( $currentPage - 1 ) * $perPage + $key + 1 }}</th>
                                <td class='text-center admin_product_img'><img src='{{$value->image}}'></td>
                                <td class="text-center">{{$value->title}}</td>
                                <td class="text-center">{{$value->author}}</td>
                                <td class="text-center">
                                    <?php
                                        if($value->status == 1){
                                            echo "<span class='text-success'>Active</span>";
                                        } elseif ($value->status == 2) {
                                            echo "<span class='text-danger'>Disable</span>";
                                        } 
                                    ?>
                                </td>
                                <td colspan="1" class="text-center" style="width:15%">
                                    <a class="btn btn-primary" href="#" onclick="viewBlogDetail({{$value->id}})" data-toggle="modal" data-target="#modalDetailBlog"><i class="fas fa-eye"></i></a>
                                    <a href="{{ Route('blog.edit', ['id'=>$value->id])}}" class="btn btn-success"><i class="fas fa-pencil-alt"></i></a>
                                    <a data-url="{{Route('blog.delete', ['id'=>$value->id])}}" class="btn btn-danger action_delete"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td class="text-center text-danger" colspan="12">Chưa có dữ liệu</td>
                        </tr>
                    @endif
                    
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {!! $data->links() !!}
            </div>
        </div>
        
        <section>
            <!-- Modal -->
            <div class="modal fade" id="modalDetailBlog" tabindex="-1" aria-labelledby="blog-modal-label" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header border-0">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
                        </div>
                        {{-- code từ đây  --}}
                        <div class="modal-body border-0" id="modal-blog-detail"></div>
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
<script type='text/javascript' src="{{URL::asset('backend/js/blog/main.js')}}"></script>

<script type="text/javascript" >  
    function viewBlogDetail(id){
        $.ajax({
            url:'/admin/blogs/details/',
            method:'GET',
            data:{id:id},
            success:(blog)=>{
                console.log(blog);
                var statusBlog = '';
                if (blog.status == 1) {
                    statusBlog = '<p class="mb-0"><span> Status: </span><span class="ml-2 text-success font-italic" style="font-size: 15px">Active</span></p>';
                } else {
                    statusBlog = '<p class="mb-0"><span> Status: </span><span class="ml-2 text-danger font-italic" style="font-size: 15px">Disable</span></p>';
                }
                
                var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                let blogDetails = `
                    <div class="single-product small-container">
                        <div class="details_row">
                            <div class="details_col">
                                <div class="main-img-row position-relative rounded border border-secondary">
                                    <img src="{{ '${blog.image}' }}" id="productImg"/>
                                    <p class="product-detail-status text-light position-absolute bg-primary rounded" style="top: 10px; left: 1rem; padding: 4px 12px;"><span style="font-size: 14px;">${blog.author}</span></p>
                                </div>
                            </div>
                            <div class="details_col">
                                <h4 class="text-center text-capitalize">${blog.title}</h4>
                                <div class="mt-1">
                                    <p class="mb-0"><span> Author: </span><span class="ml-2 text-success font-italic" style="font-size: 15px">${blog.author}</span></p>
                                </div>
                                <div class="mt-1">${statusBlog}</div>
                                <div class="mt-1">
                                    <p class="mb-0"><span> Created_at: </span><span class="ml-2 text-success font-italic" style="font-size: 15px">${new Date(blog.created_at).toLocaleDateString("en-US",options)}</span></p>
                                </div>
                                <div class="mt-1">
                                    <p class="mb-0"><span> Updated_at: </span><span class="ml-2 text-success font-italic" style="font-size: 15px">${new Date(blog.updated_at).toLocaleDateString("en-US",options)}</span></p>
                                </div>
                                <hr style="background:#999">
                                <div class="product-detail-content mt-1">
                                    <h6 class="mb-2">Content: </h6>
                                    <div class="font-italic">
                                        ${blog.content_post}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `
                $('#modal-blog-detail').html('').append(blogDetails);
            }
        });
    }


</script>

