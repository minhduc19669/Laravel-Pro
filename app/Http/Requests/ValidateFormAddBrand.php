<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateFormAddBrand extends FormRequest
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
            'brand_name' => 'required|min:3',
            'brand_image' => 'mimes:jpeg,jpg,png|required',
            'brand_desc' => 'required',
            'brand_status' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'brand_name.min' => 'Nhập tối thiểu 3 kí tự',
            'brand_name.required' => 'Không được phép để trống',
            'brand_image.required' => 'Không được phép để trống',
            'brand_image.mimes' => 'Chỉ được phép thêm file jpg,png,jpeg',
            'brand_desc.required' => 'Không được phép để trống',
            'brand_status.required' => 'Không được phép để trống',
        ];
    }
}
