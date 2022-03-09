{{-- Các bước để tạo khung trang Dashboard --}}

{{-- Bước 1: @extends('admin/layouts.admin_layout') --}}
@extends('admin/layouts.admin_layout')

{{-- Bước 2: Đặt tên cho title  --}}
@section('title')
    <title>Combo</title>
@endsection
{{-- Bước 3: Viết code cần show data ở sau thẻ div  --}}
@section('content')
    @include('admin/partials.preloader')
    <div class="container-fluid" id="preloader">
        <!-- code database bắt đầu từ đây  -->
        <div class="d-flex bg-light justify-content-between mb-3">
            <h2 class="border-bottom border-secondary">Danh sách combo</h2>
        </div>
        <div class="d-flex justify-content-between">    
            <div>
                @can('combo-add')
                    <a href="{{ route('combo.create') }} " class="btn btn-primary mb-3">Thêm combo</a>
                @endcan
            </div>
            <form action="{{ route('combo.search') }}" method="get" class="form-inline">
                <div class="form-group">
                    <input value="{{ isset($search) ? $search : '' }}" class="form-control mr-sm-2" name="search" type="search" placeholder="Tên combo" aria-label="Search">
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
                    <select class="form-control input-xs mr-sm-2" name="status_filter" >
                        @if(isset($status)  && $status == 'Active')
                            <option value="">Chọn status </option>  
                            <option selected value="Active">Active</option>
                            <option value="Disable">Disable</option>
                        @endif
                        @if(isset($status) && $status == 'Disable')
                            <option value="">Chọn status </option>  
                            <option value="Active">Active</option>
                            <option selected value="Disable">Disable</option>
                        @endif
                        @if(empty($status))
                            <option value="">Chọn status </option>  
                            <option value="Active">Active</option>
                            <option value="Disable">Disable</option>
                        @endif
                    </select>
                </div>
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Tìm kiếm</button>
            </form>
           
        </div>
        
        @php             
            $success = Session::get('success_combo');
            if($success){
                echo "<div class='alert alert-success' id='combo_alert'>";
                    echo $success;
                    Session::put('success_combo', null);
                echo "</div>";
            }
        @endphp
        <div id="table_data">
            <div class="text-dark font-weight-bold">Có {{ $data->count() }} kết quả / trang</div>
            <table class="table table-hover table-bordered shadow-lg" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark ">
                    <tr>
                        <th colspan="1" class="text-center" style="width:5%">STT</th>
                        <th class="text-center">Hình ảnh</th>
                        <th class="text-center">Tên</th>
                        <th class="text-center">Giá <span class="text-success">(-20%)</span></th>
                        <th class="text-center">Mô tả</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Thao tác</th>
                    </tr>
                </thead> 
                <tbody id="list-combo">
                    @if( !empty($data) && $data->count()>0 )
                        @foreach ($data as $key => $value)                         
                            <tr>
                                <th colspan='1' class='text-center' style='width:5%'>{{ ( $currentPage - 1 ) * $perPage + $key + 1 }}</th>
                                <td class='text-center admin_product_img'><img src='{{$value->image_combo_path}}'></td>
                                <td class="text-dark font-weight-bolder">{{$value->name}}</td>
                                <td class="font-italic"><span class="text-success ">{{ number_format($value->price, 0) }} VNĐ</span>
                                </td>
                                <td class=""> @php echo  $value->desc @endphp</td>
                                <td class="text-center"> 
                                    @if ($value->status == "Active")
                                        <span class='badge bg-success text-white p-2'>{{$value->status}}</span>
                                    @else
                                        <span class='badge bg-danger text-white p-2'>{{$value->status}}</span>
                                    @endif 
                                </td>
                                <td colspan="1" class="text-center" style="width:15%">
                                    @can('combo-edit')
                                        <a class="btn btn-primary" href="#" onclick="viewComboDetail({{$value->id}})" data-toggle="modal" data-target="#modalDetailCombo"><i class="fas fa-eye"></i></a>
                                    @endcan
                                    @can('combo-delete')
                                        <a data-url="{{Route('combo.delete', ['id'=>$value->id])}}" class="btn btn-danger action_delete"><i class="fas fa-trash-alt"></i></a>
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
                @if (!empty($data))
                    {!! $data->links() !!} 
                @endif  
            </div>
        </div>
        <section>
            <!-- Modal -->
            <div class="modal fade" id="modalDetailCombo" tabindex="-1" aria-labelledby="combo-modal-label" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-dark ">
                            <span class="text-white modal-title" id="myModalLabel150">List sản phẩm</span>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">x</button>
                        </div>
                        {{-- code từ đây  --}}
                        <div class="modal-body border-0" id="modal-combo-detail"></div>
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
<script src="{{URL::asset('backend/js/combo/main.js')}}"></script>
<script type="text/javascript" src={{URL::asset('backend/js/actionDelete.js')}}></script>

<script type="text/javascript" >  
    // $(document).ready(function(){
        function viewComboDetail(id){
            $.ajax({
                url:'/admin/combos/details/',
                method:'GET',
                data:{id:id},
                success:(combo)=>{
                    console.log(combo);
                    let stt = 1;
                    let detailProduct = '';
                    combo.forEach(e => {
                        let single_product = `<tr>
                                        <th colspan='1' class='text-center' style='width:5%'>${stt++}</th>
                                        <td class='text-center admin_product_img'><img src='${e.feature_image_path}'></td>
                                        <td class="text-center">${e.name}</td>
                                        <td class="text-center"><span class="text-success">${e.price.replace(/\B(?=(\d{3})+(?!\d))/g, ".")} VNĐ</span>
                                        </td>
                                    </tr> `
                        detailProduct += single_product;
                    });
                    let comboDetails = `
                        <table class="table table-lg table-striped" id="dataTable" width="100%" cellspacing="0">
                            <thead class="thead-primary ">
                                <tr>
                                    <th colspan="1" class="text-center" style="width:5%">STT</th>
                                    <th class="text-center">Hình ảnh</th>
                                    <th class="text-center">Tên </th>
                                    <th class="text-center">Giá </th>
                                </tr>
                            </thead> 
                            <tbody>
                                    ${detailProduct}  
                            </tbody>
                        </table>
                    `
                    $('#modal-combo-detail').html('').append(comboDetails);
                    detailProduct = ``
                }
            });
        }

    // });

</script>

