<?php
namespace App\Http\Controllers;
use App\Http\Requests\ValidateFormCategory;
use App\Http\Requests\ValidateFormNews_category;
use App\Http\Requests\ValidateFormSubcategory;
use App\Http\Requests\ValidateFormUpdateCategory;
use App\Http\Requests\ValidateUpdateNewscategory;
use App\Http\Requests\ValidateUpdateSubcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Category;
class CategoryController extends Controller{
    //product
                public function list(){
                  $query = DB::table('categories')->where('cate_pro_id','!=',null)->orderBy('cate_pro_id','asc');
                  $bang = $query->get();
                  return view('admin.categories.product.list',['list'=>$bang]);
                }
                public function add(){
                    return view('admin.categories.product.add');
                }

                public function save(ValidateFormCategory $request ){
                          $data = array();
                          $data['cate_pro_id'] = $request->cate_pro_id;
                          $data['category_product_name'] = $request->category_product_name;
                          $data['category_product_desc'] = $request->category_product_desc;
                    DB::table('categories')->insert($data);
                          Alert()->success('Thêm thành công !')->autoClose(1500);
                          return \redirect()->route('category.list');
                }
                public function edit($id)
                {
                   $edit = DB::table('categories')->where('cate_pro_id',$id)->get();
                   return view('admin.categories.product.edit',['category'=>$edit]);
                }
                public function update(ValidateFormUpdateCategory $request,$id){

                    $data = array();
                    $data['cate_pro_id'] = $request->cate_pro_id;
                    $data['category_product_name'] = $request->category_product_name;
                    $data['category_product_desc'] = $request->category_product_desc;
                          DB::table('categories')->where('cate_pro_id',$id)->update($data);
                         Alert()->success('Cập nhật thành công !')->autoClose(1500);
                         return \redirect()->route('category.list');
                }

                public function remove($id){
                    DB::table('categories')->where('cate_pro_id',$id)->delete();
                    Alert()->success('Xóa thành công !')->autoClose(1500);
                    return \redirect()->route('category.list');
                }

        //news

                public function list_news(){
                    $query = DB::table('categories')->where('cate_news_id','!=',null)->orderBy('id','asc');
                    $bang = $query->get();
                    return view('admin.categories.news.list-news',['list'=>$bang]);
                }
                public function add_news(){
                    return view('admin.categories.news.add-news');
                }
                public function save_news(ValidateFormNews_category $request ){
                    $data = array();
                    $data['cate_news_id'] = $request->cate_news_id;
                    $data['category_news_name'] = $request->category_news_name;
                    $data['category_news_desc'] = $request->category_news_desc;
                    DB::table('categories')->insert($data);
                    Alert()->success('Thêm thành công !')->autoClose(1500);
                    return \redirect()->route('category.list-news');
                }
                public function edit_news($id)
                {
                    $edit = DB::table('categories')->where('cate_news_id',$id)->get();

                    return view('admin.categories.news.edit-news',['category'=>$edit]);
                }
                public function update_news(ValidateUpdateNewscategory $request,$id){
                    $data = array();
                    $data['cate_news_id'] = $request->cate_news_id;
                    $data['category_news_name'] = $request->category_news_name;
                    $data['category_news_desc'] = $request->category_news_desc;
                    DB::table('categories')->where('cate_news_id',$id)->update($data);
                    Alert()->success('Cập nhật thành công !')->autoClose(1500);
                    return \redirect()->route('category.list-news');
                }
                public function remove_news($id){
                    DB::table('categories')->where('cate_news_id',$id)->delete();
                    Alert()->success('Xóa thành công !')->autoClose(1500);
                    return \redirect()->route('category.list-news');
                }

                //sub-category

                public function list_sub(){
                    $query = Category::where('sub_id','!=',null)
                        ->orderBy('sub_id','asc');
                    $bang = $query->with('categories')->get();
                    return view('admin.categories.subcategory.list',['list'=>$bang]);
                }
                public function add_sub(){
                    $cate_product = Category::all();
                    return view('admin.categories.subcategory.add',compact('cate_product'));
                }

                public function save_sub(ValidateFormSubcategory $request ){
                    $data = array();
                    $data['sub_id'] = $request->sub_id;
                    $data['parent_id'] = $request->cate_product;
                    $data['category_sub_product_name'] = $request->category_sub_product_name;
                    $data['category_sub_product_desc'] = $request->category_sub_product_desc;
                    DB::table('categories')->insert($data);
                    Alert()->success('Thêm thành công !')->autoClose(1500);
                    return \redirect()->route('subcategory.list');
                }
                public function edit_sub($id)
                {
                    $cate_pro = DB::table('categories')
                        ->select('category_product_name','category_product_desc','cate_pro_id')
                        ->get();
                    $category = DB::table('categories')
                        ->where('sub_id',$id)->get();
                    return view('admin.categories.subcategory.edit',compact('cate_pro','category'));
                }
                public function update_sub(ValidateUpdateSubcategory $request,$id){

                    $data = array();
                    $data['sub_id'] = $request->sub_id;
                    $data['parent_id'] = $request->cate_product;
                    $data['category_sub_product_name'] = $request->category_sub_product_name;
                    $data['category_sub_product_desc'] = $request->category_sub_product_desc;
                    DB::table('categories')->where('sub_id',$id)->update($data);
                    Alert()->success('Cập nhật thành công !')->autoClose(1500);
                    return \redirect()->route('subcategory.list');
                }

                public function remove_sub($id){
                    DB::table('categories')->where('sub_id',$id)->delete();
                    Alert()->success('Xóa thành công !')->autoClose(1500);
                    return \redirect()->route('subcategory.list');
    }

}
