<?php
namespace App\Http\Controllers;
use App\Http\Requests\ValidateFormCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Category;
class CategoryController extends Controller{
public function list(){
  $query = DB::table('categories')->orderBy('id','asc');
  $bang = $query->get();
  return view('admin.categories.list',['list'=>$bang]);

}
public function add(){
    return view('admin.categories.add');
}
public function save(ValidateFormCategory $request ){
          $data = array();
          $data['category_product_name'] = $request->category_product_name;
          $data['category_news_name'] = $request->category_news_name;
          $data['category_product_desc'] = $request->category_product_desc;
          $data['category_news_desc'] = $request->category_news_desc;
    DB::table('categories')->insert($data);
          Alert()->success('Thêm thành công !')->autoClose(1500);
          return \redirect()->route('category.list');
}
        public function edit($id)
        {
           $edit = DB::table('categories')->where('id',$id)->get();

           return view('admin.categories.edit',['category'=>$edit]);
        }

        public function update(ValidateFormCategory $request,$id){

                  $data = array();
            $data['category_product_name'] = $request->category_product_name;
            $data['category_news_name'] = $request->category_news_name;
            $data['category_product_desc'] = $request->category_product_desc;
            $data['category_news_desc'] = $request->category_news_desc;
                  DB::table('categories')->where('id',$id)->update($data);
                 Alert()->success('Cập nhật thành công !')->autoClose(1500);
                 return \redirect()->route('category.list');
        }
        public function remove($id){
            DB::table('categories')->where('id',$id)->delete();
            Session::put('message','Xóa sản phẩm thành công');
            return Redirect::to('users/category');
        }


}
