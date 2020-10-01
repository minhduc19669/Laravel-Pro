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
            'news_title' => 'required',
            'news_cate' => 'required',
            'news_content' => 'required',
            'news_desc' => 'required',
            'news_date' => 'required',
            'news_view' => 'required',
            'news_image' => 'required|image',
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
            'news_image.required' => 'Không được phép để trống',
            'news_image.image' => 'Cần nhập đúng định dạng ảnh',
            'news_status.required' => 'Không được phép để trống',
        ];
    }


}
