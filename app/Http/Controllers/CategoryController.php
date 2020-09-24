<?php
namespace App\Http\Controllers;
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
public function save(Request $request ){
    if($request){
        $rule = [
          'category_name' => 'required',
          'category_desc' => 'required',
          'category_status' => 'required',
        ];
        $msg = [
            'category_name.required' => 'bạn cần nhập tên danh mục sản phẩm vào',
            'category_desc.required' => 'bạn cần nhập ghi chú sản phẩm vào',
            'category_status.required' => 'bạn cần nhập trạng thái sản phẩm vào',
        ];
      $validator = Validator::make($request->all(),$rule,$msg );
      if($validator->fails()){
        echo "<pre>";
          $dataView['err'] = $validator->errors()->toArray();
          echo "<pre>";
          $request ->flash();
          return Redirect::to('admin/add-category')->withErrors($validator->errors());

      }else{
          $data = array();
          $data['category_name'] = $request->category_name;
          $data['category_desc'] = $request->category_desc;
          $data['category_status']= $request->category_status;
           DB::table('categories')->insert($data);
          Alert()->success('Thêm thành công !')->autoClose(1500);
          return \redirect()->route('category.list');
      }
    }
}
        public function edit($id)
        {
           $edit = DB::table('categories')->where('id',$id)->get();

           return view('admin.categories.edit',['edit'=>$edit]);
        }

        public function update(Request $request,$id){
         if($request){
             $rule = [
                 'category_name' => 'required',
                 'category_desc' => 'required',
             ];
             $msg = [
                  'category_name.required' => 'Cần có tên danh mục sản phẩm',
                  'category_desc.required' => 'cần có ghi chú',
             ];
             $validator = Validator::make($request->all(),$rule,$msg);
             if ($validator->fails()){
                 echo "<pred>";
                 $dataView['err'] = $validator->errors()->toArray();
                 echo "<pred>";
                  $request->flash();
                 return redirect()->route('category.edit',[$id])->withErrors($validator->errors());
             }else{
                  $data = array();
                  $data['category_name'] = $request->category_name;
                  $data['category_desc'] = $request->category_desc;
                  $data['category_status']=$request->category_status;
                  DB::table('categories')->where('id',$id)->update($data);
                 Alert()->success('sửa thành công !')->autoClose(1500);
                 return \redirect()->route('category.list');
             }

         }
        }
         public function active($id){
           DB::table('categories')->where('id',$id)->update(['category_status'=>0]);
             Alert()->success('hủy kích hoạt thành công !')->autoClose(1500);
             return \redirect()->route('category.list');

         }
         public function unactive($id){
             DB::table('categories')->where('id',$id)->update(['category_status'=>1]);
             Alert()->success('kích hoạt thành công !')->autoClose(1500);
             return \redirect()->route('category.list');
         }

        public function remove($id){
            DB::table('categories')->where('id',$id)->delete();
            Session::put('message','xóa sản phẩm thành công');
            return Redirect::to('admin/category');
        }


}
