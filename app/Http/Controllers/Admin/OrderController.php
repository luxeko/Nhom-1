<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Combo;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    private $order;
    private $product;
    private $combo;
    public function __construct(Order $order, Product $product, Combo $combo )
    {
        $this->order = $order;
        $this->product = $product;
        $this->combo = $combo;
    }
    public function index(Request $request){
        $data = $this->order->latest()->paginate(10);
        $currentPage = $data->currentPage();
        $perPage = $data->perPage();
        $total = $data->total();
        return view('admin.manage_order.index', compact('data', 'currentPage', 'perPage', 'total'));
    }
    public function edit(){}
    public function update(){}

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
    public function searchOrder(){}
}
