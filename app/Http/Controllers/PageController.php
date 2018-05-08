<?php

namespace App\Http\Controllers;

use App\Slide;
use App\Product;
use App\ProductType;
use Cart;
use App\Customer;
use App\Bill;
use App\BillDetail;
use App\Admin;
use App\User;
use App\News;

use Auth;
use Hash;
use Session;


use Illuminate\Http\Request;
use App\Http\Requests\CheckoutRequest;
class PageController extends Controller
{

    public function getHome(){
        $slide =Slide::all();
        // print_r($slide);
        // exit;
        // return view('page.trangchu',['slide'=>$slide]);
        $cung_loai = Product::where('unit','áo')->get();
        $new_product = Product::where('new',1)->paginate(4); // san pham moi
        $sp_khuyenmai = Product::where('promotion_price','<>',0)->paginate(8);
        $loai = ProductType::all();
       // $product_cart =Cart::all();        // dd($new_product);
        
    	return view('page.trangchu',compact('slide','cung_loai','new_product','sp_khuyenmai','loai'));
    }
    public function getKhuyenMai()
    {
        $sp_khuyenmai = Product::where('promotion_price','<>',0)->paginate(40);
        $loai = ProductType::all();
        return view('page.khuyenmai',compact('loai','sp_khuyenmai'));
    }

    public function getLoaiSp($type){
        // $sp_all = Product::all();
        $sp_theoloai = Product::where('id_type', $type)->get();
        $sp_khac = Product::where('id_type','<>',$type)->paginate(4);
        $loai = ProductType::all();
        $loai_sp = ProductType::where('id',$type)->first();
    	return view('page.loai_sanpham',compact('sp_theoloai','sp_khac','loai', 'loai_sp'));
    }

    public function getphuKien(){
         $all_sanpham = Product::all();
         $loai = ProductType::all();
     	return view('page.phu_kien', compact('loai','all_sanpham'));
    }
    public function getLienHe(){
        return view('page.lienHe');
    }

    public function getchitietSp(Request $req){
        $sanpham = Product::where('id', $req->id)->first();
         $loai = ProductType::all();
         $sp_tuongtu = Product::where('id_type', $sanpham->id_type)->get();
    	return view('page.detail', compact('loai','sanpham', 'sp_tuongtu'));
    }

    public function getnewDetail(){
      
        $loai = ProductType::all();
        $sp_khuyenmai = Product::where('promotion_price','<>',0)->paginate(8);
        $news = News::all();
    	return view('page.new-detail', compact('news','loai','sp_khuyenmai'));
    }
     

    public function updateCart($rowId,$qty)
    {
         Cart::update($rowId,$qty);
        return redirect()->back();
    }
    public function getAddtoCart($id,$qty){
              
            if($qty==0){

                $qty=1;
            }


     $carts= Cart::content();
     $countcart=0;
     foreach ($carts as  $value) {
         if($value->id ==$id)
         {
             $countcart+=$value->qty;
         }
     }
             $product = Product::find($id);
      if($product->quantity -( $qty + $countcart )<0){
            return redirect()->back()->with('msg_cart','Không đủ số lượng');

      }else{


        
         $promo =  $product->promotion_price;
         $price =  $product->unit_price;
         if($promo!=0)
         {
            $price =  $promo;
         }
          Cart::add(['id' =>$id, 'name' =>  $product->name, 'qty' =>$qty , 'price' => $price ,'options' => ['img' =>  $product->image]]);   
       
        return redirect()->back()->with('msg_cart','Sản phẩm '.$product->name.' đã được thêm vào giỏ hàng');  
        }          
    }
    // xoa cart
    public function deletecart($rowId){

       Cart::remove($rowId);
         return redirect()->back()->with('msg_cart','Sản phẩm đã được xóa khỏi giỏ hàng'); 
    }
//search
    public function getSearch(Request $req){
        $loai = ProductType::all();
        $product = Product::where('name','like','%'.$req->key.'%')
                            ->orWhere('unit_price',$req->key)
                            ->get();
        return view('page.search', compact('loai','product'));
    }

 // login
    public function getlogIn(){
        return view('page.login');
    }   

// đặt hàng
    public function getDathang(){
        // $user = User::all();
        return view('page.dat-hang');
    }

    public function postDathang(Request $req){
        // $this->validate($req,['email'=>'required|email']);
        // $data= array(
        //     'email'=>$req->email,
        //     ''
        // )
    }

public function viewCart()
{
    $carts = Cart::content();
    $cart_total = Cart::total();
    return view('page.gio_hang',compact('carts','cart_total'));
    
}
// form thong tin dat hang
    public function postCheckout(CheckoutRequest $req){
     $cart = Cart::content();

        $customer = new Customer;
        $customer->name = $req->name;
        $customer->gender =$req->gender;
        $customer->email = $req->email;
        $customer->address =$req->address;
        $customer->phone_number =$req->phone;
        $customer->note = $req->message;
        $customer->save();

        $bill= new Bill;
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = str_replace('.','',Cart::total());
        $bill->payment = $req->payment;
        $bill->note = $req->message;
        $bill->save();
        
        foreach ($cart as $value) {
            $bill_detail = new BillDetail;
            $bill_detail ->id_bill = $bill->id;
            $bill_detail ->id_product = $value->id;
            $bill_detail->quantity = $value->qty;
            $bill_detail->unit_price =$value->price;
            $bill_detail->save();
        }
        Cart::destroy();
        return redirect()->back()->with('thongbao','Đặt hàng thành công');
    }
    // sing up
    public function getSingUp(){
        return view('page.singUp');
    }
    // dang ky tai khoan nguoi dung
    public function postSingUp(Request $req){
         $this->validate($req,
            [
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6|max:20',
                'name' =>'required',
                're_password' =>'required|same:password'
            ],
            [
                'email.required' => 'Vui lòng nhập email',
                'email.email' =>'Không đúng định dạng email',
                'email.unique' => 'Email đã có người sử dụng',
                'password.required' => 'Vui lòng nhập mật khẩu',
                're_password.same' => 'Mật khẩu không giống nhau',
                'password.min' => 'Mật khẩu ít nhất 6 ký tự',
                'password.max' => 'Mật khẩu nhiều nhất 20 ký tự' 
            ]);
        $user = new User();
        $user->full_name = $req->name;
        $user->email = $req->email;
        $user->password =  Hash::make($req->password); // ma hoa passs
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->save();
        return redirect()->back()->with('thanhcong','Đã tạo tài khoản thành công!');
    }
    public function postlogIn(Request $req){
        $this->validate($req,
            [
                'email' =>'required|email',
                'password'=>'required|min:6|max:20'
            ],
            [
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Email không đúng định dạng',
                'password.required' => 'vui lòng nhập password',
                'password.min' =>'Mật khẩu ít nhất 6 ký tự',
                'password.max' => 'Mật khẩu không quá 20 ký tự'
            ]
        );
        $credentials = array('email' => $req->email, 'password'=> $req->password); // chứng thực người dùng
        if(Auth::attempt($credentials)){
        // if (Auth::guard('Admin')->attempt($credentials)) {
            // return redirect()->back()->with(['flag'=>'success', 'message'=>'Đăng nhập thành công']);
             return redirect()->route('home');
        }
        else{
             return redirect()->back()->with(['flag'=>'danger', 'message'=>'Đăng nhập không thành công']);
        }
    }
    public function postLogout(){
        Auth::logout();
        return redirect()->route('home');
    }


}
