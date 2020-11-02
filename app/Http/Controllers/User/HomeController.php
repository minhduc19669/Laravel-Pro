<?php

namespace App\Http\Controllers;


use App\Category;
use App\Customer;
use App\Http\Requests\ValidateFormLogin;
use App\Http\Requests\ValidateFormRegister;
use App\News;
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
        $news = News::orderBy('news_id','desc')->limit(3)->get();
        $products=Product::limit(8)->orderBy('product_id','desc')->get();
        $slides=Slide::where('slide_status',1)->limit(2)->orderBy('id','desc')->get();
        $category =Category::where('cate_pro_id','!=','null')
            ->select('cate_pro_id','category_product_name','sub_id','category_sub_product_name')
            ->with('SubCategories')->get();
        $category_news =Category::all();
        return \view('pages.home',\compact('products','slides','category','news','category_news'));

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
        $customer->customer_phone=$request->phone;
        $customer->save();
        $mail=$request->email;
        \dispatch(new WellcomeRegis($mail));
        Alert()->success('Đăng kí thành công !')->autoClose(1500);
        return redirect()->route('home.getlogin');
    }
    public function changePassword(){
        return view('pages.changepassword');
    }
    public function savePassword(Request $request){
        $request->validate([
            'password' => 'required|min:6|max:16|regex:[^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$]',
            'change_password'=> 'required|min:6|max:16|regex:[^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$]',
            'confirm_password'=> 'required|min:6|max:16|regex:[^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$]|same:change_password'
        ],
        [
                'password.required' => 'Mật khẩu không được để trống!',
                'password.min' => 'Mật khẩu không được ít hơn 6 ký tự',
                'password.max' => 'Mật khẩu không được quá hơn 16 ký tự',
                'password.regex' => 'Mật khẩu phải có chữ và số (Không có ký tự đặc biệt!)',
                'confirm_password.same' => 'Mật khẩu nhập lại không đúng!'
        ]);
        $password_now=md5($request->password);
        $customer=Customer::where('customer_password',$password_now)->first();
        if($customer){
            $customer->update([
                'customer_password'=>$request->confirm_password
            ]);
            Session::put('customer', null);
            Alert()->Success('Thay đổi mật khẩu thành công!');
            return \redirect()->route('home.getlogin');
        }
        // Session::put('customer',null);
        Session::put('error', 'Mật khẩu không đúng!');
        return \redirect()->back();
    }
    public function logout(){
        Session::put('customer', \null);
        return back();
    }




}
