<?php

namespace App\Http\Controllers;

use App\Custom;
use App\Http\Requests\ValidateFormAddCustom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomController extends Controller
{
    public function list()
    {
        $custom = Custom::all();
        return view('admin.custom.list', compact('custom'));
    }
    public function add(){

        return view('admin.custom.add');
    }
    public function save(ValidateFormAddCustom $request){
     DB::beginTransaction();
     Custom::create([
         'custom_name' => $request->custom_name,
         'custom_email' => $request->custom_email,
         'custom_phone' => $request->custom_phone,
         'custom_address' => $request->custom_address,
         'custom_password' => Hash::make($request->custom_password),
     ]);
      DB::commit();
        Alert()->success('Thêm thành công!')->autoClose(1500);
        return \redirect()->route('custom.list');
    }
    public function edit($id){
        $custom = Custom::where('id',$id)->get();
        return view('admin.custom.edit',compact('custom'));
    }
    public function update(ValidateFormAddCustom $request,$id){
        DB::beginTransaction();
        Custom::where('id',$id)->update([
            'custom_name' => $request->custom_name,
            'custom_email' => $request->custom_email,
            'custom_phone' => $request->custom_phone,
            'custom_address' => $request->custom_address,
            'custom_password' => Hash::make($request->custom_password),
        ]);
        DB::commit();
        Alert()->success('Sửa thành công!')->autoClose(1500);
        return \redirect()->route('custom.list');
    }
    public function remove($id){
        DB::beginTransaction();
        Custom::where('id',$id)->delete();
        DB::commit();
        Alert()->success('Xóa thành công!')->autoClose(1500);
        return \redirect()->route('custom.list');
    }
}
