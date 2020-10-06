<?php

namespace App\Http\Controllers\Admin;

use App\Customer;
use App\Http\Requests\ValidateFormAddCustom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
class CustomerController extends Controller
{
    public function list()
    {
        $customer = Customer::all();
        return view('admin.customer.list', compact('customer'));
    }
    public function add(){
        return view('admin.customer.add');
    }
    public function save(ValidateFormAddCustom $request){
     DB::beginTransaction();
     Customer::create([
         'customer_name' => $request->customer_name,
         'customer_email' => $request->customer_email,
         'customer_phone' => $request->customer_phone,
         'customer_address' => $request->customer_address,
         'customer_password' => Hash::make($request->customer_password),
     ]);
      DB::commit();
        Alert()->success('Thêm thành công!')->autoClose(1500);
        return \redirect()->route('customer.list');
    }
    public function edit($id){
        $customer = Customer::where('id',$id)->get();
        return view('admin.customer.edit',compact('customer'));
    }
    public function update(ValidateFormAddCustom $request,$id){
        DB::beginTransaction();
        Customer::where('id',$id)->update([
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_phone' => $request->customer_phone,
            'customer_address' => $request->customer_address,
            'customer_password' => Hash::make($request->customer_password),
        ]);
        DB::commit();
        Alert()->success('Cập nhật thành công!')->autoClose(1500);
        return \redirect()->route('customer.list');
    }
    public function remove($id){
        DB::beginTransaction();
        Customer::where('id',$id)->delete();
        DB::commit();
        Alert()->success('Xóa thành công!')->autoClose(1500);
        return \redirect()->route('customer.list');
    }





}
