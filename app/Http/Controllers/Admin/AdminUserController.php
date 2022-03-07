<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\City;
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
    private $city;
    use StorageImageTrait;
    public function __construct(User $user, Role $role, City $city){
        $this->user = $user;
        $this->role = $role;
        $this->city = $city ;
    
    }

    public function index(){
        $users = $this->user->where('utype','ADM')->latest()->paginate(10);
        $currentPage = $users->currentPage();
        $perPage = $users->perPage();
        $total = $users->total();
        $allCity = $this->city->all();
        return view('admin.user.index', compact('users', 'currentPage', 'perPage', 'total', 'allCity'));
    }
    public function create(){
        $roles = $this->role->all();
        $cities = City::all();
        return view('admin.user.add', compact('roles', 'cities'));
    }

    public function store(Request $request){
        try {
            $err = [];

            $getEmail = $this->user->where('email', $request->email)->exists();
            $getPhone = $this->user->where('telephone', $request->telephone)->exists();
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

            if($getPhone == true){
                $err['duplicate_phone'] = 'Số điện thoại đã tồn tại';
            } 
            if($getEmail == true){
                $err['duplicate_email'] = 'Email đã tồn tại';
            }
            // if($getPhone){
            //     $err['duplicate_phone'] = 'Số điện thoại đã tồn tại';
            // }
            if(count($err) > 0){
                return Redirect::back()->withInput()->with($err);
            } else{
                DB::beginTransaction();
                $path_dafault = "/backend/img/avatar.png";
                $dataUserCreate = [
                    'full_name'        => $request->full_name,
                    'email'            => $request->email,
                    'avatar_img_path'  => $request->avatar_img_path,
                    'telephone'        => $request->telephone,
                    'password'         => Hash::make($request->password),

                    'utype'            => 'ADM',
                    'address'          => $request->address,
                    'city_id'          => $request->city_id,
                ];
                // dd( $dataUserCreate);
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
        // dd($user);
        $cities = $this->city->all();
        // dd($city);
        return view('admin.user.profile', compact('user','cities'));

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
            if(count($err) > 0){
                return Redirect::back()->withInput()->with($err);
            } else{
                DB::beginTransaction();
                $dataUserCreate = [];
                if($request->password){
                    $dataUserCreate = [
                        'full_name'        => $request->full_name,
                        'telephone'        => $request->telephone,
                        'password'         => bcrypt($request->password),
                        'utype'            => 'ADM',      
                        'address'          => $request->address,
                        'city_id'          => $request->city_id
                    ];
                }
                else{
                    $dataUserCreate = [
                        'full_name'        => $request->full_name,
                        'telephone'        => $request->telephone,
                        'utype'            => 'ADM',
                        'address'          => $request->address,
                        'city_id'          => $request->city_id
                    ];

                }
                // dd($dataUserCreate);
                if($request->avatar_img_path != null){
                    $dataUploadFeatureImage = $this->storageTraitUpload($request, 'avatar_img_path', 'user');
                    $dataUserCreate['avatar_img_path'] = $dataUploadFeatureImage['file_path']; 
                }
                $this->user->find($id)->update($dataUserCreate);

                DB::commit();
                
                $request->session()->put('success_user', 'Cập nhật thành công');
                return redirect()->route('admin.profile', $id);
              
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
        $cities = City::all();
        return view('admin/user.edit', compact('user', 'roles', 'rolesOfUser', 'cities'));
    }
    public function update(Request $request, $id){
        try {
            $err = [];
            $getCurrentPhone = $this->user->where('id', $id)->firstOrFail()->telephone;
            $getPhone = $this->user->where('telephone', $request->telephone)->exists();
            // dd($getPhone);
            if($request->full_name == null){
                $err['fullname_null'] = 'Vui lòng nhập tên người dùng';
            }
            if(trim($request->telephone) == null){
                $err['telephone_null'] = 'Vui lòng nhập số điện thoại';
            }
            if($request->telephone != $getCurrentPhone){
                if($getPhone == true){
                    $err['duplicate_phone'] = 'Số điện thoại đã tồn tại';
                } 
            }
            if(count($err) > 0){
                return Redirect::back()->withInput()->with($err);
            } else {
                DB::beginTransaction();
                $dataUserCreate = [
                    'full_name'        => $request->full_name,
                    'telephone'        => $request->telephone,
                    'utype'            => 'ADM',
                    'address'          => $request->address,
                    'city_id'          => $request->city_id

                ];
               
                if($request->avatar_img_path != null){
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

    public function search(Request $request){
        $full_name = $request->get('full_name');
        $email = $request->get('email');
        $telephone = $request->get('telephone');
        $address = $request->get('address');
        $city_id = $request->get('city_id');
        $allCity = $this->city->all();
        $users = $this->user->where('full_name', 'like', '%'.$full_name.'%')->where('email', 'like', '%'.$email.'%')->where('telephone', 'like', '%'.$telephone.'%')->where('utype', 'like', '%'.'ADM'.'%')->paginate(100);
        if($address != null || $city_id != null){
            $users = $this->user->where('full_name', 'like', '%'.$full_name.'%')->where('email', 'like', '%'.$email.'%')->where('telephone', 'like', '%'.$telephone.'%')->where('utype', 'like', '%'.'ADM'.'%')->where('address', 'like', '%'.$address.'%')->where('city_id', 'like', '%'.$city_id.'%')->paginate(100);
        }
    
        $currentPage = $users->currentPage();
        $perPage = $users->perPage();
        $total = $users->total();
        return view('admin/user.index', compact('users', 'currentPage', 'perPage', 'total', 'full_name', 'email', 'telephone', 'address', 'city_id', 'allCity'));
    }
}
