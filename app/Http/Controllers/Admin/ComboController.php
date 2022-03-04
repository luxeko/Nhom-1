<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Combo;
use App\Models\Product;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class ComboController extends Controller
{
    use StorageImageTrait;
    private $product;
    private $category;
    private $productImage;
    private $combo;

    public function __construct(Product $product, Category $category, Combo $combo)
    {
        $this->product      = $product;
        $this->category     = $category;
        $this->combo        = $combo;
    }
    public function index(){
        $data = $this->combo->latest()->paginate(5);
        $currentPage = $data->currentPage();
        $perPage = $data->perPage();
        $total = $data->total();
        return view('admin.manage_combo.index', compact('data', 'currentPage', 'perPage', 'total'));
    }
    public function create(){
        $products = $this->product->where('status', 1)->get();
      
        return view('admin.manage_combo.add', compact('products'));
    }
    public function store(Request $request){
        try {
            $err = [];
            if(trim($request->name) == null){
                $err['name_null'] = 'Vui lòng nhập tên cho Combo';
            }
            if($request->status == null){
                $err['status_null'] = "Vui lòng chọn trạng thái cho Combo";
            }
            if($request->desc == null){
                $err['desc_null'] = "Vui lòng nhập mô tả cho Combo";
            }  
            if($this->storageTraitUpload($request, 'image_combo_path', 'combo') == null){
                $err['image_null'] = 'Vui lòng chọn ảnh đại diện';
            }
            if(trim($request->total_price) == null){
                $err['price_null'] = 'Vui lòng chọn sản phẩm cho Combo';
            }
            if(count($err)>0){
                return Redirect::back()->withInput()->with($err);
            } else {
                DB::beginTransaction();
                $dataComboCreate = [
                    'name'        =>  $request->name,
                    'status'            =>  $request->status,
                    'desc'              =>  $request->desc,
                    'price'             =>  str_replace(".", "", $request->total_price)
                ];
                $dataUploadFeatureImage = $this->storageTraitUpload($request, 'image_combo_path', 'combo');
                if(!empty($dataUploadFeatureImage)){
                    $dataComboCreate['image_combo_path'] = $dataUploadFeatureImage['file_path']; 
                }
                $combo = $this->combo->create($dataComboCreate);
                $product_combo = $request->product_name;
                $combo->list_product_combos()->attach($product_combo);
                DB::commit();
                if($combo){
                    $request->session()->put('success_combo', 'Thêm Combo thành công');
                    return redirect()->route('combo.index');
                }
            }

        } catch (\Exception $exc) {
            DB::rollBack();
            Log::error("Message: " . $exc->getMessage() . ' Line: ' . $exc->getLine());
        }
    }
    public function delete($id){
        try {
            $this->combo->find($id)->delete();
            return response()->json([
                'code'      => 200,
                'message'   => 'success'
            ], 200);
        } catch (\Exception $exc) {
            Log::error("Message: " . $exc . " Line: " . $exc->getLine());
            return response()->json([
                'code'      => 500,
                'message'   => 'fail'
            ], 500);
        }
    }

    public function details_combo(Request $request){
        $combo = $this->combo->find($request->id);
        $list_product = $combo->list_product_combos;
        return $list_product;
 
    }

}
