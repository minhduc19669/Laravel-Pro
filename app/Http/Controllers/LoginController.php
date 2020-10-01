<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    public function login(Request $request)
    {
        $password=$request->password;
        $user=[
            'email'=>$request->email,
            'password'=>$password
        ];
        if (Auth::attempt($user)) {

            Alert()->success('Đăng nhập thành công !')->autoClose(1500);
            return \redirect()->route('admin.dashboard');
        }else{
            Session::put('mess','Sai tên tài khoản hoặc mật khẩu');
            return \redirect()->route('login');
        }

    }
    public function logout(){
        Auth::logout();
         return \redirect()->route('login');
	}
	public function showFormLogin(){
		return view('admin_login');
	}
}
