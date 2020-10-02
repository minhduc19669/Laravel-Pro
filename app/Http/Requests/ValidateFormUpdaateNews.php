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
            'news_title.required' => 'Không được phép để trống ',
            'news_cate.required' => 'Không được phép để trống',
            'news_content.required' => 'Không được phép để trống',
            'news_desc.required' => 'Không được phép để trống',
            'news_date.required' => 'Không được phép để trống',
            'news_views.required' => 'Không được phép để trống',
            'news_status.required' => 'Không được phép để trống',
        ];
    }
}
