{{-- Các bước để tạo khung trang Dashboard --}}

{{-- Bước 1: @extends('admin/layouts.admin_layout') --}}
@extends('admin/layouts.admin_layout')

{{-- Bước 2: Đặt tên cho title  --}}
@section('title')
    <title>User</title>
@endsection
{{-- Bước 3: Viết code cần show data ở sau thẻ div  --}}
@section('content')
    @include('admin/partials.preloader')
    <div class="container-fluid" id="preloader">
        <!-- code database bắt đầu từ đây  -->
        <div class="d-flex bg-light justify-content-between mb-3">
            <h2>Bảng danh User</h2>
            <div class="form-inline">
                <input class="form-control" type="text" id="search" name="search" placeholder="Search">
            </div>
        </div>
        <div class="d-flex justify-content-between">    
            <div>
                <a href="{{ asset('admin/users/create') }} " class="btn btn-primary mb-3">Thêm User</a>
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
            $success = Session::get('success_user');
            if($success){
                echo "<div class='alert alert-success' role='alert'>";
                    echo $success;
                    Session::put('success_user', null);
                echo "</div>";
            }
        @endphp
        <div id="table_data">
            <table class="table table-striped table-hover table-bordered shadow-lg" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark ">
                    <tr>
                        <th colspan="1" class="text-center" style="width:5%">STT</th>
                        <th class="text-center">Hình ảnh</th>
                        <th class="text-center">Tên</th>
                        <th class="text-center">Phone</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Thao tác</th>
                    </tr>
                </thead> 
                <tbody id="list-user">
                    @if(!empty($users) && $users->count()>0)
                        @foreach ($users as $key => $value)                         
                            <tr>
                                <th colspan='1' class='text-center' style='width:5%'>{{ ( $currentPage - 1 ) * $perPage + $key + 1 }}</th>
                                <td class='text-center admin_product_img'><img src='{{URL::asset($value->avatar_img_path)}}'></td>
                                <td class="text-center">{{$value->full_name}}</td>
                                <td class="text-center">{{$value->telephone}}</td>
                                <td class="text-center">{{$value->email}}</td>
                                <td colspan="1" class="text-center" style="width:15%">
                                    <a class="btn btn-primary" href="#" onclick="viewUserDetail({{$value->id}})" data-toggle="modal" data-target="#modalDetailUser"><i class="fas fa-eye"></i></a>
                                    <a href="{{ Route('user.edit', ['id'=>$value->id])}}" class="btn btn-success"><i class="fas fa-pencil-alt"></i></a>
                                    <a data-url="{{Route('user.delete', ['id'=>$value->id])}}" class="btn btn-danger action_delete"><i class="fas fa-trash-alt"></i></a>
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
                {!! $users->links() !!}
            </div>
        </div>
        
        <section>
            <!-- Modal -->
            <div class="modal fade" id="modalDetailUser" tabindex="-1" aria-labelledby="user-modal-label" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header border-0">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
                        </div>
                        {{-- code từ đây  --}}
                        <div class="modal-body border-0" id="modal-user-detail"></div>
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
        $('#collapsePermission').addClass('show');
        $('.user_active').addClass('active');
    });
</script>

<script type="text/javascript" >  
    function viewUserDetail(id){
        $.ajax({
            url:'/admin/users/details/',
            method:'GET',
            data:{id:id},
            success:(user)=>{
                console.log(user);           
                let userDetails = `
                    <div class="single-product small-container">
                        <div class="details_row">
                            <div class="details_col">
                                <div class="main-img-row position-relative rounded border border-secondary">
                                    <img src="{{ '${user.avatar_img_path}' }}" id="productImg"/>
                                </div>
                            </div>
                            <div class="details_col">
                                <h4 class="text-center text-capitalize">${user.full_name}</h4>
                                <div class="mt-1">
                                    <p class="mb-0"><span> Username: </span><span class="ml-2 text-success font-italic" style="font-size: 15px">${user.user_name}</span></p>
                                </div>
                                <div class="mt-1">
                                    <p class="mb-0"><span> Email: </span><span class="ml-2 text-success font-italic" style="font-size: 15px">${user.email}</span></p>
                                </div>
                                <div class="mt-1">
                                    <p class="mb-0"><span> Phone: </span><span class="ml-2 text-success font-italic" style="font-size: 15px">${user.telephone}</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                `
                role_name = ``
                $('#modal-user-detail').html('').append(userDetails);
            }
        });
    }


</script>

