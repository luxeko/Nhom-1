<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class SettingController extends Controller
{
    private $setting;
    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }
    public function index(){
        $data = $this->setting->latest()->paginate(5);
        $currentPage = $data->currentPage();
        $perPage = $data->perPage();
        $total = $data->total();
        return view('admin.manage_setting.index', compact('data', 'currentPage', 'perPage', 'total'));
    }
    public function create(){
        return view('admin.manage_setting.add');
    }
    public function store(Request $request){
        try {
            $err = [];
            if($request->name == null){
                $err['name_null'] = 'Vui lòng nhập tên';
            }
            if($request->link == null){
                $err['link_null'] = 'Vui lòng nhập đường link';
            }
            if(count($err)>0){
                return Redirect::back()->withInput()->with($err);
            } else{
                DB::beginTransaction();
                $dataSettingCreate = [
                    'name'          => $request->name,
                    'link'          => $request->link,
                ];
                $this->setting->create($dataSettingCreate);
                DB::commit();
                $request->session()->put('success_setting', 'Thêm Setting thành công');
                return Redirect::to('admin/settings/index');
            }
        } catch (\Exception $exc) {
            DB::rollBack();
            Log::error("Message: " . $exc->getMessage() . ' Line: ' . $exc->getLine());
        }
    }
    public function edit($id){
        $setting = $this->setting->find($id);
        return view('admin/manage_setting.edit', compact('setting'));
    }
    public function update(Request $request, $id){
        try {
            $err = [];
            if($request->name == null){
                $err['name_null'] = 'Vui lòng nhập tên';
            }
            if($request->link == null){
                $err['link_null'] = 'Vui lòng nhập đường link';
            }
            if(count($err)>0){
                return Redirect::back()->withInput()->with($err);
            } else{
                DB::beginTransaction();
                $dataSettingCreate = [
                    'name'          => $request->name,
                    'link'          => $request->link,
                ];
                $this->setting->find($id)->update($dataSettingCreate);
                DB::commit();
                $request->session()->put('success_setting', 'Cập nhật Setting thành công');
                return Redirect::to('admin/settings/index');
            }
        } catch (\Exception $exc) {
            DB::rollBack();
            Log::error("Message: " . $exc->getMessage() . ' Line: ' . $exc->getLine());
        }
    }
    public function delete($id){
        try {
            $this->setting->find($id)->delete();
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
}
