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

    }
    public function store(Request $request){

    }
    public function edit($id){

    }
    public function update(Request $request,$id){

    }

}
