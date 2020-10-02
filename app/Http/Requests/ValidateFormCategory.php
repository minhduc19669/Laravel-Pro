<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateFormCategory extends FormRequest
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
            'category_product_name' => 'required|min:3',
            'category_product_desc' => 'required|min:5',
            'category_news_name' => 'required|min:3',
            'category_news_desc' => 'required|min:5',
        ];
    }
    public function messages()
    {
        return [
            'category_product_name.required' => 'Không được phép để trống',
            'category_product_name.min' => 'Phải nhập ít nhất 3 kí tự',
            'category_news_name.required' => 'Không được phép để trống',
            'category_news_name.min' => 'Phải nhập ít nhất 3 kí tự',
            'category_product_desc.required' => 'Không được phép để trống',
            'category_product_desc.min' => 'Phải nhập ít nhất 5 kí tự',
            'category_news_desc.required' => 'Không được phép để trống',
            'category_news_desc.min' => 'Phải nhập ít nhất 5 kí tự'

        ];
    }
}
