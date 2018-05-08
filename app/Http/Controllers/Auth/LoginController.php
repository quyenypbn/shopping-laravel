<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controllerp
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = 'home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin', ['except' => ['logout']]);
    }
    public function login(){
        return view('auth.login');
    }
    public function postLogin(LoginRequest $req){
       if (Auth::guard('admin')->attempt(['email' => $req->email, 'password' => $req->password], $req->remember)) {
            // Authentication passed...
            return redirect(route('statistical'));
        }
        else{
            return back()->with(['msg','Sai tài khoản hoặc mật khẩu']);
        }
    }
}