<?php

namespace App\Http\Controllers;
use App\Coupon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CouponController extends Controller
{
    //
    public function index(){
        $coupons=Coupon::all();
        return \view('admin.coupons.index',\compact('coupons'));
    }
    public function create(){
        return \view('admin.coupons.add');
    }
    public function store(Request $request){
        //code o day
        $coupon=new Coupon();
        $coupon->fill([
            'coupon_name'=>$request->coupon_name,
            'coupon_code'=>$request->coupon_code,
            'coupon_number'=>$request->coupon_number,
            'coupon_time'=>$request->coupon_time,
            'coupon_price'=>$request->coupon_price,
            'coupon_condition'=>$request->coupon_condition
        ]);
        $coupon->save();
        Alert()->success('Thêm thành công !')->autoClose(1500);
        return \redirect()->route('coupon.list');
    }
    public function edit($id){
        $coupon=Coupon::find($id);
        return \view('admin.coupons.edit',\compact('coupon'));
    }
    public function update(Request $request,$id){
        //code o day
        $coupon = Coupon::find($id);
        $coupon->fill([
            'coupon_name' => $request->coupon_name,
            'coupon_code' => $request->coupon_code,
            'coupon_number' => $request->coupon_number,
            'coupon_time' => $request->coupon_time,
            'coupon_price' => $request->coupon_price,
            'coupon_condition' => $request->coupon_condition
        ]);
        $coupon->save();
        Alert()->success('Sửa thành công !')->autoClose(1500);
        return \redirect()->route('coupon.list');
    }

}
