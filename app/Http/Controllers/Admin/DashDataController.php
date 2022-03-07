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
        $userAccount = DB::table('users')->where('utype','USR')->get();
        $orderWait = DB::table('orders')->where('status','ordered')->get();
        $result_one = DB::select('Select count(category_id) from products inner join order_items on products.id = order_items.product_id where category_id = 1');
        $result_two = DB::select("Select count(category_id) from products inner join order_items on products.id = order_items.product_id where category_id = 2");
        $result_three = DB::select(DB::raw("Select count(category_id) from products inner join order_items on products.id = order_items.product_id where category_id = 3"));
        $result_four = DB::select(DB::raw("Select count(category_id) from products inner join order_items on products.id = order_items.product_id where category_id = 4"));
        $result_five = DB::select(DB::raw("Select count(category_id) from products inner join order_items on products.id = order_items.product_id where category_id = 5"));
        $result_six = DB::select(DB::raw("Select count(category_id) from products inner join order_items on products.id = order_items.product_id where category_id = 6"));
        $result_seven = DB::select(DB::raw("Select count(category_id) from products inner join order_items on products.id = order_items.product_id where category_id = 7"));
        // $chartDataOne = ;
   
        $countOrderWait = count($orderWait);
        $countUser      = count($userAccount);
        $countOrder     = count($orderDate);
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
        , 'result_one'
        , 'result_two'
        , 'result_three'
        , 'result_four'
        , 'result_five'
        , 'result_six'
        , 'result_seven' ));
    }
    public function chartCategory(){
        // $count = 0;
        // $userAccount = Category::all();
        // return

    }
}
