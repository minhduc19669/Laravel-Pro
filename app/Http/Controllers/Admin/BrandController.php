<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateFormAddBrand;
use App\Http\Requests\ValidateFormUpdateBrand;
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
public function save(ValidateFormAddBrand $request){

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
            return \redirect()->route('brand.list');
}
public function edit($id){
         $edit_brand = DB::table('brands')->where('id',$id)->orderBy('id','desc')->get();
         return view('admin.brands.edit',['list'=>$edit_brand]);
}
    public function update(ValidateFormUpdateBrand $request,$id){

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
                    Alert()->success('Cập nhật thành công !')->autoClose(1500);
                    return \redirect()->route('brand.list');
                }
            }
                     public function remove($id){
                       $brand = DB::table('brands')->where('id',$id)->delete();
                    return response()->json($brand);
                }
            public function active($id){
                DB::table('brands')->where('id',$id)->update(['brand_status'=>0]);
                Alert()->success('Hủy kích hoạt thành công !')->autoClose(1500);
                return \redirect()->route('brand.list');

            }
            public function unactive($id){
                DB::table('brands')->where('id',$id)->update(['brand_status'=>1]);
                Alert()->success('Kích hoạt thành công !')->autoClose(1500);
                return \redirect()->route('brand.list');
            }

    public function action(Request $request)
    {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            if($query != '')
            {
                $data = DB::table('brands')
                    ->orWhere('brand_name', 'like', '%'.$query.'%')
                    ->orWhere('brand_desc', 'like', '%'.$query.'%')
                    ->orderBy('id', 'desc')
                    ->get();
            }
            else
            {
                $data = DB::table('brands')
                    ->orderBy('id', 'desc')
                    ->get();
            }
            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach($data as $key => $row)
                {
                    $output .= '
        <tr id=item_'.$row->id.'>
        <td>'.++$key.'</td>
         <td>'.$row->brand_name.'</td>
         <td><img width="50px" src=" /brand/'.$row->brand_image.' " alt=""></td>
         <td>'.$row->brand_desc.'</td>
         ';
                    if ($row->brand_status == 0) {
                        $output .= '
         <td><a href='.route('brand.un-active',$row->id).'><button id="unactive" data-id="'.$row->id.'"  class="btn btn-danger"> Ẩn </button></a></td>
';
                    }else{
                        $output .= '
         <td><a href='.route('brand.active',$row->id).'><button class="btn btn-primary">Hiện</button></a></td>
';
                    }
                    $output .= '
         <td><a href='.route('brand.edit',$row->id).'><button class="btn  btn-dark" type="submit">sửa</button></a>  <button id="delete"  data-id="'.$row->id .'" class="btn  btn-danger delete" type="submit">xóa</button> </td>
        </tr>
        ';
                }
            }
            else
            {
                $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
            }
            $data = array(
                'table_data'  => $output,
                'total_data'  => $total_row
            );

            echo json_encode($data);
        }
    }
}
