<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateFormAddNews extends FormRequest
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
            'news_title' => 'required|unique:news,news_title|min:3',
            'news_cate' => 'required',
            'news_content' => 'required|min:8',
            'news_desc' => 'required|min:5',
            'news_date' => 'required',
            'news_view' => 'required|numeric|min:0|max:100',
            'news_image' => 'mimes:jpeg,jpg,png|required',
            'news_status' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'news_title.unique'  => 'Tiêu đề đã được sử dụng',
            'news_title.required' => 'Không được phép để trống ',
            'news_title.min' => 'Phải nhập ít nhất 3 kí tự',
            'news_cate.required' => 'Không được phép để trống',
            'news_content.required' => 'Không được phép để trống',
            'news_content.min' => 'Phải nhập ít nhất 8 kí tự',
            'news_desc.required' => 'Không được phép để trống',
            'news_desc.min' => 'Phải nhập ít nhất 5 kí tự',
            'news_date.required' => 'Không được phép để trống',
            'news_view.required' => 'Không được phép để trống',
            'news_view.min' => 'Kí tự  nhỏ nhất là 0',
            'news_view.max' => 'Kí tự lớn nhất là 100',
            'news_image.required' => 'Không được phép để trống',
            'news_image.mimes' => 'Chỉ được phép thêm file jpg,png,jpeg',
            'news_status.required' => 'Không được phép để trống',
        ];
    }


}
