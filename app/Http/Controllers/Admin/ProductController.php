<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
class ProductController extends Controller
{
    //


    public function list(){
        $query = DB::table('products')
            ->join('categories','categories.id','=','products.category_id')
            ->join('brands','brands.id','=','products.brand_id')
            ->orderBy('products.product_id', 'asc')->get();
        return view('admin.products.list', ['list' => $query]);
    }


    public function add(){
    $cate_product = DB::table('categories')->orderBy('id','desc')->get();
    $brand_product = DB::table('brands')->orderBy('id','desc')->get();
    return view('admin.products.add')->with('cate_product',$cate_product)->with('brand_product',$brand_product);

}
    public function save(Request $request ){

        if($request){
         $rule =[
             'product_name' => 'required',
             'product_code' => 'required',
             'product_price' =>'required',
             'product_price_sale'=>'required',
             'product_content'=> 'required',
             'product_desc' => 'required',
             'product_image' => 'required|image',
             'product_status' => 'required',
             'product_brand' => 'required',
             'product_cate' => 'required',

         ];
         $msg = [
            'product_name.required' => 'Không được phép để trống',
             'product_code.required' => 'Không được phép để trống',
             'product_price.required' => 'Không được phép để trống',
             'product_price_sale.required' => 'Không được phép để trống',
             'product_content.required' => 'Không được phép để trống',
             'product_desc.required' => 'Không được phép để trống',
             'product_image.required' => 'Không được phép để trống',
             'product_image.image' => 'Cần nhập đúng định dạng ảnh',
             'product_status.required' => 'Không được phép để trống',
             'product_brand.required' => 'Không được phép để trống',
             'product_cate.required' => 'Không được phép để trống',
         ];
         $validator = Validator::make($request->all(),$rule,$msg);
         if($validator->fails()){
             echo "<pre>";
             $dataView['err'] = $validator->errors()->toArray();
             echo "<pre>";
             $request->flash();
          return Redirect::to('users/add-product')->withErrors($validator->errors());

        }else{
         $data = array();
         $data['category_id'] = $request->product_cate;
         $data['brand_id'] = $request->product_brand;
         $data['product_name'] = $request->product_name;
         $data['product_code'] = $request->product_code;
         $data['product_price'] = $request->product_price;
         $data['product_price_sale'] = $request->product_price_sale;
         $data['product_content'] = $request->product_content;
         $data['product_desc'] = $request->product_desc;
         $data['product_status'] = $request->product_status;
         $get_image = $request->file('product_image');
         if ($get_image){
             $get_name_image = $get_image ->getClientOriginalName();
             $name_image = current(explode('.',$get_name_image));
             $new_image =  $name_image . rand(0,99) . '.' .$get_image->getClientOriginalExtension();
             $get_image->move('product',$new_image);
             $data['product_image']=$new_image;
             DB::table('products')->insert($data);
             Session::put('message', 'thêm sản phẩm thành thành công');
             return  Redirect::to('users/product');
         }
         $data['product_image'] = '';
         DB::table('products')->insert($data);
             Alert()->success('Thêm thành công !')->autoClose(1500);
             return \redirect()->route('product.list');
         }
    }
}
 public function edit($id){

     $cate_product = DB::table('categories')->orderBy('id','desc')->get();
     $brand_product = DB::table('brands')->orderBy('id','desc')->get();
        $edit_product = DB::table('products')->where('product_id',$id)->orderBy('product_id','desc')->get();
        return view('admin.products.edit',['list'=> $edit_product])->with('cate_product',$cate_product)->with('brand_product',$brand_product);
 }
 public function update(Request $request,$id){
     if($request){
         $rule =[
             'product_name' => 'required',
             'product_code' => 'required',
             'product_price' =>'required',
             'product_price_sale'=>'required',
             'product_content'=> 'required',
             'product_desc' => 'required',
             'product_status' => 'required',
             'product_brand' => 'required',
             'product_cate' => 'required',
         ];
         $msg = [
             'product_name.required' => 'Không được phép để trống',
             'product_code.required' => 'Không được phép để trống',
             'product_price.required' => 'Không được phép để trống',
             'product_price_sale.required' => 'Không được phép để trống',
             'product_content.required' => 'Không được phép để trống',
             'product_desc.required' => 'Không được phép để trống',
             'product_status.required' => 'Không được phép để trống',
             'product_brand.required' => 'Không được phép để trống',
             'product_cate.required' => 'Không được phép để trống',
         ];
         $validator = Validator::make($request->all(),$rule,$msg);
         if($validator->fails()){
             echo "<pre>";
             $dataView['err'] = $validator->errors()->toArray();
             echo "<pre>";
             $request->flash();
             return redirect()->route('product.edit',[$id])->withErrors($validator->errors());

         }else{
             $data = array();
             $data['category_id'] = $request->product_cate;
             $data['brand_id'] = $request->product_brand;
             $data['product_name'] = $request->product_name;
             $data['product_code'] = $request->product_code;
             $data['product_price'] = $request->product_price;
             $data['product_price_sale'] = $request->product_price_sale;
             $data['product_content'] = $request->product_content;
             $data['product_desc'] = $request->product_desc;
             $data['product_status'] = $request->product_status;
             $get_image = $request->file('product_image');
             if ($get_image){
                 $get_name_image = $get_image ->getClientOriginalName();
                 $name_image = current(explode('.',$get_name_image));
                 $new_image =  $name_image . rand(0,99) . '.' .$get_image->getClientOriginalExtension();
                 $get_image->move('product',$new_image);
                 $data['product_image']=$new_image;
                 DB::table('products')->where('product_id',$id)->update($data);
                 Alert()->success('Sửa thành công !')->autoClose(1500);
                 return \redirect()->route('product.list');
             }else {
                 DB::table('products')->where('product_id',$id)->update($data);
                 Alert()->success('sửa thành công !')->autoClose(1500);
                 return \redirect()->route('product.list');
             }
         }
     }
 }
 public function remove($id){
        DB::table('products')->where('product_id',$id)->delete();
     Alert()->success('Xóa thành công !')->autoClose(1500);
     return \redirect()->route('product.list');
 }
    public function active($id){
        DB::table('products')->where('product_id',$id)->update(['product_status'=>0]);
        Alert()->success('Hủy kích hoạt thành công !')->autoClose(1500);
        return \redirect()->route('product.list');

    }
    public function unactive($id){
        DB::table('products')->where('product_id',$id)->update(['product_status'=>1]);
        Alert()->success('Kích hoạt thành công !')->autoClose(1500);
        return \redirect()->route('product.list');
    }

}
