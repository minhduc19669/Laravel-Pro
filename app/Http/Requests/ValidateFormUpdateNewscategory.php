<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateFormUpdateNewscategory extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
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
