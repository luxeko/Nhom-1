<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Components\Recusive;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    private $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }
    public function getCategory($parentId){
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }
    public function create(){
        $htmlOption = $this->getCategory($parentId = '');
        return view('admin/manage_category.add_category', compact('htmlOption'));
    }
    public function show(){
        $all_category = $this->category->latest()->paginate(7);
        $currentPage = $all_category->currentPage();
        $perPage = $all_category->perPage();
        $total = $all_category->total(); 
        $htmlOption = $this->getCategory($parentId = '');
        return view('admin/manage_category.manage_category', compact('all_category', 'currentPage', 'perPage', 'total', 'htmlOption'));
    }
    public function store(Request $request){   
        $err = [];
        if($request->category_name == null){
            $err['name_undefined'] = 'Tên danh mục không được để trống';
        } 
        if($request->status == null){
            $err['status_null'] = 'Vui lòng chọn trạng thái sản phẩm';
        }
        if($request->category_desc == null){
            $err['desc_null'] = 'Vui lòng nhập miêu tả';
        }
        if(count($err) > 0){
            return Redirect::back()->withInput()->with($err);
        } else{
            $result = $this->category->create([
                'name'          => $request->category_name,
                'desc_name'     => $request->category_desc,
                'status'        => $request->status,
                'parent_id'     => $request->parent_id,
                'slug'          => strtolower(str_replace(' ','-',$request->category_name))
            ]);
            if($result){
                $request->session()->put('success_category', 'Thêm danh mục sản phẩm thành công');
                return Redirect::to('admin/categories/show');
            }
        }
    }
    public function edit($id){
        $category = $this->category->find($id);
        $htmlOption = $this->getCategory($category->parent_id);
        return view('admin/manage_category.edit_category', compact('category', 'htmlOption'));
    }
    public function update(Request $request, $id){
        $err = [];
        if($request->category_name == null){
            $err['name_undefined'] = 'Tên danh mục không được để trống';
        } 
        if($request->status == null){
            $err['status_null'] = 'Vui lòng chọn trạng thái sản phẩm';
        }
        if($request->category_desc == null){
            $err['desc_null'] = 'Vui lòng nhập miêu tả';
        }
        if(count($err) > 0){
            return Redirect::back()->withInput()->with($err);
        } else{
            $result = $this->category->find($id)->update([
                'name'          => $request->category_name,
                'desc_name'     => $request->category_desc,
                'status'        => $request->status,
                'parent_id'     => $request->parent_id,
                'slug'          => strtolower(str_replace(' ','-',$request->category_name))
            ]);
            if($result){
                $request->session()->put('success_category', 'Cập nhật danh mục sản phẩm thành công');
                return Redirect::to('admin/categories/show');
            } 
        }
    }
    public function delete($id){
        try {
            $this->category->find($id)->delete();
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
        $status = $request->get('status_filter');
        $all_category = $this->category->where('name', 'like', '%'.$search.'%')->where('status', 'like', '%'.$status.'%')->paginate(7);
       
        $currentPage = $all_category->currentPage();
        $perPage = $all_category->perPage();
        $total = $all_category->total();
        return view('admin/manage_category.manage_category', compact('all_category', 'currentPage', 'perPage', 'total', 'search', 'status'));
    }
}
