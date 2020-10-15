<?php

namespace App\Http\Controllers;


use App\Category;
use App\Customer;
use App\Http\Requests\ValidateFormLogin;
use App\Http\Requests\ValidateFormRegister;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\WellcomeRegis;
use App\Mail\Wellcome;
use App\Mail\WellcomeEmail;
use App\Product;
use App\Slide;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    //
    public function index(){
        $products=Product::limit(8)->orderBy('product_id','desc')->get();
        $slides=Slide::limit(3)->orderBy('id','desc')->get();
        $category =Category::where('cate_pro_id','!=','null')
            ->select('cate_pro_id','category_product_name','sub_id','category_sub_product_name')
            ->with('SubCategories')->get();
        return \view('pages.home',\compact('products','slides','category'));

    }
    public function showFormLogin()
    {
        return \view('pages.login');
    }
    public function showFormRegister()
    {
        return \view('pages.register');
    }

    public function login(ValidateFormLogin $request)
    {
        $email = $request->email;
        $password = md5($request->password);
        $customer = Customer::where('customer_email', '=', $email)->where('customer_password','=',$password)->first();
        if ($customer) {
            $login = $customer->count();
            if ($login > 0) {
                Session::put('customer', $customer);
                Alert()->success('Đăng nhập thành công !')->autoClose(1500);
                return redirect()->route('home');
            }
        } else {
            Session::put('mess', 'Sai tên đăng nhập hoặc mật khẩu!');
            return redirect()->route('home.getlogin');
        }

    }
    public function register(ValidateFormRegister $request)
    {

        $customer = new Customer();
        $customer->customer_name = $request->name;
        $customer->customer_email = $request->email;
        $customer->customer_password = md5($request->password);
        $customer->save();
        $mail=$request->email;
        \dispatch(new WellcomeRegis($mail))->onQueue('register')->delay(\now()->addMinutes(2));
        Alert()->success('Đăng kí thành công !')->autoClose(1500);
        return redirect()->route('home.getlogin');
    }
    public function logout(){
        Session::put('customer', \null);
        return back();
    }



}
