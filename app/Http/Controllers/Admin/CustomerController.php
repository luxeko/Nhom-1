<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CustomerController extends Controller
{
    private $user;
    private $order;
    private $city;
    private $order_items;
    public function __construct(User $user, City $city, Order $order, OrderItem $order_items){
        $this->user = $user;
        $this->city = $city;
        $this->order = $order;
        $this->order_items = $order_items;
    }
    public function index(){
        $users = $this->user->oldest()->paginate(5);
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
    public function detail_customer(Request $request){
        $id = $request->id;
        $order = $this->order->where('user_id',$id)->latest()->get()->all();
        $test = [];
        $stt = 0;
        foreach ($order as $value) {
            $test[$stt] = $value->orderItems;
            $stt++;
        }
        return $test;
    }
    public function getProductInOrder(Request $request){
        $id = $request->id;
        $order = $this->order->where('user_id',$id)->latest()->get()->all();
        $test = [];
        $stt = 0;
        foreach ($order as $value) {
            foreach($value->orderItems as $value2){
                // $getProduct = $value->product;
                $test[$stt] = $value2->product;
                $stt++;
            }
        }
        return $test;
    }
    public function getOrder(Request $request){
        $id = $request->id;
        $order = $this->order->where('user_id',$id)->latest()->get()->all();
        return $order;
    }
}
