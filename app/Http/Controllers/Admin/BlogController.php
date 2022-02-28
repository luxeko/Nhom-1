<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class BlogController extends Controller
{
    private $blog;
    use StorageImageTrait;
    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }
    public function index(){
        $data = $this->blog->paginate(5);
        $currentPage = $data->currentPage();
        $perPage = $data->perPage();
        $total = $data->total();
        return view('admin.manage_blog.index', compact('data', 'currentPage', 'perPage', 'total'));
    }
    public function create(){
        return view('admin.manage_blog.add');
    }
    public function store(Request $request){
        try {
            $err = [];
            if($request->title == null){
                $err['title_null'] = 'Vui lòng nhập tiêu đề';
            }
            if($request->author == null){
                $err['author_null'] = 'Vui lòng nhập tên tác giả';
            }
            if($request->status == null){
                $err['status_null'] = 'Vui lòng chọn status';
            }
            if($request->content_post == null){
                $err['content_null'] = 'Vui lòng nhập nội dung cho Blog';
            }
            if($this->storageTraitUpload($request, 'background', 'blog') == null){
                $err['image_null'] = 'Vui lòng chọn ảnh bìa';
            }
            if(count($err)>0){
                return Redirect::back()->withInput()->with($err);
            } else{
                DB::beginTransaction();
                $dataBlogCreate = [
                    'title'         => $request->title,
                    'content_post'  => $request->content_post,
                    'author'         => $request->author,
                    'status'        => $request->status,
                ];
                $dataUploadFeatureImage = $this->storageTraitUpload($request, 'background', 'blog');
                if(!empty($dataUploadFeatureImage)){
                    $dataBlogCreate['image'] = $dataUploadFeatureImage['file_path']; 
                }
                $blog = $this->blog->create($dataBlogCreate);
                DB::commit();
                if($blog){
                    $request->session()->put('success_blog', 'Thêm Blog thành công');
                    return Redirect::to('admin/blogs/index');
                }
            }
        } catch (\Exception $exc) {
            DB::rollBack();
            Log::error("Message: " . $exc->getMessage() . ' Line: ' . $exc->getLine());
        }
    }
    public function edit(){

    }
    public function update(){

    }
    public function delete(){

    }
    public function details_blog(Request $request){
        return Blog::findOrFail($request->id);
    }
}
