<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RoleController extends Controller
{
    private $role;
    public function __construct(Role $role)
    {
        $this->role = $role;
    }
    public function index(){
        $data = $this->role->latest()->paginate(5);
        $currentPage = $data->currentPage();
        $perPage = $data->perPage();
        $total = $data->total();
        return view('admin.manage_role.index', compact('data', 'currentPage', 'perPage', 'total'));
    }
    public function create(){
        return view('admin.manage_role.add');
    }
    public function store(Request $request){
        
    }
    public function edit($id){
        
    }
    public function update(Request $request, $id){
        
    }
    public function delete($id){
        try {
            $this->blog->find($id)->delete();
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
