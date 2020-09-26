<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller{

public function list(){
      $query = DB::table('brands')->orderBy('id','desc')->get();
       return view('admin.brands.list',['list'=>$query]);
}
public function add(){
    return view('admin.brands.add');
}
public function save(Request $request){
    if($request){
        $rule = [
            'brand_name' => 'required',
            'brand_image' => 'required|image',
            'brand_desc' => 'required',
            'brand_status' => 'required',
        ];
        $msg = [
            'brand_name.required' => 'Bạn cần nhập tên thương hiệu',
            'brand_image.required' => 'Bạn cần thêm logo',
            'brand_image.image' => 'Bạn cần nhập đúng định dạng ảnh',
            'brand_desc.required' => 'Bạn cần nhập ghi chú vào',
            'brand_status.required' => 'Bạn cần nhập thêm trạng thái',
        ];
        $validator = Validator::make($request->all(),$rule,$msg);
        if($validator->fails()){
          echo "<pre>";
          $dataView['err'] = $validator->errors()->toArray();
            echo "<pre>";
            $request->flash();
          return redirect()->route('brand.add')->withErrors($validator->errors());
        }else{
            $data = array();
            $data['brand_name'] = $request->brand_name;
            $data['brand_desc'] = $request->brand_desc;
            $data['brand_status'] = $request->brand_status;
            $get_image = $request->file('brand_image');
            if ($get_image){
                $get_name_image = $get_image ->getClientOriginalName();
                $name_image = current(explode('.',$get_name_image));
                $new_image =  $name_image . rand(0,99) . '.' .$get_image->getClientOriginalExtension();
                $get_image->move('brand',$new_image);
                $data['brand_image']=$new_image;
                DB::table('brands')->insert($data);
                Alert()->success('Thêm thành công !')->autoClose(1500);
                return \redirect()->route('brand.list');
            }
            $data['brand_image'] = '';
            DB::table('brands')->insert($data);

            Alert()->success('Thêm thành công !')->autoClose(1500);
            return \redirect()->route('brand.list');        }
    }
}
public function edit($id){
         $edit_brand = DB::table('brands')->where('id',$id)->orderBy('id','desc')->get();
         return view('admin.brands.edit',['list'=>$edit_brand]);
}
    public function update(Request $request,$id){
        if($request){
            $rule = [
                'brand_name' => 'required',
                'brand_desc' => 'required',
                'brand_status' => 'required',
            ];
            $msg = [
                'brand_name.required' => 'Bạn cần nhập tên thương hiệu',
                'brand_desc.required' => 'Bạn cần nhập ghi chú vào',
                'brand_status.required' => 'Bạn cần nhập thêm trạng thái',
            ];
            $validator = Validator::make($request->all(),$rule,$msg);
            if($validator->fails()){
                echo "<pre>";
                $dataView['err'] = $validator->errors()->toArray();
                echo "<pre>";
                $request->flash();
                return redirect()->route('brand.edit',[$id])->withErrors($validator->errors());
            }else{
                $data = array();
                $data['brand_name'] = $request->brand_name;
                $data['brand_desc'] = $request->brand_desc;
                $data['brand_status'] = $request->brand_status;
                $get_image = $request->file('brand_image');
                if ($get_image){
                    $get_name_image = $get_image ->getClientOriginalName();
                    $name_image = current(explode('.',$get_name_image));
                    $new_image =  $name_image . rand(0,99) . '.' .$get_image->getClientOriginalExtension();
                    $get_image->move('brand',$new_image);
                    $data['brand_image']=$new_image;
                    DB::table('brands')->where('id',$id)->update($data);
                    Alert()->success('Sửa  thành công !')->autoClose(1500);
                    return \redirect()->route('brand.list');
                }else{
                    DB::table('brands')->where('id',$id)->update($data);
                    Alert()->success('Sửa  thành công !')->autoClose(1500);
                    return \redirect()->route('brand.list');
                }
            }
                }

        }
public function remove($id){
    DB::table('brands')->where('id',$id)->delete();
    Alert()->success('Xóa thành công !')->autoClose(1500);
    return \redirect()->route('brand.list');
}
    public function active($id){
        DB::table('brands')->where('id',$id)->update(['brand_status'=>0]);
        Alert()->success('hủy kích hoạt thành công !')->autoClose(1500);
        return \redirect()->route('brand.list');

    }
    public function unactive($id){
        DB::table('brands')->where('id',$id)->update(['brand_status'=>1]);
        Alert()->success('kích hoạt thành công !')->autoClose(1500);
        return \redirect()->route('brand.list');
    }

}
