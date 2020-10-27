<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
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
}
