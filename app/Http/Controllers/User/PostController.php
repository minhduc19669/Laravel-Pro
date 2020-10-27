<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class PostController extends Controller
{
    //
    public function post(Request $request){
        $validator=Validator::make($request->all(),[
            'message'=>'required',
            'rating'=>'required',
            'product_id'=>'required',
        ],
        [
                'message.required'=> 'Mời bạn đánh giá sản phẩm.(Tối thiểu 5 ký tự)',
                'rating.required'=> 'Vui lòng chọn đánh giá của bạn về sản phẩm này.'
        ]

    );
        if ($validator->passes()) {
            $post = new Post();
            $post->fill([
                'content' => $request->message,
                'rating' => $request->rating,
                'customer_id' => Session::get('customer')->id,
                'id_product' => $request->product_id
            ]);
            $post->save();
            $name= $post->customer->customer_name;
            return \response()->json([
                'post'=>$post,
                'name'=>$name
            ]);
        }
        return response()->json(['error' => $validator->errors()->all()]);
    }
    //admin
    public function list(){
        return view('admin.comment.list');
    }
    public function action(Request $request)
    {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            if($query != '')
            {
                $data = Post::with('Customer')
                    ->join('customers','customers.id','posts.customer_id')
                    ->orWhere('customer_name', 'like', '%'.$query.'%')
                    ->orderBy('posts.id', 'desc')
                    ->get();
            }
            else
            {
                $data = Post::with('Customer')
                    ->orderBy('id', 'desc')
                    ->get();
            }
            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach($data as $key => $row)
                {
                    $output .= '
                    <tr id=item_'.$row->id.'>
                    <td>'.++$key.'</td>
                     <td>'.$row->Customer->customer_name.' </td>
                     <td>'.$row->content.'</td>
                     <td><a href="'.route('comment.edit',$row->id).'"><button class="btn  btn-dark" type="submit">Chi tiết</button></a> </td>
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
//detail comment
    public function edit($id){
     $comment = Post::where('id',$id)->with('Customer')->with('Product')->get();
        return view('admin.comment.edit',compact('comment'));
    }
    public function delete($id){
        Post::find($id)->delete();
        Alert()->success('Xóa thành công !')->autoClose(1500);
        return \redirect()->route('comment.list');
    }

}
