<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\ValidateFormAddNews;
use App\Http\Requests\ValidateFormUpdaateNews;
use App\News;
use App\Newscategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index(){
        $news = DB::table('news')
            ->join('categories','categories.cate_news_id','=','news.category_id')
            ->get();
        return view('admin.news.list',['news'=>$news]);
    }
    public function add(){
        $news_cate = Category::where('cate_news_id','!=',null)->get();
       return view('admin.news.add',compact('news_cate'));
    }
    public function save(ValidateFormAddNews $request){
        $data = array();
        $data['category_id'] = $request->news_cate;
        $data['news_title'] = $request->news_title;
        $data['news_content'] = $request->news_content;
        $data['news_desc'] = $request->news_desc;
        $data['news_view'] = $request->news_view;
        $data['news_date'] = $request->news_date;
        $data['news_status'] = $request->news_status;
        $get_image = $request->file('news_image');
        if ($get_image){
            $get_name_image = $get_image ->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image . rand(0,99) . '.' .$get_image->getClientOriginalExtension();
            $get_image->move('news',$new_image);
            $data['news_image']=$new_image;
            DB::table('news')->insert($data);
            Alert()->success('Thêm thành công !')->autoClose(1500);
            return \redirect()->route('news.list');
        }
        $data['product_image'] = '';
        DB::table('news')->insert($data);
        Alert()->success('Thêm thành công !')->autoClose(1500);
        return \redirect()->route('news.list');

    }
    public function edit($id){
        $news_cate = Category::where('cate_news_id','!=',null)->get();
        $news  = News::where('news_id',$id)->get();
        return view('admin.news.edit',compact('news_cate','news'));
    }
    public function update(ValidateFormUpdaateNews $request,$id){
        $data = array();
        $data['category_id'] = $request->news_cate;
        $data['news_title'] = $request->news_title;
        $data['news_content'] = $request->news_content;
        $data['news_desc'] = $request->news_desc;
        $data['news_view'] = $request->news_view;
        $data['news_date'] = $request->news_date;
        $data['news_status'] = $request->news_status;
        $get_image = $request->file('news_image');
        if ($get_image){
            $get_name_image = $get_image ->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image . rand(0,99) . '.' .$get_image->getClientOriginalExtension();
            $get_image->move('news',$new_image);
            $data['news_image']=$new_image;
            DB::table('news')->where('news_id',$id)->update($data);
            Alert()->success('Cập  nhật thành công !')->autoClose(1500);
            return \redirect()->route('news.list');
        }else {
            DB::table('news')->where('news_id',$id)->update($data);
            Alert()->success('Cập nhật thành công !')->autoClose(1500);
            return \redirect()->route('news.list');
        }
    }
    public function remove($id){
                DB::beginTransaction();
                $news = News::where('news_id',$id)->delete();
                DB::commit();
            return response()->json($news);
        }
    public function active($id){
        DB::beginTransaction();
        News::where('news_id',$id)->update(['news_status'=>0]);
        DB::commit();
        Alert()->success('Hủy kích hoạt thành công!')->autoClose(1500);
        return \redirect()->route('news.list');
    }
    public function unactive($id){
        DB::beginTransaction();
        News::where('news_id',$id)->update(['news_status'=>1]);
        DB::commit();
        Alert()->success('Kích hoạt thành công!')->autoClose(1500);
        return \redirect()->route('news.list');
    }
    public function action(Request $request)
    {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            if($query != '')
            {
                $data = DB::table('news')
                    ->join('categories','categories.cate_news_id','=','news.category_id')
                    ->orWhere('news_title', 'like', '%'.$query.'%')
                    ->orWhere('news_desc', 'like', '%'.$query.'%')
                    ->orderBy('news.news_id', 'desc')
                    ->get();
            }
            else
            {
                $data = DB::table('news')
                    ->join('categories','categories.cate_news_id','=','news.category_id')
                    ->orderBy('news.news_id', 'desc')
                    ->get();
            }
            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach($data as $key => $row)
                {
                    $output .= '
        <tr id=item_'.$row->news_id.'>
        <td style="font-size: 12px">'.++$key.'</td>
        <td style="font-size: 12px">'.$row->news_title.'</td>
        <td style="font-size: 12px">'.$row->category_news_name.'</td>
        <td style="font-size: 12px">'.$row->news_content.'</td>
        <td style="font-size: 12px"><img width="50px" src=" /news/'.$row->news_image.' " alt=""></td>
         <td style="font-size: 12px">'.$row->news_desc.'</td>
        <td style="font-size: 12px">'.$row->news_date.'</td>
         ';
                    if ($row->news_status == 0) {
                        $output .= '
         <td><a href='.route('news.un-active',$row->news_id).'><button style="font-size: 12px" id="unactive" data-id="'.$row->news_id.'"  class="btn btn-danger"> Ẩn </button></a></td>
';
                    }else{
                        $output .= '
         <td><a href='.route('news.active',$row->news_id).'><button style="font-size: 12px" class="btn btn-primary">Hiện</button></a></td>
';
                    }
                    $output .= '
         <td><a href='.route('news.edit',$row->news_id).'><button style="font-size: 12px" class="btn  btn-dark" type="submit">sửa</button></a>
         <button style="font-size: 12px" id="delete"  data-id="'.$row->news_id .'" class="btn  btn-danger delete" type="submit">xóa</button> </td>
        </tr>
        ';
                }
            }
            else
            {
                $output = '
       <tr>
        <td align="center" colspan="9">No Data Found</td>
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
