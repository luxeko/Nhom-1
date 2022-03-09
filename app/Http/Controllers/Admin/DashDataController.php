<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Category;



class DashDataController extends Controller
{
    public function dataOrder(){
        $currentDate = Carbon::today()->toDateString();
        $orderDate = DB::table('orders')->whereDate('created_at',$currentDate)->get();
        $userAccount = DB::table('users')->where("utype","=","USR")->orWhere("deleted_at","=","null")->get();
        $orderWait = DB::table('orders')->where('status','ordered')->get();
        $result_one = DB::select(DB::raw("select count(A.order_id), sum(A.price*A.quantity) as subtotal, C.name FROM `order_items` A left join products B on A.product_id = B.id left join categories C on B.category_id = C.id group by C.name order by A.price*A.quantity desc;"));
        $chartDataOne = "";
        foreach($result_one as $item){
            $chartDataOne = "['".$item->name."',  ".$item->subtotal."],";
        }
        $countOrderWait = count($orderWait);
        $countUser = count($userAccount);
        $countOrder=count($orderDate);
        $sumPrice = 0;
        $categoryChart = Category::all();
        foreach($orderDate as $order){
                $sumPrice=$sumPrice + $order->total;  
        }
        return view('admin.partials.gioithieu',compact('orderDate'
        ,'sumPrice'
        ,'countOrder'
        ,'countUser'
        ,'countOrderWait'
        ,'currentDate'
        ,'categoryChart'
        , 'chartDataOne'
    ));
    }
}
