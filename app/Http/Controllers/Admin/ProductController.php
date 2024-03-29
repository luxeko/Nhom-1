<?php

namespace App\Http\Controllers\Admin;

use App\Components\Recusive;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductAddRequest;
use App\Models\Category;
use App\Models\discount;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\User;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    use StorageImageTrait;
    private $product;
    private $category;
    private $productImage;

    public function __construct(Product $product, Category $category, ProductImage $productImage)
    {
        $this->product = $product;
        $this->category = $category;
        $this->productImage = $productImage;
    }
    public function getCategory($parentId){
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return  $htmlOption;
    }
    public function create(){
        $htmlOption = $this->getCategory($parentId = '');
        return view('admin.manage_product.add', compact('htmlOption'));
    }
    
    public function show(){
        $htmlOption = $this->getCategory($parentId = '');
        $data = $this->product->latest()->paginate(10);
        $currentPage = $data->currentPage();
        $perPage = $data->perPage();
        $total = $data->total();
        return view('admin.manage_product.product', compact('data', 'currentPage', 'perPage', 'total', 'htmlOption'));
    }
   
    public function details_product(Request $request){
        return Product::findOrFail($request->id);
    }   
    public function get_category_name($id){
        $name = Category::find($id);
        return $name;
    }
    public function get_thumbnail($product_id){
        $thumbnail = ProductImage::where('product_id',"=", $product_id)->get('image_path');
        return $thumbnail;
    }
    public function store(Request $request){
        try {
            $err = [];
            $getName = $this->product->where('name', $request->product_name)->exists();
            if($request->category == null){
                $err['category_id_null'] = 'Vui lòng chọn danh mục cho sản phẩm';
            }
            if($request->product_name == null){
                $err['product_name_null'] = 'Vui lòng nhập tên cho sản phẩm';
            }
            if($request->status == null){
                $err['status_null'] = 'Vui lòng chọn status';
            }
            if($request->product_price == null){
                $err['price_null'] = 'Vui lòng nhập giá cho sản phẩm';
            }
            if($request->contents == null){
                $err['content_null'] = 'Vui lòng nhập nội dung cho sản phẩm';
            }
            if($getName == true){
                $err['duplicate_product'] = 'Sản phẩm đã tồn tại';
            }
            if($this->storageTraitUpload($request, 'feature_image_path', 'product') == null){
                $err['image_null'] = 'Vui lòng chọn ảnh đại diện';
            }
            if(count($err)>0){
                return Redirect::back()->withInput()->with($err);
            } else{
                DB::beginTransaction();
                $dataProductCreate = [
                    'name'          => $request->product_name,
                    'content'       => $request->contents,
                    'price'         => str_replace(',','', $request->product_price),
                    'status'        => $request->status,
                    'category_id'   => $request->category,
                    'user_id'       => auth()->id(),
                    'slug'          => strtolower(str_replace(' ','-', $request->product_name))
                ];
                $dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'product');
                if(!empty($dataUploadFeatureImage)){
                    $dataProductCreate['feature_image_name'] = $dataUploadFeatureImage['file_name']; 
                    $dataProductCreate['feature_image_path'] = $dataUploadFeatureImage['file_path']; 
                }
                $product = $this->product->create($dataProductCreate);
                // insert data to product_images
                if( $request->hasFile('image_path')  ){
                    foreach( $request->image_path as $fileItem ){
                        $dataImageThumbnail = $this->storageTraitUploadMultiple($fileItem, 'thumbnail_img');
                        $product->productImages()->create([
                            'image_path' => $dataImageThumbnail['file_path'],
                            'image_name' => $dataImageThumbnail['file_name'],
                        ]);
                        // $this->productImage->create(['image_path' => $dataImageThumbnail['file_path'],'image_name' => $dataImageThumbnail['file_name'],]);
                    }
                }
                DB::commit();
                if($product){
                    $request->session()->put('success_product', 'Thêm sản phẩm thành công');
                    return Redirect::to('admin/products/show');
                }
            }
        } catch (\Exception $exc) {
            DB::rollBack();
            Log::error("Message: " . $exc->getMessage() . ' Line: ' . $exc->getLine());
        }
    }

    public function edit($id){
        $product = $this->product->find($id);
        $htmlOption = $this->getCategory($product->category_id);
        return view('admin/manage_product.edit', compact('product', 'htmlOption'));
    }
    public function update(Request $request, $id){
        try {
            $err = [];
         
            if($request->product_name == null){
                $err['product_name_null'] = 'Vui lòng nhập tên cho sản phẩm';
            }
            if($request->status == null){
                $err['status_null'] = 'Vui lòng chọn status';
            }
            if($request->product_price == null){
                $err['price_null'] = 'Vui lòng nhập giá cho sản phẩm';
            }
        
            if(count($err)>0){
                return Redirect::back()->withInput()->with($err);
            } else{
                DB::beginTransaction();
                $dataProductUpdate = [
                    'name'          => $request->product_name,
                    'content'       => $request->contents,
                    'price'         => str_replace(',','', $request->product_price) ,
                    'status'        => $request->status,
                    'category_id'   => $request->category,
                    'user_id'       => auth()->id(),
                    'slug'          => strtolower(str_replace(' ','-', $request->product_name))
                ];
                $dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'product');
                if(!empty($dataUploadFeatureImage)){
                    $dataProductUpdate['feature_image_name'] = $dataUploadFeatureImage['file_name']; 
                    $dataProductUpdate['feature_image_path'] = $dataUploadFeatureImage['file_path']; 
                }
                $this->product->find($id)->update($dataProductUpdate);
                $product = $this->product->find($id);
                // insert data to product_images
                if( $request->hasFile('image_path')){
                    $this->productImage->where('product_id', $id)->delete();
                    foreach( $request->image_path as $fileItem ){
                        $dataImageThumbnail = $this->storageTraitUploadMultiple($fileItem, 'thumbnail_img');
                        $product->productImages()->create([
                            'image_path' => $dataImageThumbnail['file_path'],
                            'image_name' => $dataImageThumbnail['file_name'],
                        ]);
                        // $this->productImage->create(['image_path' => $dataImageThumbnail['file_path'],'image_name' => $dataImageThumbnail['file_name'],]);
                    }
                }
                DB::commit();
                if($product){
                    $request->session()->put('success_product', 'Cập nhật sản phẩm thành công');
                    return Redirect::to('admin/products/show');
                }
            }
        } catch (\Exception $exc) {
            DB::rollBack();
            Log::error("Message: " . $exc->getMessage() . ' Line: ' . $exc->getLine());
        }
    }
    public function delete($id){
        try {
            $this->product->find($id)->delete();
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

    public function search(Request $request){
        $search = $request->get('search');
        $status_filter = $request->get('status_filter');
        $category = $request->get('category_filter');
        $sort = $request->get('sort_filter');
        $getAllCategory = $this->category->where('status', 1)->get();
        $htmlOption = $this->getCategory($parentId = '');
        
        $data = [];
        if($category == null && $status_filter == null && $search== null){
            $data = $this->product->whereNull('deleted_at')->latest()->paginate(10);
            if($sort == 'asc' ){
                $data = $this->product->where('name', 'like', '%'.$search.'%')->where('status','like', '%'.$status_filter.'%')->where('category_id','like','%'.$category.'%')->whereNull('deleted_at')->orderBy('price', 'asc')->paginate(50);
            }
            if($sort == 'desc' ){
                $data = $this->product->where('name', 'like', '%'.$search.'%')->where('status','like', '%'.$status_filter.'%')->where('category_id','like','%'.$category.'%')->whereNull('deleted_at')->orderBy('price', 'desc')->paginate(50);
            }
    
            if($sort == 'latest' ){
                $data = $this->product->where('name', 'like', '%'.$search.'%')->where('status','like', '%'.$status_filter.'%')->where('category_id','like','%'.$category.'%')->whereNull('deleted_at')->orderBy('updated_at','asc')->paginate(50);
            }
    
            if($sort == 'oldest'){
                $data = $this->product->where('name', 'like', '%'.$search.'%')->where('status','like', '%'.$status_filter.'%')->where('category_id','like','%'.$category.'%')->whereNull('deleted_at')->orderBy('updated_at', 'desc')->paginate(50);
            }
        } else {
            if($search != null || $status_filter != null || $category != null){
                $data = $this->product->where('name', 'like', '%'.$search.'%')->where('status','like', '%'.$status_filter.'%')->where('category_id','like','%'.$category.'%')->whereNull('deleted_at')->paginate(50);
                if($sort == 'asc' ){
                    $data = $this->product->where('name', 'like', '%'.$search.'%')->where('status','like', '%'.$status_filter.'%')->where('category_id','like','%'.$category.'%')->whereNull('deleted_at')->orderBy('price', 'asc')->paginate(50);
                }
                if($sort == 'desc' ){
                    $data = $this->product->where('name', 'like', '%'.$search.'%')->where('status','like', '%'.$status_filter.'%')->where('category_id','like','%'.$category.'%')->whereNull('deleted_at')->orderBy('price', 'desc')->paginate(50);
                }
        
                if($sort == 'latest' ){
                    $data = $this->product->where('name', 'like', '%'.$search.'%')->where('status','like', '%'.$status_filter.'%')->where('category_id','like','%'.$category.'%')->whereNull('deleted_at')->orderBy('updated_at','desc')->paginate(50);
                }
        
                if($sort == 'oldest'){
                    $data = $this->product->where('name', 'like', '%'.$search.'%')->where('status','like', '%'.$status_filter.'%')->where('category_id','like','%'.$category.'%')->whereNull('deleted_at')->orderBy('updated_at', 'asc')->paginate(50);
                }
            }
        }        

        $currentPage = $data->currentPage();
        $perPage = $data->perPage();
        $total = $data->total();
       
        return view('admin.manage_product.product', compact('data','currentPage', 'perPage', 'total', 'search', 'status_filter', 'category', 'htmlOption', 'sort', 'getAllCategory'));
    }
    
}
