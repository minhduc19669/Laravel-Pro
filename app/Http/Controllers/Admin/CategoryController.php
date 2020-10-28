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
                          $data['cate_pro_id'] = rand(0,1000);
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
                    $data['category_product_name'] = $request->category_product_name;
                    $data['category_product_desc'] = $request->category_product_desc;
                          DB::table('categories')->where('cate_pro_id',$id)->update($data);
                         Alert()->success('Cập nhật thành công !')->autoClose(1500);
                         return \redirect()->route('category.list');
                }

                public function remove( $id){
                        $cate_pro = Category::where('cate_pro_id',$id)->delete();
                            return response()->json($cate_pro);

                }


    public function action_pro(Request $request)
    {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            if($query != '')
            {
                $data = DB::table('categories')
                    ->orWhere('category_product_name', 'like', '%'.$query.'%')
                    ->orWhere('category_product_desc', 'like', '%'.$query.'%')
                    ->orderBy('cate_pro_id', 'desc')
                    ->get();
            }
            else
            {
                $data = DB::table('categories')
                    ->orderBy('cate_pro_id', 'desc')
                    ->where('cate_pro_id','!=',null)
                    ->get();
            }
            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach($data as $key => $row)
                {
                    $output .= '
                    <tr id=item_'.$row->cate_pro_id.'>
                    <td>'.++$key.'</td>
                     <td>'.$row->category_product_name.' </td>
                     <td>'.$row->category_product_desc.'</td>
                     <td><a href='.route('category.edit',$row->cate_pro_id).'><button class="btn  btn-dark" type="submit">sửa</button></a>  <button id="delete"  data-id="'.$row->cate_pro_id .'" class="btn  btn-danger delete" type="submit">xóa</button> </td>
                    </tr>
                    ';}
            }
            else
            {
                $output = '
                   <tr>
                    <td align="center" colspan="5">No Data Found</td>
                   </tr>
                   ';}
            $data = array(
                'table_data'  => $output,
                'total_data'  => $total_row
            );

            echo json_encode($data);
        }
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
                    $data['cate_news_id'] =  rand(0,1000);;
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
                    $data['category_news_name'] = $request->category_news_name;
                    $data['category_news_desc'] = $request->category_news_desc;
                    DB::table('categories')->where('cate_news_id',$id)->update($data);
                    Alert()->success('Cập nhật thành công !')->autoClose(1500);
                    return \redirect()->route('category.list-news');
                }
                public function remove_news($id){
                    $cate_news =  DB::table('categories')->where('cate_news_id',$id)->delete();
                    return response()->json($cate_news);
                }

                public function action_news(Request $request)
                {
                    if($request->ajax())
                    {
                        $output = '';
                        $query = $request->get('query');
                        if($query != '')
                        {
                            $data = DB::table('categories')
                                ->orWhere('category_news_name', 'like', '%'.$query.'%')
                                ->orWhere('category_news_desc', 'like', '%'.$query.'%')
                                ->orderBy('cate_news_id', 'desc')
                                ->get();
                        }
                        else
                        {
                            $data = DB::table('categories')
                                ->orderBy('cate_news_id', 'desc')
                                ->where('cate_news_id','!=',null)
                                ->get();
                        }
                        $total_row = $data->count();
                        if($total_row > 0)
                        {
                            foreach($data as $key => $row)
                            {
                                $output .= '
                    <tr id=item_'.$row->cate_news_id.'>
                    <td>'.++$key.'</td>
                     <td>'.$row->category_news_name.' </td>
                     <td>'.$row->category_news_desc.'</td>
                     <td><a href='.route('category.edit-news',$row->cate_news_id).'><button class="btn  btn-dark" type="submit">sửa</button></a>  <button id="delete"  data-id="'.$row->cate_news_id .'" class="btn  btn-danger delete" type="submit">xóa</button> </td>
                    </tr>
                    ';}
                        }
                        else
                        {
                            $output = '
                   <tr>
                    <td align="center" colspan="5">No Data Found</td>
                   </tr>
                   ';}
                        $data = array(
                            'table_data'  => $output,
                            'total_data'  => $total_row
                        );

                        echo json_encode($data);
                    }
                }




    //sub-category

                public function list_sub(){
                    $query = Category::where('sub_id','!=',null)
                        ->orderBy('sub_id','asc');
                    $bang = $query->with('categories')->get();
                    return view('admin.categories.subcategory.list',['list'=>$bang]);
                }
                public function add_sub(){
                    $cate_product = Category::where('cate_pro_id','!=',null)->get();
                    return view('admin.categories.subcategory.add',compact('cate_product'));
                }

                public function save_sub(ValidateFormSubcategory $request ){
                    $data = array();
                    $data['sub_id'] =  rand(0,1000);;
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
                        ->where('cate_pro_id','!=',null)
                        ->get();
                    $category = DB::table('categories')
                        ->where('sub_id',$id)->get();
                    return view('admin.categories.subcategory.edit',compact('cate_pro','category'));
                }
                public function update_sub(ValidateUpdateSubcategory $request,$id){

                    $data = array();
                    $data['parent_id'] = $request->cate_product;
                    $data['category_sub_product_name'] = $request->category_sub_product_name;
                    $data['category_sub_product_desc'] = $request->category_sub_product_desc;
                    DB::table('categories')->where('sub_id',$id)->update($data);
                    Alert()->success('Cập nhật thành công !')->autoClose(1500);
                    return \redirect()->route('subcategory.list');
                }

                public function remove_sub($id){
                     $cate_sub =   DB::table('categories')->where('sub_id',$id)->delete();
                    return response()->json($cate_sub);
    }
    public function action_sub(Request $request)
    {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            if($query != '')
            {
                $data =Category::with('categories')
                    ->orWhere('category_sub_product_name', 'like', '%'.$query.'%')
                    ->orWhere('category_sub_product_desc', 'like', '%'.$query.'%')
                    ->where('sub_id','!=',null)
                    ->orderBy('sub_id', 'desc')
                    ->get();
            }
            else
            {
                $data = Category::with('categories')
                    ->orderBy('sub_id', 'desc')
                    ->where('sub_id','!=',null)
                    ->get();
            }
            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach($data as $key => $row)
                {
                    $output .= '
                    <tr id=item_'.$row->sub_id.'>
                    <td>'.++$key.'</td>
                     <td>'.$row->category_sub_product_name.' </td>
                      <td>'.$row->categories->category_product_name.' </td>
                     <td>'.$row->category_sub_product_desc.'</td>
                     <td><a href='.route('subcategory.edit',$row->sub_id).'><button class="btn  btn-dark" type="submit">sửa</button></a>  <button id="delete"  data-id="'.$row->sub_id .'" class="btn  btn-danger delete" type="submit">xóa</button> </td>
                    </tr>
                    ';}
            }
            else
            {
                $output = '
                   <tr>
                    <td align="center" colspan="5">No Data Found</td>
                   </tr>
                   ';}
            $data = array(
                'table_data'  => $output,
                'total_data'  => $total_row
            );

            echo json_encode($data);
        }
    }

}
