<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;

class DashDataController extends Controller
{
    private $product;
    private $order;
    public function __construct(Product $product, Order $order)
    {
        $this->product = $product;
        $this->order = $order;
    }
    public function dataOrder(){
        $currentDate = Carbon::today()->toDateString();
        $orderDate = DB::table('orders')->whereDate('delivered_date',$currentDate)->get();
        $userAccount = DB::table('users')->where('utype', '=','USR')->whereNull('deleted_at')->get();
        $orderWait = DB::table('orders')->where('status','ordered')->get();
        $result_one = DB::select(DB::raw("select count(A.order_id), sum(A.price*A.quantity) as subtotal, C.name FROM `order_items` A left join products B on A.product_id = B.id left join categories C on B.category_id = C.id group by C.name order by A.price*A.quantity desc;"));
        $allArr = [];
        $chartDataOne = "";

        foreach($result_one as $item){
            $chartDataOne = "['".$item->name."',  ".$item->subtotal."],";
            array_push($allArr, $chartDataOne);
        }

        $countOrderWait = count($orderWait);
        $countUser      = count($userAccount);
        $countOrder     = count($orderDate);
        $sumPrice = 0;
        $categoryChart = Category::all();

        foreach($orderDate as $order){
            $sumPrice=$sumPrice + $order->total;  
        }

        $products = $this->product->where('status', 1)->latest()->paginate(5);
        $orders = $this->order->where('status','ordered')->latest()->paginate(5);
        $currentPage = $products->currentPage();
        $perPage = $products->perPage();
        $total = $products->total();
        return view('admin.partials.gioithieu',compact('orderDate'
        ,'sumPrice'
        ,'countOrder'
        ,'countUser'
        ,'countOrderWait'
        ,'currentDate'
        ,'categoryChart'
        , 'chartDataOne'
        ,'products'
        , 'orders'
        , 'currentPage'
        , 'perPage'
        , 'total'
        , 'allArr'
    ));

    }

}
