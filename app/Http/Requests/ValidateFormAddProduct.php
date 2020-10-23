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
            'product_name' => 'required|unique:products,product_name|min:3',
            'product_price' =>'required|numeric|min:1000',
            'product_price_sale'=>'required|numeric|min:0',
            'product_content'=> 'required',
            'product_desc' => 'required',
            'product_status' => 'required',
            'product_brand' => 'required',
            'product_cate' => 'required',
            'product_image' => 'required|max:10240',

        ];
    }
    public function messages()
    {
        return[
            'product_code.unique'    => 'Mã sản phẩm đã tồn tại',
            'product_name.unique'    => 'Tên sản phẩm đã tồn tại',
            'product_name.required' => 'Không được phép để trống',
            'product_code.required' => 'Không được phép để trống',
            'product_price.required' => 'Không được phép để trống',
            'product_price.min' => 'Giá trị nhỏ nhất là 1000',
            'product_price_sale.required' => 'Không được phép để trống',
            'product_price_sale.min' => 'Giá trị nhỏ nhất là 0',
            'product_content.required' => 'Không được phép để trống',
            'product_desc.required' => 'Không được phép để trống',
            'product_status.required' => 'Không được phép để trống',
            'product_brand.required' => 'Không được phép để trống',
            'product_cate.required' => 'Không được phép để trống',
            'product_image.required' => 'Không được phép để trống',
            'product_image.max' => 'Dung lượng ảnh tối đa là 10Mb',
        ];
    }
}
