<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Bill;
use App\BillDetail;
use App\Customer;
use App\Product;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendOrder;

class OrderController extends Controller
{



   public function update($id){

           $bill = Bill::find($id);
           $bills=   DB::table('bills')
                     ->join('customer',  'bills.id_customer', '=','customer.id')
                     ->select('bills.total', 'customer.name','customer.email as email','customer.address','customer.phone_number as phone','bills.created_at as created')->where('bills.id','=',$id)->get();
          $email ='';
           foreach ($bills as $key) {
            
                 $email =  $key->email;
           }
             $billdetail = BillDetail::where('id_bill','=',$bill->id)->get();
             
             if($bill)
                 {
                    $bill->status = 1;
                     
                    if($bill->save())
                    {

                        if($billdetail)
                        {

                            foreach ($billdetail as $key ) {
                                
                                $product = Product::find( $key->id_product);

                                $product->quantity =  $product->quantity-$key->quantity;
                                if( $product->quantity<0)
                                {
                                     $product->quantity = 0;
                                }

                                 $product->save();
                            }
                            Mail::to($email )->queue(new SendOrder($bills,$billdetail));
                        return redirect()->back();
                        }
                        
                    }
                 }


    }

    public function delete($id){

       $bill = Bill::find($id);

             if($bill)
                 {
                    $bill->status = 2;

                    if($bill->save())
                    {
                        return redirect()->back();
                    }
                 }

    }
    public function index(Request $request){
        $pageSize = $request->pagesize == null ? 10 : $request->pagesize;
        $fullUrl = $request->fullUrl();
        $keyword = $request->keyword;
        $addPath = "";
    	if(!$keyword){
             $orders  = DB::table('bills')
                     ->join('customer',  'bills.id_customer', '=','customer.id')
                     ->select('bills.id as bill','bills.status as status','bills.total', 'customer.name','customer.gender','customer.email','customer.address','customer.phone_number','customer.created_at')
                     ->paginate($pageSize);
           // $orders = Bill::paginate($pageSize);
           $addPath .= "?pagesize=$pageSize";
        }else{
            $orders  = DB::table('bills')
                   
                    ->join('customer',  'bills.id_customer', '=','customer.id')
                    ->select('bills.id as bill','bills.status as status', 'customer.name','customer.gender','customer.email','customer.address','customer.phone_number','customer.created_at')
                     // ->where('email', 'like', "%$keyword%")
                     ->paginate($pageSize);
            // $orders = Bill::where('id', 'like', "%$keyword%")->paginate($pageSize);
            $addPath .= "?keyword=$keyword&pagesize=$pageSize";
            
        }
        // dd($orders);
        $orders->withPath($addPath);
        return view('admin.order.index', compact('orders', 'keyword', 'fullUrl', 'pageSize'));
    }
    public function detail($id){
         $model = Bill::find($id);
         // dd($model);
         if(!$model) return view('admin.404');
         $detail  = DB::table('bill_detail')
                     ->join('bills', 'bill_detail.id_bill', '=', 'bills.id')
                     ->join('products', 'products.id', '=', 'bill_detail.id_product')
                     ->where('bill_detail.id_bill','=',$id)
                     ->select( 'products.image', 'products.name','bill_detail.unit_price','bill_detail.quantity')
                     ->get();
              // dd($detail);
        return view('admin.order.detail', compact('model', 'detail'));
    }
}