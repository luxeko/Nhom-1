<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DiscountAddRequest;
use App\Models\discount;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class DiscountController extends Controller
{
    private $discount;
    public function __construct(discount $discount)
    {
        $this->discount = $discount;
    }
    public function index(){
        $all_discount = $this->discount->latest()->paginate(5);
        $currentPage = $all_discount->currentPage();
        $perPage = $all_discount->perPage();
        $total = $all_discount->total();
        return view('Admin.manage_discount.index', compact('all_discount', 'currentPage', 'perPage', 'total'));
    }
    public function create(){
        return view('admin/manage_discount.add');
    }
    
    public function store(DiscountAddRequest $request){
        try {
            DB::beginTransaction();
            $err = [];
            $created_date = Carbon::now();
            $date_end = Carbon::parse($request->date_end);
            $result = $created_date->diffInDays($date_end, false);
            if($result <= 0 ){
                $err['date_err'] = 'Ngày kết thúc phải sau ngày tạo';
            }
            if(count($err) > 0) {
                return Redirect::back()->with($err);
            } else{
                $dataDiscountCreate = [
                    'name'              => $request->discount_name,
                    'desc'              => $request->discount_desc,
                    'discount_percent'  => $request->discount_percent,
                    'status'            => $request->status,
                    'date_end'          => $request->date_end
                ];
                $discountCreate = $this->discount->create($dataDiscountCreate);
                DB::commit();
                if($discountCreate){
                    $request->session()->put('success_discount', 'Thêm sản phẩm thành công');
                    return Redirect::to('admin/discounts/index');
                }
            }
           
        } catch (\Exception $exc) {
            DB::rollBack();
            Log::error("Message: " . $exc->getMessage() . ' Line: ' . $exc->getLine());
        }
    }
    public function eidt($id){

    }
    public function update(DiscountAddRequest $request, $id){
        try {
            

        } catch (\Exception $exc) {
            //throw $th;
        }
    }
    public function delete($id){
        try {
            $this->discount->find($id)->delete();
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
