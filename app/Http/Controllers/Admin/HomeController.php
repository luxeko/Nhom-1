<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    public function showDashboard(){
        return view('admin.partials.gioithieu');
    }
    public function getLogout(){
        Auth::logout();
        return redirect()->route('goLogin');
    }
}
