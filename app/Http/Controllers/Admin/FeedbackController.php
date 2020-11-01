<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\Http\Requests\ValidateFormFeedback;
use App\Http\Requests\ValidateFormFeedBackUpdate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FeedbackController extends Controller
{
    public function save(ValidateFormFeedback $request){
     DB::table('feedback')->insert([
          'name' => $request->name,
           'email' =>$request->email,
           'title' =>$request->title,
           'content' =>$request->content,
           'status' =>'0'
       ]);
        Alert()->success('Gửi liên hệ thành công')->autoClose(1500);
        return \redirect()->route('page.contact');
    }
    public function list(){
      $feedback = Feedback::all();
        return view('admin.feedback.list',compact('feedback'));
    }
    public function delete($id){

        $feedback = Feedback::where('id',$id)->delete();

        return response()->json($feedback);

    }
    public function edit($id){
        $feedback = Feedback::where('id',$id)->get();
        return view('admin.feedback.edit',compact('feedback'));
    }
    public function update(Request $request,$id){
        DB::beginTransaction();
      Feedback::where('id',$id)->update([
           'status' => $request->status,
      ]);
      DB::commit();
        Alert()->success('Cập nhật trạng thái thành công')->autoClose(1500);
        return \redirect()->route('feedback.list');
    }
    public function search(Request $request){
        if ($request->ajax()){
      $output  = "";
      $feedback = Feedback::orWhere('name', 'like', '%'.$request->search.'%')
          ->orWhere('email', 'like', '%'.$request->search.'%')
          ->get();
       if ($feedback){
           foreach($feedback as $key => $row)
           {

               $output .= '
        <tr role="row" class="odd" id=item_' . $row->id . '>
        <td class="" tabindex="0">' . ++$key . '</td>
        <td class="sorting_1">' . $row->name . '</td>
        <td >' . $row->email . '</td >
         <td>' . $row->title . '</td>
         <td>' . $row->content . '</td>
         ';

               if ($row->status == 0) {
                   $output .= '
                     <td>Chưa trả lời</td>
';
               }else{
                   $output .= '
                    <td>Đã trả lời</td>
';
               }
               $output .= '
         <td><a href=><button class="btn  btn-dark" type="submit">sửa</button></a>  <button  id="delete"  data-id="'.$row->id .'" class="btn  btn-danger delete" type="submit">xóa</button> </td>
        </tr>
        ';
           }
       }
            return Response($output);
       }
    }
    public function addSale(ValidateFormFeedBackUpdate $request){
        DB::table('feedback')->insert([
            'name' => 'Người nhận khuyến mãi',
            'email' =>$request->email1,
            'title' =>'Nhận thông tin khuyến mãi',
            'content' =>'Nhận tất cả các thông tin khuyến mãi từ cửa hàng',
            'status' =>'0'
        ]);
        Alert()->success('Gửi liên hệ thành công')->autoClose(1500);
            return \redirect()->route('page.contact');
    }

}
