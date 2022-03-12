<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class RoleController extends Controller
{
    private $role;
    private $permissions;
    public function __construct(Role $role, Permission $permissions)
    {
        $this->role = $role;
        $this->permissions = $permissions;
    }
    public function index(){
        $data = $this->role->latest()->paginate(10);
        $currentPage = $data->currentPage();
        $perPage = $data->perPage();
        $total = $data->total();
        return view('admin.manage_role.index', compact('data', 'currentPage', 'perPage', 'total'));
    }
    public function create(){
        $permissionParent = $this->permissions->where('parent_id', 0)->get();
        return view('admin.manage_role.add', compact('permissionParent'));
    }
    public function store(Request $request){
        $role = $this->role->create([
            'name'          => $request->name,
            'desc_name'     => $request->desc_name
        ]);
        $role->permissions()->attach($request->permission_id);
        $request->session()->put('success_role', 'Thêm vai trò thành công');
        return Redirect::to('admin/roles/index');
    }


    public function edit($id){
        $role = $this->role->find($id);
        $permissionParent = $this->permissions->where('parent_id', 0)->get();
        $permissionsChecked = $role->permissions;
        return view('admin/manage_role.edit', compact('role','permissionParent', 'permissionsChecked'));
    }

    public function update(Request $request, $id){
        $this->role->find($id)->update([
            'name'          =>  $request->name,
            'desc_name'     => $request->desc_name
        ]);
        $role = $this->role->find($id);
        $role->permissions()->sync($request->permission_id);
        $request->session()->put('success_role', 'Sửa vai trò thành công');
        return Redirect::to('admin/roles/index');
    }

    public function delete($id){
        try {
            $this->role->find($id)->delete();
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
