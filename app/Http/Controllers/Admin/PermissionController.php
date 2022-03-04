<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function create(){
        return view('admin.permission.add');
    }
    public function store(Request $request){
        $permission = Permission::create([
            'name'          =>  $request->module_parent,
            'desc_name'     =>  $request->module_parent,
            'parent_id'     =>  0,
            'key_code'      =>  ''

        ]);
        foreach($request->module_childrent as $value){
            Permission::create([
                'name'          =>  $value.' '.$request->module_parent,
                'desc_name'     =>  $value.' '.$request->module_parent,
                'parent_id'     =>  $permission->id,
                'key_code'      =>  $value.'_'.$request->module_parent 
            ]);
            
        }
        $request->session()->put('success_permission', 'Tạo thành công');
        return view('admin.permission.add');
    }
}
