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
    public function getlogin(){
        return view('admin.admin_login');
    }
    public function goLogin(){
        return redirect()->route('goLogin');
    }
    public function postlogin(Request $request){
        $result = ['email'=>$request->admin_email, 
                    'password'=> $request->admin_password
        ];
        $checkAdmin = User::where('email', $request->admin_email)->get('utype');
        $getUtype = '';
        foreach($checkAdmin as $value){
            // dd($value->utype);
            $getUtype = $value->utype;
        }
        if($getUtype == 'USR'){
            $request->session()->put('not_admin','Tài khoản của bạn không được phép truy cập');
            return redirect()->route('goLogin');
        }
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
        if($request->admin_password == null){
            $request->session()->put('password_null','Mật khẩu không được để trống');
           
        } 
        if(Auth::attempt($result, $remember)){          
            $request->session()->put('check_login', 'Đăng nhập thành công');
            return redirect()->route('admin.index');
        } else {
            return back()->withInput()->with('login_faild','Tài khoản hoặc mật khẩu chưa đúng');
        }
        
    }
}
