<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\passwordReset;
use Carbon\Carbon;
use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function reset_pwd($token)
    {
            //check token co hop le k
        $pwdReset = passwordReset::where('token', $token)->first();
        $thatDay = Carbon::createFromFormat('Y-m-d H:i:s', $pwdReset->created_at);
        $now = Carbon::now();
        $dif = $now->diffInHours($thatDay);
        if($dif > 24){
            DB::table('password_resets')->where('token',$token)->delete();
            return "error! invalid token";
        }
        return view('auth.reset-pwd', compact('token'));
    }
    public function auth_reset_password(Request $request){
        $pwdReset = PasswordReset::where('token', $request->token)->first();
        if(!$pwdReset){
            return "error! invalid token";
        }
        $thatDay = Carbon::createFromFormat('Y-m-d H:i:s', $pwdReset->created_at);
        $now = Carbon::now();
        $dif = $now->diffInHours($thatDay);
        if($dif > 24){
            DB::table('password_resets')->where('token', $token)->delete();
            return "error! invalid token";
        }
        $admin = Admin::where('email', $pwdReset->email)->first();
        $admin->password = Hash::make($request->password);
        $admin->save();
        return "Done!";
    }
}
