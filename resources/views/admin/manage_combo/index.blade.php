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
            <h2>Bảng danh sách combo</h2>
            <div class="form-inline">
                <input class="form-control" type="text" id="search" name="search" placeholder="Search">
            </div>
        </div>
        <div class="d-flex justify-content-between">    
            <div>
                @can('combo-add')
                    <a href="{{ route('combo.create') }} " class="btn btn-primary mb-3">Thêm combo</a>
                @endcan
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
            $success = Session::get('success_combo');
            if($success){
                echo "<div class='alert alert-success' id='combo_alert'>";
                    echo $success;
                    Session::put('success_combo', null);
                echo "</div>";
            }
        @endphp
        <div id="table_data">
            <table class="table table-striped table-hover table-bordered shadow-lg" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark ">
                    <tr>
                        <th colspan="1" class="text-center" style="width:5%">STT</th>
                        <th class="text-center">Hình ảnh</th>
                        <th class="text-center sorting" data-sorting_type="asc" data-column_name="name" style="cursor: pointer">Tên</th>
                        <th class="text-center sorting" data-sorting_type="asc" data-column_name="price" style="cursor: pointer">Giá</th>
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
                                <td class="text-center">{{$value->name}}</td>
                                <td class="text-center"><span class="text-success">{{ number_format($value->price, 0) }} VNĐ</span>
                                </td>
                                <td class="text-center">{{ optional($value->desc) }}</td>
                                <td class="text-center"> {{ $value->status }} </td>
                                <td colspan="1" class="text-center" style="width:15%">
                                    @can('combo-edit')
                                        <a class="btn btn-primary" href="#" onclick="viewComboDetail({{$value->id}})" data-toggle="modal" data-target="#modalDetailCombo"><i class="fas fa-eye"></i></a>
                                        <a href="{{ Route('combo.edit', ['id'=>$value->id])}}" class="btn btn-success"><i class="fas fa-pencil-alt"></i></a>
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
                {!! $data->links() !!}
            </div>
        </div>
        
        <section>
            <!-- Modal -->
            <div class="modal fade" id="modalDetailCombo" tabindex="-1" aria-labelledby="combo-modal-label" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header border-0">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
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
        var category_name = '';
        let imagesPath = '';

        function viewComboDetail(id){
            let formatter = new Intl.NumberFormat('vn-VN', {
                style: 'currency',
                currency: 'VND',
            });
            // $.ajax({
            //     url:'/admin/products/details/',
            //     method:'GET',
            //     data:{id:id},
            //     success:(product)=>{
            //         console.log(product);
            //         var statusProduct = '';
            //         if (product.status == 1) {
            //             statusProduct = '<p class="mb-0"><span> Status: </span><span class="ml-2 text-success font-italic" style="font-size: 15px">Active</span></p>';
            //         } else {
            //             statusProduct = '<p class="mb-0"><span> Status: </span><span class="ml-2 text-danger font-italic" style="font-size: 15px">Disable</span></p>';
            //         }
                  
            //         var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            //         let productDetails = `
            //             <div class="single-product small-container">
            //                 <div class="details_row">
            //                     <div class="details_col">
            //                         <div class="main-img-row position-relative rounded border border-secondary">
            //                             <img src="{{ '${product.feature_image_path}' }}" id="productImg"/>
            //                             <p class="product-detail-status text-light position-absolute bg-primary rounded" style="top: 10px; left: 1rem; padding: 4px 12px;"><span style="font-size: 14px;">${product.name}</span></p>
            //                         </div>
            //                         <div class="small-img-row">
            //                             ${imagesPath}
            //                         </div>
            //                     </div>
            //                     <div class="details_col">
            //                         <h4 class="text-center text-capitalize">${product.name}</h4>
            //                         <div class="mt-1">
            //                             <p class="mb-0"><span> Price: </span><span class="ml-2 text-success font-italic" style="font-size: 15px">${formatter.format(product.price)}</span></p>
            //                         </div>
            //                         <div class="mt-1">
            //                             <p class="mb-0"><span> Category: </span><span class="ml-2 text-success font-italic" style="font-size: 15px">${category_name}</span></p>
            //                         </div>
            //                         <div class="mt-1">${statusProduct}</div>
            //                         <div class="mt-1">
            //                             <p class="mb-0"><span> Created_at: </span><span class="ml-2 text-success font-italic" style="font-size: 15px">${new Date(product.created_at).toLocaleDateString("en-US",options)}</span></p>
            //                         </div>
            //                         <div class="mt-1">
            //                             <p class="mb-0"><span> Updated_at: </span><span class="ml-2 text-success font-italic" style="font-size: 15px">${new Date(product.updated_at).toLocaleDateString("en-US",options)}</span></p>
            //                         </div>
            //                         <hr style="background:#999">
            //                         <div class="product-detail-content mt-1">
            //                             <h6 class="mb-2">Content: </h6>
            //                             <div class="font-italic">
            //                                 ${product.content}
            //                             </div>
            //                         </div>
            //                     </div>
            //                 </div>
            //             </div>
            //         `
            //         $('#modal-product-detail').html('').append(productDetails);
            //         imagesPath = '';
                // }
            // });
        }

    // });

</script>

