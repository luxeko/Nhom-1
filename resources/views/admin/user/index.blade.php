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
            <h2 class="border-bottom border-secondary">Danh sách User</h2>
        </div>
        <div class="d-flex justify-content-between">    
            <div>
                @can('user-add')
                    <a href="{{ asset('admin/users/create') }} " class="btn btn-primary mb-3">Thêm User</a>
                    
                @endcan
            </div>
            <form action="{{ route('user.search') }}" method="get" class="form-inline mb-3">
                <div class="form-group">
                    <input value="{{ isset($full_name) ? $full_name : '' }}" class="form-control mr-sm-2" name="full_name" type="search" placeholder="Tên" aria-label="Search">
                </div>
                
                <div class="form-group">
                    <input value="{{ isset($telephone) ? $telephone : '' }}" class="form-control mr-sm-2" name="telephone" type="search" placeholder="Số điện thoại" aria-label="Search">
                </div>
                <div class="form-group">
                    <input  value="{{ isset($email) ? $email : '' }}" class="form-control mr-sm-2" name="email" type="search" placeholder="Email" aria-label="Search">
                </div>
                <div class="form-group">
                    <input value="{{ isset($address) ? $address : '' }}" class="form-control mr-sm-2" name="address" type="search" placeholder="Địa chỉ" aria-label="">
                </div>
                <div class="form-group">
                    <select name="city_id"  class="pr-5 form-control input-xs mr-sm-2">
                        <option value="{{ null }}">Thành phố</option>
                        @if(isset($city_id))
                            @forEach($allCity as $value)
                                @if($city_id == $value->city_id)
                                    <option selected value="{{$value->city_id}}">{{$value->vn_name}}</option>
                                @else
                                    <option value="{{$value->city_id}}">{{$value->vn_name}}</option>
                                @endif
                            @endforeach
                        @endif
                        @if(empty($city_id) || $city_id == null)
                            @forEach($allCity as $value)
                                <option value="{{$value->city_id}}">{{ $value->vn_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Tìm kiếm</button>
            </form>
        </div>
        @php             
            $success = Session::get('success_user');
            if($success){
                echo "<div class='alert alert-success' id='user_alert'>";
                    echo $success;
                    Session::put('success_user', null);
                echo "</div>";
            }
        @endphp
        <div id="table_data">
            <div class="text-dark font-weight-bold">Có {{ $users->count() }} kết quả / trang</div>
            <table class="table table-hover table-bordered shadow-lg" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark ">
                    <tr>
                        <th colspan="1" class="text-center" style="width:5%">STT</th>
                        <th class="text-center">Hình ảnh</th>
                        <th class="text-center">Tên</th>
                        <th class="text-center">Phone</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Địa chỉ</th>
                        <th class="text-center">Thành phố</th>
                        <th class="text-center">Vai trò</th>
                        <th class="text-center">Thao tác</th>
                    </tr>
                </thead> 
                <tbody id="list-user">
                    @if(!empty($users) && $users->count()>0)
                        @foreach ($users as $key => $value)                         
                            <tr>
                                <th colspan='1' class='text-center' style='width:5%'>{{ ( $currentPage - 1 ) * $perPage + $key + 1 }}</th>
                                <td class='text-center admin_product_img'><img src='{{URL::asset($value->avatar_img_path)}}'></td>
                                <td class="text-dark font-weight-bold">{{$value->full_name}}</td>
                                <td class="text-center">{{$value->telephone}}</td>
                                <td class="text-center">{{$value->email}}</td>
                                <td class="text-center">{{$value->address}}</td>
                                <td class="text-center">{{ optional($value->getCity)->vn_name }}</td>
                                <td class="">
                                    @forEach($value->roles as $data )
                                        <span class='badge bg-success p-2 text-white' style="font-size: 15px">{{$data->name}}</span>
                                    @endforeach
                                </td>
                                <td colspan="1" class="text-center" style="width:15%">
                                    @can('user-edit')
                                        <a href="{{ Route('user.edit', ['id'=>$value->id])}}" class="btn btn-success"><i class="fas fa-pencil-alt"></i></a>
                                    @endcan
                                    @can('user-delete')
                                        <a data-url="{{Route('user.delete', ['id'=>$value->id])}}" class="btn btn-danger action_delete"><i class="fas fa-trash-alt"></i></a>
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
            </table>
            <div class="d-flex justify-content-center">
                @if (!empty($users))
                    {!! $users->links() !!}
                @endif  
            </div>
        </div>
        
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

<script src="{{URL::asset('backend/js/user/main.js')}}"></script>


