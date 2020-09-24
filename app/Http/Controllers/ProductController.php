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
<<<<<<< HEAD
        $query = DB::table('products')
            ->join('categories','categories.id','=','products.category_id')
            ->join('brands','brands.id','=','products.brand_id');
        $query->orderBy('products.id', 'asc');
=======
        $query = DB::table('products');
        $query->orderBy('id', 'asc');
>>>>>>> 7f8aed56f1cb2eb03d8445e4a37f5369a39e120f
        $bang = $query->get();
        return view('admin.products.list', ['list' => $bang]);
    }


    public function add(){
    $cate_product = DB::table('categories')->orderBy('id','desc')->get();
    $brand_product = DB::table('brands')->orderBy('id','desc')->get();
    return view('admin.products.add')->with('cate_product',$cate_product)->with('brand_product',$brand_product);

}
    public function save(Request $request ){

        if($request){
         $rule =[
             'product_name' => 'required|min:3',
             'product_code' => 'required|min:3',
<<<<<<< HEAD
             'product_price' =>'required',
             'product_price_sale'=>'required',
             'product_content'=> 'required',
             'product_desc' => 'required',
             'product_image' => 'required|image',
             'product_status' => 'required',
             'product_brand' => 'required',
             'product_cate' => 'required',

=======
             'product_price' =>'required|min:1000',
             'product_price_sale'=>'required|min:1000',
             'product_content'=> 'required|min:1000',
             'product_desc' => 'required|min:1000',
             'product_image' => 'required|image',
>>>>>>> 7f8aed56f1cb2eb03d8445e4a37f5369a39e120f
         ];
         $msg = [
            'product_name.required' => 'bạn cần nhập tên vào',
             'product_code.required' => 'bạn cần nhập mã sản phẩm vào',
             'product_price.required' => 'bạn cần nhập giá sản phẩm vào',
             'product_price_sale.required' => 'bạn cần nhập giá khuyến mãi vào',
             'product_content.required' => 'bạn cần nhập chi tiết sản phẩm vào',
             'product_desc.required' => 'bạn cần nhập ghi chú sản phẩm vào',
             'product_image.required' => 'bạn cần nhập ảnh sản phẩm',
             'product_image.image' => 'bạn cần nhập đúng định dạng ảnh',
<<<<<<< HEAD
             'product_status.required' => 'bạn cần nhập trạng thái sản phẩm vào',
             'product_brand.required' => 'bạn cần nhập thương hiệu sản phẩm vào',
             'product_cate.required' => 'bạn cần nhập danh mục sản phẩm vào',
=======
>>>>>>> 7f8aed56f1cb2eb03d8445e4a37f5369a39e120f
         ];
         $validator = Validator::make($request->all(),$rule,$msg);
         if($validator->fails()){
             echo "<pre>";
             $dataView['err'] = $validator->errors()->toArray();
             echo "<pre>";
             $request->flash();
          return Redirect::to('admin/add-product')->withErrors($validator->errors());

        }else{
         $data = array();
<<<<<<< HEAD
         $data['category_id'] = $request->product_cate;
         $data['brand_id'] = $request->product_brand;
=======
>>>>>>> 7f8aed56f1cb2eb03d8445e4a37f5369a39e120f
         $data['product_name'] = $request->product_name;
         $data['product_code'] = $request->product_code;
         $data['product_price'] = $request->product_price;
         $data['product_price_sale'] = $request->product_price_sale;
         $data['product_content'] = $request->product_content;
         $data['product_desc'] = $request->product_desc;
<<<<<<< HEAD
         $data['product_status'] = $request->product_status;
=======
>>>>>>> 7f8aed56f1cb2eb03d8445e4a37f5369a39e120f
         $get_image = $request->file('product_image');
         if ($get_image){
             $get_name_image = $get_image ->getClientOriginalName();
             $name_image = current(explode('.',$get_name_image));
             $new_image =  $name_image . rand(0,99) . '.' .$get_image->getClientOriginalExtension();
<<<<<<< HEAD
             $get_image->move('product',$new_image);
=======
             $get_image->move('public\upaload\product',$new_image);
>>>>>>> 7f8aed56f1cb2eb03d8445e4a37f5369a39e120f
             $data['product_image']=$new_image;
             DB::table('products')->insert($data);
             Session::put('message', 'thêm sản phẩm thành thành công');
             return  Redirect::to('admin/product');
         }
         $data['product_image'] = '';
         DB::table('products')->insert($data);
             Session::put('message', 'thêm sản phẩm thành thành công');
             return Redirect::to('admin/product');
         }
    }
}
<<<<<<< HEAD
 public function edit($id){
     $cate_product = DB::table('categories')->orderBy('id','desc')->get();
     $brand_product = DB::table('brands')->orderBy('id','desc')->get();
        $edit_product = DB::table('products')->where('id',$id)->get();
        return view('admin.products.edit',['list'=>$edit_product])->with('cate_product',$cate_product)->with('brand_product',$brand_product);
     ;
 }
=======
>>>>>>> 7f8aed56f1cb2eb03d8445e4a37f5369a39e120f
}
