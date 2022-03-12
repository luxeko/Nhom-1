<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ConfirmMail;
use App\Models\City;
use App\Models\Combo;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    private $order;
    private $product;
    private $city;
    private $combo;
    public function __construct(Order $order, Product $product, Combo $combo, City $city )
    {
        $this->order = $order;
        $this->product = $product;
        $this->combo = $combo;
        $this->city = $city;
    }
    public function index(Request $request){
        $data = $this->order->latest()->paginate(10);
        $currentPage = $data->currentPage();
        $perPage = $data->perPage();
        $total = $data->total();
        $allCity = $this->city->all();
        $order = $this->order->find($request->id);
        return view('admin.manage_order.index', compact('data', 'currentPage', 'perPage', 'total', 'allCity', 'order'));
    }

    public function details_order(Request $request){
        $order = $this->order->find($request->id);
        return $order;
    }
    public function get_Product(Request $request){
        $order = $this->order->find($request->id);
        $list_product_in_order = $order->getProduct;
        
        return $list_product_in_order;
    }
    public function get_Quantity(Request $request){
        $order = $this->order->find($request->id);
        $order_item = $order->orderItems;
        return $order_item;
    }
    public function get_City(Request $request){
        $order = $this->order->find($request->id);
        $order_city = $order->getCity;
        return $order_city;
    }
    public function confirm_order(Request $request){
        DB::beginTransaction();
        $this->order->find($request->id)->update([
            'status' => 'delivered',
            'delivered_date' => date("Y-m-d H:i:s")
        ]);
        $getEmail = $this->order->find($request->id)->get('email');
        Mail::to($getEmail)->send(new ConfirmMail());
        $request->session()->put('success_order', 'Xác nhận đơn hàng thành công');

        DB::commit();
    }

    public function search(Request $request){
        $firstname  = $request->get('firstname');
        $lastname   = $request->get('lastname');
        $status     = $request->get('status_filter');
        $sort       = $request->get('sort');
        $email      = $request->get('email');
        $mobile     = $request->get('mobile');
        $city       = $request->get('city');
        $allCity    = $this->city->all();


        $data = [];
        if($firstname == null &&  $lastname == null &&  $status == null && $email== null && $mobile== null && $city== null){
            $data = $this->order->latest()->paginate(10);
            if($sort == 'asc' ){
                $data = $this->order->where('firstname', 'like', '%'.$firstname.'%')->where('lastname', 'like', '%'.$lastname.'%')->where('status', 'like', '%'.$status.'%')->where('email', 'like', '%'.$email.'%')->where('mobile', 'like', '%'.$mobile.'%')->where('city', 'like', '%'.$city.'%')->orderBy('total', 'asc')->paginate(100);
            }
            if($sort == 'desc' ){
                $data = $this->order->where('firstname', 'like', '%'.$firstname.'%')->where('lastname', 'like', '%'.$lastname.'%')->where('status', 'like', '%'.$status.'%')->where('email', 'like', '%'.$email.'%')->where('mobile', 'like', '%'.$mobile.'%')->where('city', 'like', '%'.$city.'%')->orderBy('total', 'desc')->paginate(100);
            }
    
            if($sort == 'latest' ){
                $data = $this->order->where('firstname', 'like', '%'.$firstname.'%')->where('lastname', 'like', '%'.$lastname.'%')->where('status', 'like', '%'.$status.'%')->where('email', 'like', '%'.$email.'%')->where('mobile', 'like', '%'.$mobile.'%')->where('city', 'like', '%'.$city.'%')->orderBy('updated_at', 'desc')->paginate(100);
            }
    
            if($sort == 'oldest'){
                $data = $this->order->where('firstname', 'like', '%'.$firstname.'%')->where('lastname', 'like', '%'.$lastname.'%')->where('status', 'like', '%'.$status.'%')->where('email', 'like', '%'.$email.'%')->where('mobile', 'like', '%'.$mobile.'%')->where('city', 'like', '%'.$city.'%')->orderBy('updated_at', 'asc')->paginate(100);
            }
        } else {
            if($firstname != null || $city != null || $email != null || $mobile != null || $status != null || $lastname != null){
                $data = $this->order->where('firstname', 'like', '%'.$firstname.'%')->where('lastname', 'like', '%'.$lastname.'%')->where('status', 'like', '%'.$status.'%')->where('email', 'like', '%'.$email.'%')->where('mobile', 'like', '%'.$mobile.'%')->where('city', 'like', '%'.$city.'%')->paginate(100);
                if($sort == 'asc' ){
                    $data = $this->order->where('firstname', 'like', '%'.$firstname.'%')->where('lastname', 'like', '%'.$lastname.'%')->where('status', 'like', '%'.$status.'%')->where('email', 'like', '%'.$email.'%')->where('mobile', 'like', '%'.$mobile.'%')->where('city', 'like', '%'.$city.'%')->orderBy('total', 'asc')->paginate(100);
                }
                if($sort == 'desc' ){
                    $data = $this->order->where('firstname', 'like', '%'.$firstname.'%')->where('lastname', 'like', '%'.$lastname.'%')->where('status', 'like', '%'.$status.'%')->where('email', 'like', '%'.$email.'%')->where('mobile', 'like', '%'.$mobile.'%')->where('city', 'like', '%'.$city.'%')->orderBy('total', 'desc')->paginate(100);
                }
        
                if($sort == 'latest' ){
                    $data = $this->order->where('firstname', 'like', '%'.$firstname.'%')->where('lastname', 'like', '%'.$lastname.'%')->where('status', 'like', '%'.$status.'%')->where('email', 'like', '%'.$email.'%')->where('mobile', 'like', '%'.$mobile.'%')->where('city', 'like', '%'.$city.'%')->orderBy('updated_at', 'desc')->paginate(100);
                }
        
                if($sort == 'oldest'){
                    $data = $this->order->where('firstname', 'like', '%'.$firstname.'%')->where('lastname', 'like', '%'.$lastname.'%')->where('status', 'like', '%'.$status.'%')->where('email', 'like', '%'.$email.'%')->where('mobile', 'like', '%'.$mobile.'%')->where('city', 'like', '%'.$city.'%')->orderBy('updated_at', 'asc')->paginate(100);
                }
            }
        }

        $currentPage = $data->currentPage();
        $perPage = $data->perPage();
        $total = $data->total();
        return view('admin/manage_order.index', compact('allCity','data', 'currentPage', 'perPage', 'total', 'lastname', 'firstname', 'status', 'sort', 'email', 'mobile', 'city' ));
    }
}
