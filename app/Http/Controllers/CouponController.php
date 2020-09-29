<?php

namespace App\Http\Controllers;
use App\Coupon;
use Illuminate\Http\Request;

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
    }
    public function edit($id){
        $coupon=Coupon::find($id);
        return \view('admin.coupons.edit',\compact('$coupon'));
    }
    public function update(Request $request,$id){
        //code o day
    }

}
