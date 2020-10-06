<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateFormShipping;
use App\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShippingController extends Controller
{
    public function list(){
    $shipping = Shipping::all();
    return view("admin.shipping.list",compact('shipping'));

    }
    public function add(){
    return view('admin.shipping.add');
    }
public function save(ValidateFormShipping $request){
        DB::beginTransaction();
        Shipping::create([
            "shipping_name"  => $request->shipping_name,
            "shipping_phone"=>$request->shipping_phone,
            "shipping_address" => $request->shipping_address  ,
            "shipping_email" => $request->shipping_email  ,
            "shipping_name_receive" => $request->shipping_name_receive  ,
            "shipping_phone_receive" => $request-> shipping_phone_receive ,
            "shipping_address_receive" => $request->shipping_address_receive  ,
            "shipping_node" => $request->shipping_node  ,
            "shipping_information" => $request->shipping_information  ,
            "shipping_payment" => $request-> shipping_payment ,

        ]);
DB::commit();
    Alert()->success('Thêm thành công !')->autoClose(1500);
    return \redirect()->route('shipping.list');}

    public function edit($id){
        $shipping = Shipping::where('id',$id)->get();
        return view("admin.shipping.edit",compact('shipping'));
    }
    public function update(ValidateFormShipping $request,$id){
          DB::beginTransaction();
          Shipping::where('id',$id)->update([
          "shipping_name"  => $request->shipping_name,
              "shipping_phone"=>$request->shipping_phone,
              "shipping_address" => $request->shipping_address  ,
              "shipping_email" => $request->shipping_email  ,
              "shipping_name_receive" => $request->shipping_name_receive  ,
              "shipping_phone_receive" => $request-> shipping_phone_receive ,
              "shipping_address_receive" => $request->shipping_address_receive  ,
              "shipping_node" => $request->shipping_node  ,
              "shipping_information" => $request->shipping_information  ,
              "shipping_payment" => $request-> shipping_payment ,
          ]);
DB::commit();
        Alert()->success('Cập nhật  thành công !')->autoClose(1500);
        return \redirect()->route('shipping.list');

    }
    public function remove($id){
        Shipping::find($id)->delete();
        Alert()->success('Xóa  thành công !')->autoClose(1500);
        return \redirect()->route('shipping.list');
    }
}
