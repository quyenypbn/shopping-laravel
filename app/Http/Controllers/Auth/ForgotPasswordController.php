<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Carbon\Carbon;
use App\Admin;
use Illuminate\Http\Request;
use App\passwordReset;
use Illuminate\Support\Facades\Mail; // thư viện gửi mail

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
     public function forget_pwd_email(Request $req){
        $email = $req->email;
        $admin = Admin::where('email', $email)->first();
        if(!$admin) {
            return 'done!';
        }
        $pwdReset = passwordReset::where('email', $req->email)->delete();
        $token= str_random(20);
        $now= Carbon::now();
        $pwdReset = new passwordReset();
        $pwdReset->email=$req->email;
        $pwdReset->token=$token;
        $pwdReset->created_at=$now;
        $pwdReset->save();
         $url = url('/reset-pwd/'.$token);
        // send email
        Mail::send('mail.reset-password-mail', compact('url', 'admin'), function ($message) use ($admin) {
            $message->to($admin->email, $admin->name);
            // $message->cc('kenjav96@gmail.com', 'Dũng thần dâm');
            // $message->replyTo('thienth@fpt.edu.vn', 'Mr.Thien');
            $message->subject('Yêu cầu cấp lại mật khẩu');
        });
        return 'done!';
     }
}
