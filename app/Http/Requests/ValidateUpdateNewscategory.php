<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateUpdateNewscategory extends FormRequest
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
            'cate_news_id' => 'required|numeric|min:1|max:200',
            'category_news_name' => 'required|min:3',
            'category_news_desc' => 'required|min:5',
        ];
    }

    public function messages()
    {
        return [
            'category_news_name.unique' => 'Tên danh mục đã tồn tại',
            'cate_news_id.required' => 'Không được phép để trống' ,
            'cate_news_id.unique' => 'ID đã tồn tại' ,
            'cate_news_id.numeric' => 'Mã sản phẩm phải là số' ,
            'cate_news_id.min' => 'Số nhỏ nhất phải là 1' ,
            'cate_news_id.max' => 'Số lớn nhất phải là 200' ,
            'category_news_name.required' => 'Không được phép để trống',
            'category_news_name.min' => 'Phải nhập ít nhất 3 kí tự',
            'category_news_desc.required' => 'Không được phép để trống',
            'category_news_desc.min' => 'Phải nhập ít nhất 5 kí tự'

        ];
    }
}
