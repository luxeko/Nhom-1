<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    private $user;
    private $role;
    public function __construct(User $user, Role $role){
        $this->user = $user;
        $this->role = $role;
    }
    public function getlogin(){
        return view('admin.admin_login');
    }
    public function goLogin(){
        return redirect()->intended('admin/login');
    }
    public function postlogin(Request $request){
        $result = ['email'=>$request->admin_email, 
                    'password'=> $request->admin_password
        ];
        if($request->remember = 'Remember me'){
            $remember = true;
        } else {
            $remember = false;
        }
        if($request->admin_email == null){
            $request->session()->put('username_null','Tài khoản không được để trống');
        }
        if($request->admin_password == null){
            $request->session()->put('password_null','Mật khẩu không được để trống');
        } 
        if(Auth::attempt($result, $remember)){          
            $request->session()->put('check_login', 'Đăng nhập thành công');
            return redirect()->route('admin.home');
        } else {
            return back()->withInput()->with('login_faild','Tài khoản hoặc mật khẩu chưa đúng');
        }
        
    }
}
