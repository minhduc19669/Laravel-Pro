<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateFormUpdaateNews extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'news_title' => 'required',
            'news_cate' => 'required',
            'news_content' => 'required',
            'news_desc' => 'required',
            'news_date' => 'required',
            'news_view' => 'required',
            'news_status' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'news_title.required' => 'Cần nhập tiêu đề ',
            'news_cate.required' => 'Cần nhập danh mục tin tức',
            'news_content.required' => 'Cần nhập nội dung',
            'news_desc.required' => 'Cần nhập ghi chú',
            'news_date.required' => 'Cần nhập ngày đăng tin tức',
            'news_views.required' => 'Cần nhập lượt xem',
            'news_status.required' => 'Cần nhập trạng thái vào',
        ];
    }
}
