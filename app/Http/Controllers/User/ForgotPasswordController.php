<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Controllers\Controller;
use App\Jobs\ForgotPassword;
use Illuminate\Http\Request;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\RequestResetPassword;
use Dotenv\Result\Success;

class ForgotPasswordController extends Controller
{
    //

    public function index(){
        return \view('pages.forgotpassword');
    }
    public function alert(){
        return \view('pages.check_email_forgot_pasword');
    }
    public function sendCodeResetPassword(Request $request){
        $request->validate([
            'email'=>'required|email'
        ]);
        $customer=Customer::where('customer_email',$request->email)->first();
        if(!$customer){
            Alert()->error('Có lỗi xảy ra','Email không tồn tại!!!');
            return \back();
        }
        $code = md5(Carbon::now().$request->email);
        \dd($code);
        $customer->code=$code;
        $customer->time_code=Carbon::now();
        $customer->save();
        $url='laravel-training.local/home/reset/password/'."$request->email". '/'. "$code";
        \dispatch(new ForgotPassword($request->email,$url))->onQueue('passwordreset');
        return \redirect()->route('email.alert');
    }
    public function reset_password($email,$code){
        $email=$email;
        $code=$code;
        return \view('pages.confirmpassword',\compact('email','code'));
    }
    public function save_change_password_reset(RequestResetPassword $request){
        if($request->password){
            $confirm_password = \md5($request->confirm_password);
            $code=$request->code;
            $customer=Customer::where([
                'code'=>$code
            ])->first();
            if($customer){
                $customer->customer_password=$confirm_password;
                $customer->save();
            }
            Alert()->Success('Thay đổi mật khẩu thành công!');
            return \redirect()->route('home.getlogin');
        }


    }



}
