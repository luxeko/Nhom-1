<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\role_user;
use Illuminate\Http\Request;
use App\Models\User;
use App\Traits\StorageImageTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class AdminUserController extends Controller
{
    private $user;
    private $role;
    use StorageImageTrait;
    public function __construct(User $user, Role $role){
        $this->user = $user;
        $this->role = $role;
    }

    public function index(){
        $users = $this->user->latest()->paginate(5);
        $currentPage = $users->currentPage();
        $perPage = $users->perPage();
        $total = $users->total();
        return view('admin.user.index', compact('users', 'currentPage', 'perPage', 'total'));
    }
    public function create(){
        $roles = $this->role->all();
        return view('admin.user.add', compact('roles'));
    }

    public function store(Request $request){
        try {
            $err = [];
            $getUserName = $this->user->where('user_name', $request->full_name)->first();
            $getEmail = $this->user->where('email', $request->email)->first();
            $getPhone = $this->user->where('telephone', $request->phone)->first();
            if($request->user_name == null){
                $err['username_null'] = 'Vui lòng nhập tên tài khoản';
            }
            if($request->full_name == null){
                $err['fullname_null'] = 'Vui lòng nhập tên người dùng';
            }
            if($request->telephone == null){
                $err['telephone_null'] = 'Vui lòng nhập số điện thoại';
            }
            if($request->email == null){
                $err['err_email'] = 'Vui lòng nhập email';
            }
            if($request->password == null){
                $err['password_null'] = 'Vui lòng nhập password';
            }
            if($request->password != $request->re_password){
                $err['confirm_password_notEqual'] = 'Mật khẩu nhập lại không đúng';
            }
            if( $getUserName){
                $err['duplicate_username'] = 'Tên tài khoản đã tồn tại';
            }
            if($getEmail){
                $err['duplicate_email'] = 'Email đã tồn tại';
            }
            if($getPhone){
                $err['duplicate_phone'] = 'Số điện thoại đã tồn tại';
            }
            if(count($err)>0){
                return Redirect::back()->withInput()->with($err);
            } else{
                DB::beginTransaction();
                $path_dafault = "/backend/img/avatar.png";
                $dataUserCreate = [
                    'user_name'        => $request->user_name,
                    'full_name'        => $request->full_name,
                    'email'            => $request->email,
                    'avatar_img_path'  => $request->avatar_img_path,
                    'telephone'        => $request->telephone,
                    'password'         => Hash::make($request->password),
                ];
               
                if($request->avatar_img_path == null){
                    $dataUserCreate['avatar_img_path'] = $path_dafault;
                } else {
                    $dataUploadFeatureImage = $this->storageTraitUpload($request, 'avatar_img_path', 'user');
                    $dataUserCreate['avatar_img_path'] = $dataUploadFeatureImage['file_path']; 
                }
                $user = $this->user->create($dataUserCreate);
                
                $roleIds = $request->role_id;
                $user->roles()->attach($roleIds);
                DB::commit();
                if($user){
                    $request->session()->put('success_user', 'Thêm User thành công');
                    return Redirect::to('admin/users/index');
                }
            }
        } catch (\Exception $exc) {
            DB::rollBack();
            Log::error("Message: " . $exc->getMessage() . ' Line: ' . $exc->getLine());
        }
    }
    // public function getRoles($id){
    //     $roles = role_user::where('user_id',$id)->get('role_id');
    //     $roleName = Role::findOrFail($roles);
    //     $data = [];
    //     foreach($roleName as $value){
    //         $data = $value->name;
    //     }
    //     dd($data);
    //     return $data;
    // }
    public function delete($id){
        try {
            $this->user->find($id)->delete();
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
    public function details(Request $request){
        return User::findOrFail($request->id);
    }
    public function profile($id){
        $user = $this->user->find($id);
        $roles = $this->role->all();
        $rolesOfUser = $user->roles;
        return view('admin.user.profile', compact('user', 'roles', 'rolesOfUser'));
    }
    public function update_profile(Request $request, $id){
        try {
            $err = [];
            if($request->full_name == null){
                $err['fullname_null'] = 'Vui lòng nhập tên người dùng';
            }
            if($request->telephone == null){
                $err['telephone_null'] = 'Vui lòng nhập số điện thoại';
            }
            if($request->email == null){
                $err['email_null'] = 'Vui lòng nhập email';
            }
            if($request->password != $request->re_password && $request->password != null){
                $err['confirm_password_notEqual'] = 'Mật khẩu nhập lại không đúng';
            }
         
            if(count($err) > 0){
                return Redirect::back()->withInput()->with($err);
            } else{
                DB::beginTransaction();
                $dataUserCreate = [
                    'full_name'        => $request->full_name,
                    'email'            => $request->email,
                    'telephone'        => $request->telephone,
                    'password'         => Hash::make($request->password) 
                ];
                if($request->avatar_img_path != null){
                    $dataUploadFeatureImage = $this->storageTraitUpload($request, 'avatar_img_path', 'user');
                    $dataUserCreate['avatar_img_path'] = $dataUploadFeatureImage['file_path']; 
                }
                $user = $this->user->find($id)->update($dataUserCreate);

                DB::commit();
                if($user){
                    $request->session()->put('success_user', 'Cập nhật thành công');
                    return Redirect::to("admin/users/profile/".$id);
                }
            }
        } catch (\Exception $exc) {
            DB::rollBack();
            Log::error("Message: " . $exc->getMessage() . ' Line: ' . $exc->getLine());
        }
    }
    public function edit($id){
        $roles = $this->role->all();
        $user = $this->user->find($id);
        $rolesOfUser = $user->roles;
        return view('admin/user.edit', compact('user', 'roles', 'rolesOfUser'));
    }
    public function update(Request $request, $id){
        try {
            $err = [];
            if($request->full_name == null){
                $err['fullname_null'] = 'Vui lòng nhập tên người dùng';
            }
            if($request->telephone == null){
                $err['telephone_null'] = 'Vui lòng nhập số điện thoại';
            }
            if($request->email == null){
                $err['err_email'] = 'Vui lòng nhập email';
            }
            if(count($err)>0){
                return Redirect::back()->withInput()->with($err);
            } else{
                DB::beginTransaction();
                $path_dafault = "/backend/img/avatar.png";
                $dataUserCreate = [
                    'full_name'        => $request->full_name,
                    'email'            => $request->email,
                    'avatar_img_path'  => $request->avatar_img_path,
                    'telephone'        => $request->telephone,
                ];
               
                if($request->avatar_img_path == null){
                    $dataUserCreate['avatar_img_path'] = $path_dafault;
                } else {
                    $dataUploadFeatureImage = $this->storageTraitUpload($request, 'avatar_img_path', 'user');
                    $dataUserCreate['avatar_img_path'] = $dataUploadFeatureImage['file_path']; 
                }
                $this->user->find($id)->update($dataUserCreate);
                $user = $this->user->find($id);
                $roleIds = $request->role_id;
                $user->roles()->sync($roleIds);
                DB::commit();
                $request->session()->put('success_user', 'Cập nhật thành công');
                return Redirect::to('admin/users/index');
            }
        } catch (\Exception $exc) {
            DB::rollBack();
            Log::error("Message: " . $exc->getMessage() . ' Line: ' . $exc->getLine());
        }
    }
}
