<?php

namespace App\Http\Controllers;
use App\Http\Requests\ValidateFormAddProduct;
use App\Http\Requests\ValidateFormUpdateProduct;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Sunra\PhpSimple\HtmlDomParser;

class ProductController extends Controller
{
    //
    public function list(){
        $list = DB::table('products')
            ->join('categories','categories.cate_pro_id','=','products.cate_pro_id')
            ->join('brands','brands.id','=','products.brand_id')
            ->orderBy('products.product_id', 'asc')->get();
        return view('admin.products.list', compact('cate_sub','list'));
    }


    public function add(){
        $cate_sub = DB::table('categories')->where('sub_id','!=',null)->orderBy('sub_id','desc')->get();
        $cate_product = DB::table('categories')->where('cate_pro_id','!=',null)->orderBy('cate_pro_id','desc')->get();
        $brand_product = DB::table('brands')->orderBy('id','desc')->get();
    return view('admin.products.add',compact('brand_product','cate_product','cate_sub'));

}
    public function save(ValidateFormAddProduct $request ){
         $data = array();
         $data['cate_pro_id'] = $request->product_cate;
        $data['sub_id'] = $request->cate_sub;
        $data['brand_id'] = $request->product_brand;
         $data['product_name'] = $request->product_name;
         $data['product_code'] = $request->product_code;
         $data['product_price'] = $request->product_price;
         $data['product_price_sale'] = $request->product_price_sale;
         $data['product_content'] = ($request->product_content);
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
             Alert()->success('Thêm thành công !')->autoClose(1500);
             return \redirect()->route('product.list');
         }
         $data['product_image'] = '';
         DB::table('products')->insert($data);
             Alert()->success('Thêm thành công !')->autoClose(1500);
             return \redirect()->route('product.list');
    }
 public function edit($id){

     $cate_product = DB::table('categories')->orderBy('cate_pro_id','desc')->get();
     $brand_product = DB::table('brands')->orderBy('id','desc')->get();
        $edit_product = DB::table('products')->where('product_id',$id)->orderBy('product_id','desc')->get();
        return view('admin.products.edit',['list'=> $edit_product])->with('cate_product',$cate_product)->with('brand_product',$brand_product);
 }
 public function update(ValidateFormUpdateProduct $request,$id){
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
                 Alert()->success('Cập nhật thành công !')->autoClose(1500);
                 return \redirect()->route('product.list');
             }else {
                 DB::table('products')->where('product_id',$id)->update($data);
                 Alert()->success('Cập nhật thành công !')->autoClose(1500);
                 return \redirect()->route('product.list');
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
