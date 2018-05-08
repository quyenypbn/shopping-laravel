<?php
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/',[
	'as'=> "home",
	'uses' => 'PageController@getHome'
]);

Route::get('khuyenmai',[
	'as'=> "khuyenmai",
	'uses' => 'PageController@getKhuyenMai'
]);

Route::get('loai-san-pham/{type}',[
	'as'=>"loai-san-pham",
	'uses'=>'PageController@getLoaiSp'
]);

Route::get('phu-kien',[
	'as'=> "phu-kien",
	'uses' => 'PageController@getphuKien'
]);

Route::get('lien-he',[
	'as'=> "lien-he",
	'uses' => 'PageController@getLienHe'
]);

Route::get('chi-tiet-san-pham/{id}',[
	'as' => 'chi-tiet-san-pham',
	'uses' => 'PageController@getchitietSp'
]);

Route::get('new-detail',[
	'as' => 'new-detail',
	'uses' => 'PageController@getnewDetail'
]);
Route::get('xem-gio-hang','PageController@viewCart')->name('viewcart');
Route::get('them-san-pham/{id}/{qty}','PageController@getAddtoCart')->name('addcart');
Route::post('update','PageController@updateCart')->name('updatecart');
Route::get('xoa-san-pham/{rowId}','PageController@deletecart')->name('deletecart');
Route::get('delete-cart/{rowid}',[
	'as' => 'xoagiohang',
	'uses' => 'PageController@getDeleteCart'
]);


// tim kiem
Route::get('search',[
	'as'=>'search',
	'uses' => 'PageController@getSearch'
]);

//tk 


Route::get('test', function() {
    //
});

// đặt hàng
Route::get('xac-nhan-dat-hang',[
	'as' =>'dat-hang-view',
	'uses' =>'PageController@getDathang'
]);
Route::get('dat-hang',[
	'as' =>'dat-hang',
	'uses' =>'PageController@postDathang'
]);
Route::post('dat-hang',[
	'as' => 'dat-hang',
	'uses' => 'PageController@postCheckout'
]);

//sing up
Route::get('singUp',[
	'as' => 'singUp',
	'uses'=>'PageController@getSingUp'
]);
Route::post('singUp',[
	'as' => 'singUp',
	'uses'=>'PageController@postSingUp'
]);

// login
Route::get('pagelogin',[
	'as' =>'pagelogin',
	'uses' => 'PageController@getlogIn'
]);
Route::post('pagelogin',[
	'as' =>'pagelogin',
	'uses' => 'PageController@postlogIn'
]);

// dang xuat
Route::get('dang-xuat',[
	'as' =>'pagelogout',
	'uses' => 'PageController@postLogout'
]);

// ================================================= admin
Route::group(['middleware'=>'admin'],function(){


Route::get('admin','Admin\StatisticalController@index')->name('statistical'); // thống kê
Route::post('admin/statistical','Admin\StatisticalController@tk')->name('st');

Route::post('admin/xuatexcel','Admin\StatisticalController@xuatexcel')->name('xuatexcel');

Route::get('admin/cate','Admin\CategoryController@index')->name('cate.index');
Route::post('admin/cate/check-name','Admin\CategoryController@checkName')->name('cate.checkName');
Route::get('admin/cate/add','Admin\CategoryController@add')->name('cate.add');
Route::post('admin/cate/save','Admin\CategoryController@save')->name('cate.save');
Route::get('admin/cate/update/{id}','Admin\CategoryController@edit')->name('cate.edit');
Route::get('admin/cate/remove/{id}','Admin\CategoryController@remove')->name('cate.remove');


Route::get('admin/type_cate','Admin\TypeCategoryController@index')->name('type_cate.index');
Route::post('admin/type_cate/check-name','Admin\TypeCategoryController@checkName')->name('type_cate.checkName');
Route::get('admin/type_cate/add','Admin\TypeCategoryController@add')->name('type_cate.add');
Route::post('admin/type_cate/save','Admin\TypeCategoryController@save')->name('type_cate.save');
Route::get('admin/type_cate/update/{id}','Admin\TypeCategoryController@edit')->name('type_cate.edit');
Route::get('admin/type_cate/remove/{id}','Admin\TypeCategoryController@remove')->name('type_cate.remove');

Route::get('admin/news','Admin\NewsController@index')->name('news.index');
Route::post('admin/news/check-title','Admin\NewsController@checkTitle')->name('news.checkTitle');
Route::get('admin/news/add','Admin\NewsController@add')->name('news.add');
Route::post('admin/news/save','Admin\NewsController@save')->name('news.save');
Route::get('admin/news/update/{id}','Admin\NewsController@edit')->name('news.edit');
Route::get('admin/news/remove/{id}','Admin\NewsController@remove')->name('news.remove');

Route::get('admin/order','Admin\OrderController@index')->name('order.index');
Route::get('admin/order/detail/{id}','Admin\OrderController@detail')->name('order.detail');

Route::get('admin/user','Admin\UserController@index')->name('user.index');
Route::get('admin/user/remove/{id}','Admin\UserController@remove')->name('user.remove');

Route::get('xac-nhan-don-hang/{id}','Admin\OrderController@update')->name('xacnhan');
Route::get('huy-don-hang/{id}','Admin\OrderController@delete')->name('huydonhang');
//============================================================== Auth

// Route::get('admin_login', 'Admin\adminController@login')->name('login');
// Route::post('admin_login', 'Admin\adminController@postLogin');
});
Route::get('admin_login', 'Auth\LoginController@login')->name('login');
Route::post('admin_login', 'Auth\LoginController@postLogin');
Route::any('logout', function(){
	Auth::logout();
	return redirect(route('login'));
})->name('logout');
// Auth::routes();

// gửi mail
use Illuminate\Support\Facades\Mail; // thư viện gửi mail
Route::get('send-mail', function() {
    $username = 'quyen';
	Mail::send('mail.send-mail', compact('username'), function ($message) {
	    $message->to('nguyenthiquyen.conan@gmail.com', 'Quyên 1'); // to: gửi dến người nào 
	   	// $message->cc('nguyenthiquyen.conan@gmail.com', 'Quyên 2'); // cc: gửi kèm đến ai
	    // $message->replyTo('nguyenthiquyen.conan@gmail.com', 'Quyên 3'); // người sẽ nhận trả lời của mình
	    $message->subject('test email');
	});
	return 'done!';
});


Route::post('forget-pwd-email','Auth\ForgotPasswordController@forget_pwd_email')->name('forget-pwd.email');

Route::get('reset-pwd/{token}','Auth\ResetPasswordController@reset_pwd');
Route::post('auth-reset-password','Auth\ResetPasswordController@auth_reset_password')->name('auth.reset-pwd');