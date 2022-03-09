<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CustomerController extends Controller
{
    private $user;
    private $city;
    public function __construct(User $user, City $city){
        $this->user = $user;
        $this->city = $city;
    }
    public function index(){
        $users = $this->user->where('utype','USR')->latest()->paginate(10);
        $currentPage = $users->currentPage();
        $perPage = $users->perPage();
        $total = $users->total();
        $allCity = $this->city->all();
        return view('admin.customer.index', compact('users', 'currentPage', 'perPage', 'total', 'allCity'));
    }
    public function search(Request $request){
        $full_name = $request->get('full_name');
        $email = $request->get('email');
        $telephone = $request->get('telephone');
        $address = $request->get('address');
        $city_id = $request->get('city_id');
        $allCity = $this->city->all();
        
        $users = $this->user->where('full_name', 'like', '%'.$full_name.'%')->where('email', 'like', '%'.$email.'%')->where('telephone', 'like', '%'.$telephone.'%')->where('utype', 'like', '%'.'USR'.'%')->paginate(100);
        if($address != null || $city_id != null){
            $users = $this->user->where('full_name', 'like', '%'.$full_name.'%')->where('email', 'like', '%'.$email.'%')->where('telephone', 'like', '%'.$telephone.'%')->where('utype', 'like', '%'.'USR'.'%')->where('address', 'like', '%'.$address.'%')->where('city_id', 'like', '%'.$city_id.'%')->paginate(100);
        }
    
        $currentPage = $users->currentPage();
        $perPage = $users->perPage();
        $total = $users->total();
        return view('admin/customer.index', compact('users', 'currentPage', 'perPage', 'total', 'full_name', 'email', 'telephone', 'address', 'city_id', 'allCity'));
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
}
