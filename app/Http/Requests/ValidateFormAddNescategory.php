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
      'news_cate_title.required'  => 'Không được phép để trống',
        'news_cate_desc.required'  => 'Không được phép để trống',
        'news_cate_status.required'  => 'Không được phép để trống',

    ];
}


}
