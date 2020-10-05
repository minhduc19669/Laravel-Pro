<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateFormAddProduct extends FormRequest
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
            'product_name' => 'required|min:3',
            'product_code' => 'required|min:3',
            'product_price' =>'required',
            'product_price_sale'=>'required|min:0',
            'product_content'=> 'required|min:8',
            'product_desc' => 'required|min:5',
            'product_image' => 'required|image',
            'product_status' => 'required',
            'product_brand' => 'required',
            'product_cate' => 'required',
        ];
    }
    public function messages()
    {
        return[
            'product_name.required' => 'Không được phép để trống',
            'product_code.required' => 'Không được phép để trống',
            'product_price.required' => 'Không được phép để trống',
            'product_price_sale.required' => 'Không được phép để trống',
            'product_content.required' => 'Không được phép để trống',
            'product_desc.required' => 'Không được phép để trống',
            'product_image.required' => 'Không được phép để trống',
            'product_image.image' => 'Cần nhập đúng định dạng ảnh',
            'product_status.required' => 'Không được phép để trống',
            'product_brand.required' => 'Không được phép để trống',
            'product_cate.required' => 'Không được phép để trống',
        ];
    }
}
