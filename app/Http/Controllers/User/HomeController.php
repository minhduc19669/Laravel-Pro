<?php

namespace App\Http\Controllers\User;


use App\Category;
use App\Customer;
use App\Http\Requests\ValidateFormLogin;
use App\Http\Requests\ValidateFormRegister;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Slide;
use Illuminate\Support\Facades\Log;

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
        $password = \Hash::make($request->password);

        $customer = Customer::where([
            ['customer_email', '=', $email],
            ['customer_password', '=', $password],
        ])->first();
        if ($customer) {
            $login = $customer->count();
            if ($login > 0) {
                Session::put('user', $customer);
                Alert()->success('Đăng nhập thành công !')->autoClose(1500);
                return redirect()->route('home');
            }
        } else {
            Session::put('mess', 'Sai tên đăng nhập hoặc mật khẩu!');
            return redirect()->route('login');
        }

    }
    public function register(ValidateFormRegister $request)
    {

        $customer = new Customer();
        $customer->customer_name = $request->name;
        $customer->customer_email = $request->email;
        $customer->customer_password = \Hash::make($request->password);
        $customer->save();
        Alert()->success('Đăng kí thành công !')->autoClose(1500);
        return redirect()->route('login');
    }



}
