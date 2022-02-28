@if(!empty($data) && $data->count()>0)
    @foreach ($data as $key => $value)                         
        <tr>
            <th colspan='1' class='text-center' style='width:5%'>{{ ( $currentPage - 1 ) * $perPage + $key + 1 }}</th>
            <td class='text-center admin_product_img'><img src='{{$value->feature_image_path}}'></td>
            <td class="text-center">{{$value->name}}</td>
            
            <td class="text-center"><span class="text-success">{{ number_format($value->price, 0) }} VNĐ</span>
            </td>
            <td class="text-center">{{ optional($value->category)->name }}</td>
            <td class="text-center">
                <?php
                    if($value->status == 1){
                        echo "<span class='text-success'>Active</span>";
                    } else {
                        echo "<span class='text-danger'>Disable</span>";
                    }  
                ?>
            </td>
            <td colspan="1" class="text-center" style="width:15%">
                <a class="btn btn-primary" href="#" onclick="getCategory({{$value->category_id}});getThumbnail({{$value->id}});viewProductDetail({{$value->id}})" data-toggle="modal" data-target="#modalDetailProduct"><i class="fas fa-eye"></i></a>
                <a href="{{ Route('product.edit', ['id'=>$value->id])}}" class="btn btn-success"><i class="fas fa-pencil-alt"></i></a>
                <a data-url="{{Route('product.delete', ['id'=>$value->id])}}" class="btn btn-danger action_delete"><i class="fas fa-trash-alt"></i></a>
            </td>
        </tr>
    @endforeach
@else
    <tr>
        <td class="text-center text-danger" colspan="12">Chưa có dữ liệu</td>
    </tr>
@endif
<tr>
    <td colspan="12" class="">
        {!! $data->links() !!}
    </td>
</tr>