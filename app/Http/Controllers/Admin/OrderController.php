<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Combo;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        return view('admin.manage_order.index', compact('data', 'currentPage', 'perPage', 'total', 'allCity'));
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

    public function search(Request $request){
        $firstname = $request->get('firstname');
        $lastname = $request->get('lastname');
        $status = $request->get('status_filter');
        $sort = $request->get('sort');
        $email = $request->get('email');
        $mobile = $request->get('mobile');
        $city = $request->get('city');
        $allCity = $this->city->all();
        $data = $this->order->where('firstname', 'like', '%'.$firstname.'%')->where('lastname', 'like', '%'.$lastname.'%')->where('status', 'like', '%'.$status.'%')->where('email', 'like', '%'.$email.'%')->where('mobile', 'like', '%'.$mobile.'%')->where('city', 'like', '%'.$city.'%')->paginate(100);

        if($sort == 'ASC'){
            $data = $this->order->where('firstname', 'like', '%'.$firstname.'%')->where('lastname', 'like', '%'.$lastname.'%')->where('status', 'like', '%'.$status.'%')->where('email', 'like', '%'.$email.'%')->where('mobile', 'like', '%'.$mobile.'%')->where('city', 'like', '%'.$city.'%')->orderBy('total', 'ASC')->paginate(100);
        }
        if($sort == 'DESC'){
            $data = $this->order->where('firstname', 'like', '%'.$firstname.'%')->where('lastname', 'like', '%'.$lastname.'%')->where('status', 'like', '%'.$status.'%')->where('email', 'like', '%'.$email.'%')->where('mobile', 'like', '%'.$mobile.'%')->where('city', 'like', '%'.$city.'%')->orderBy('total', 'DESC')->paginate(100);
        }
        $currentPage = $data->currentPage();
        $perPage = $data->perPage();
        $total = $data->total();
        return view('admin/manage_order.index', compact('allCity','data', 'currentPage', 'perPage', 'total', 'lastname', 'firstname', 'status', 'sort', 'email', 'mobile', 'city' ));
    }
}
