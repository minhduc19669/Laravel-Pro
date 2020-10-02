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
