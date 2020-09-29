<?php

namespace App\Http\Controllers;

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
            ->join('news_categories','news_categories.id','=','news.news_cate_id')
            ->get();
        return view('admin.news.list',['news'=>$news]);
    }
    public function add(){
        $news_cate = Newscategory::all();
       return view('admin.news.add',compact('news_cate'));
    }
    public function save(ValidateFormAddNews $request){
        $data = array();
        $data['news_cate_id'] = $request->news_cate;
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
        $news_cate = Newscategory::all();
        $news  = News::where('news_id',$id)->get();
        return view('admin.news.edit',compact('news_cate','news'));
    }
    public function update(ValidateFormUpdaateNews $request,$id){
        $data = array();
        $data['news_cate_id'] = $request->news_cate;
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
            Alert()->success('sửa  thành công !')->autoClose(1500);
            return \redirect()->route('news.list');
        }else {
            DB::table('news')->where('news_id',$id)->update($data);
            Alert()->success('sửa thành công !')->autoClose(1500);
            return \redirect()->route('news.list');
        }
    }
public function remove($id){
          DB::beginTransaction();
          News::where('news_id',$id)->delete();
          DB::commit();
    Alert()->success('Xóa thành công !')->autoClose(1500);

    return \redirect()->route('news.list');
}
    public function active($id){
        DB::beginTransaction();
        News::where('news_id',$id)->update(['news_status'=>0]);
        DB::commit();
        Alert()->success('hủy kích hoạt thành công!')->autoClose(1500);
        return \redirect()->route('news.list');
    }
    public function unactive($id){
        DB::beginTransaction();
        News::where('news_id',$id)->update(['news_status'=>1]);
        DB::commit();
        Alert()->success('kích hoạt thành công!')->autoClose(1500);
        return \redirect()->route('news.list');
    }



}
