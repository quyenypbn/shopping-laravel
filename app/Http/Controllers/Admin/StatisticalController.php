<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Bill;
use App\ProductType;
use App\User;
use DB;
use Maatwebsite\Excel\Facades\Excel;
// thống kê 
class StatisticalController extends Controller
{
	public function index(){
		$stas_user= DB::table('users')->count();
		$stas_product= DB::table('products')->count();
		$stas_type_product= DB::table('type_products')->count();
		$stas_bill= DB::table('bills')->count();

		return view('admin.dashboard.index', compact('stas_user','stas_product','stas_type_product','stas_bill'));
	}
    
    public function xuatexcel(Request $request)
    {
    	date_default_timezone_set('Asia/Ho_Chi_Minh'); 

		$start=date('Y/m/d H:i:s', strtotime($request->start));
        $end = date('Y/m/d H:i:s', strtotime($request->end));
		if($request->type==1)
		{
          $bills= DB::table('bills')
                     ->join('customer',  'bills.id_customer', '=','customer.id')
                     ->select('bills.id as bill','bills.total', 'customer.name as namecus','customer.email as email','bills.created_at as created_at')->whereBetween('bills.created_at',[$start,$end])->where('status','=',1)->get();
		$bills = json_decode( json_encode($bills), true);
                      Excel::create('hoa don', function($excel) use($bills) {
    $excel->sheet('Sheet 1', function($sheet) use($bills) {
        $sheet->fromArray( $bills);
    });
})->export('xls');
           

		}
    }
	public function tk(Request $request)
	{ 
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$bd= $request->start;
    	$kt = $request->end;
		$start=date('Y/m/d H:i:s', strtotime($request->start));
        $end = date('Y/m/d H:i:s', strtotime($request->end));
		if($request->type==1)
		{
          $bills= DB::table('bills')
                     ->join('customer',  'bills.id_customer', '=','customer.id')
                     ->select('bills.id as bill','bills.total', 'customer.name as namecus','customer.email as email','bills.created_at as created_at')->whereBetween('bills.created_at',[$start,$end])->where('status','=',1)->get();
           return view('admin.dashboard.vieworder',compact('bills','bd','kt'));

		}elseif($request->type==2){
             $type= 2;
           $products = Product::whereBetween('Created_at',[$start,$end])->get();
           return view('admin.dashboard.view',compact('products','type'));
		}else{
			$type= 3;
			 $products = Product::whereBetween('Created_at',[$start,$end])->where('quantity','=',0)->get();
           return view('admin.dashboard.view',compact('products','type'));
		}
	}
}
