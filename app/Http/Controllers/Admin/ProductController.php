<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\ValidateFormAddProduct;
use App\Http\Requests\ValidateFormUpdateProduct;
use App\Image;
use App\Post;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Sunra\PhpSimple\HtmlDomParser;
use function simplehtmldom_1_5\str_get_html;

class ProductController extends Controller
{
    //
    public function list(){

//        $list = DB::table('products')
//            ->join('categories', function ($join) {
//                $join->on('products.cate_pro_id', '=', 'categories.cate_pro_id')->orOn('products.sub_id', '=', 'categories.sub_id');
//            })
////            ->join('categories','categories.cate_pro_id','=','products.cate_pro_id')
//            ->join('brands','brands.id','=','products.brand_id')
//            ->orderBy('products.product_id', 'asc')
//            ->get();
        return view('admin.products.list');
    }


    public function add(){
            $cate_sub = DB::table('categories')->where('sub_id','!=',null)->orderBy('sub_id','desc')->get();
            $cate_product = DB::table('categories')->where('cate_pro_id','!=',null)->orderBy('cate_pro_id','desc')->get();
            $brand_product = DB::table('brands')->orderBy('id','desc')->get();
            return view('admin.products.add',compact('brand_product','cate_product','cate_sub'));

}
    public function save(ValidateFormAddProduct $request ){
        $product_code =substr(md5(microtime()),rand(0,26),5) ;
             $product = new Product();
             $product->cate_pro_id = $request->product_cate;
             $product->sub_id = $request->cate_sub;
             $product->brand_id = $request->product_brand;
             $product->product_name = $request->product_name;
             $product->product_code = $product_code;
             $product->product_price = $request->product_price;
             $product->product_price_sale = $request->product_price_sale;
             $product->product_content = $request->product_content;
             $product->product_desc = $request->product_desc;
             $product->product_status = $request->product_status;

            $get_image = $request->hasFile('product_image');
                if ($get_image) {
                    $allowedfileExtension = ['jpg', 'png', 'jpeg'];
                    $files = $request->file('product_image');
                    $exe_flg = \true;
                    foreach ($files as $file) {
                        $extension = $file->getClientOriginalExtension();
                        $check = in_array($extension, $allowedfileExtension);
                        if (!$check) {
                            $exe_flg = \false;
                            break;
                        }
                    }
                if ($exe_flg) {
                    $product->save();
                    foreach ($request->product_image as $image) {
                        $filename = $image->store('product', 'public');
                        $image = new Image();
                        $image->image = $filename;
                        $image->product_id = $product->product_id;
                        $image->save();
                    }
                    $avatar = Image::where('product_id', $product->product_id)->limit(1)->get();
                    foreach ($avatar as $value) {
                        $product->product_image = $value->image;
                        $product->save();
                    }
                }
                Alert()->success('Thêm  thành công !')->autoClose(1500);
                return \redirect()->route('product.list');
            }
    }
 public function edit($id){
            $images=Product::find($id)->images;
             $cate_sub = DB::table('categories')->where('sub_id','!=',null)->orderBy('sub_id','desc')->get();
             $cate_product = DB::table('categories')->where('cate_pro_id','!=',null)->orderBy('cate_pro_id','desc')->get();
             $brand_product = DB::table('brands')->orderBy('id','desc')->get();
             $edit_product = DB::table('products')->where('product_id',$id)->orderBy('product_id','desc')->get();
             return view('admin.products.edit',['list'=> $edit_product])->with('cate_product',$cate_product)->with('brand_product',$brand_product)->with('cate_sub',$cate_sub)->with('images',$images);
         }
 public function update(Request $request,$id){
        $product = Product::find($id);
        $product->cate_pro_id = $request->product_cate;
        $product->sub_id = $request->cate_sub;
        $product->brand_id = $request->product_brand;
        $product->product_name = $request->product_name;
        $product->product_code = $request->product_code;
        $product->product_price = $request->product_price;
        $product->product_price_sale = $request->product_price_sale;
        $product->product_content = $request->product_content;
        $product->product_desc = $request->product_desc;
        $product->product_status = $request->product_status;
        $get_image = $request->hasFile('product_image');
        if(!$get_image){
            $product->save();
            Alert()->success('Cập nhập thành công !')->autoClose(1500);
            return \redirect()->route('product.list');
        }
        if ($get_image) {
            $allowedfileExtension = ['jpg', 'png', 'jpeg'];
            $files = $request->file('product_image');
            $exe_flg = \true;
            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);
                if (!$check) {
                    $exe_flg = \false;
                    break;
                }
            }
            if ($exe_flg) {
                $product->save();
                foreach ($request->product_image as $image) {
                    $filename = $image->store('product', 'public');
                    $image = new Image();
                    $image->image = $filename;
                    $image->product_id = $product->product_id;
                    $image->save();
                }
                $avatar = Image::where('product_id', $product->product_id)->limit(1)->get();
                foreach ($avatar as $value) {
                    $product->product_image = $value->image;
                    $product->save();
                }
            }
            Alert()->success('Cập nhập thành công !')->autoClose(1500);
            return \redirect()->route('product.list');
        }
 }
 public function remove($id){
            $image=Image::where('product_id',$id)->delete();
            $comment = Post::where('id_product',$id)->delete();
            $product =   DB::table('products')->where('product_id',$id)->delete();
             return response()->json($product);
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
    public function action(Request $request)
    {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            if($query != '')
            {
                $data = Product::join('brands','brands.id','=','products.brand_id')
                    ->join('categories','categories.cate_pro_id','=','products.cate_pro_id')
                    ->orWhere('product_name', 'like', '%'.$query.'%')
                    ->orWhere('product_code', 'like', '%'.$query.'%')
                    ->orderBy('products.product_id', 'desc')
                    ->get();
            }
            else
            {
                $data = Product::join('brands','brands.id','=','products.brand_id')
                    ->join('categories','categories.cate_pro_id','=','products.cate_pro_id')
                    ->orderBy('products.product_id', 'desc')
                    ->get();
            }
            $total_row = $data->count();
            if($total_row > 0)
            {

                foreach($data as $key => $row)
                {

                        $output .= '
        <tr role="row" class="odd" id=item_' . $row->product_id . '>
        <td class="" tabindex="0">' . ++$key . '</td>
        <td class="sorting_1" style="font-size: 12px">' . $row->product_code . '</td>
        <td style="font-size: 12px">' . $row->product_name . '</td>
         <td style="font-size: 12px">' . $row->category_product_name . '</td>
         <td style="font-size: 12px">' . $row->brand_name . '</td>
         <td style="font-size: 12px">' . $row->product_price . '</td>
         <td style="font-size: 12px">' . $row->product_price_sale . '</td>
         <td >';
                    foreach ($row->images as $value) {
                    $output .= '
        <img width="50px" src=" /storage/' . $value->image . ' " alt="">
        ';
                    }
                    $output .= '
           </td><td style="font-size: 12px">' . $row->product_content . '</td>
         ';



                    if ($row->product_status == 0) {
                        $output .= '
                     <td>Hết hàng</td>
';
                    }else{
                        $output .= '
                    <td>Còn hàng</td>
';
                    }
                    $output .= '
         <td><a href='.route('product.edit',$row->product_id).'><button style="font-size: 12px" class="btn  btn-dark" type="submit">sửa</button></a>  <button style="font-size: 12px" id="delete"  data-id="'.$row->product_id .'" class="btn  btn-danger delete" type="submit">xóa</button> </td>
        </tr>
        ';
                }
            }
            else
            {
                $output = '
       <tr>
        <td align="center" colspan="11">No Data Found</td>
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
