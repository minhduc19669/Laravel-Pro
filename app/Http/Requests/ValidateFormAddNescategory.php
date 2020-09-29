<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateFormAddNescategory extends FormRequest{
    public function authorize()
    {
        return true;
    }
public function rules(){
    return [
        'news_cate_title' => 'required',
        'news_cate_desc'  => 'required',
        'news_cate_status' => 'required',
    ];
}
public function messages()
{
    return [
      'news_cate_title.required'  => 'Bạn cần nhập tiêu đề danh mục tin tức',
        'news_cate_desc.required'  => 'Bạn cần nhập ghi chú danh mục tin tức',
        'news_cate_status.required'  => 'Bạn cần nhập trạng thái danh mục tin tức',

    ];
}


}
