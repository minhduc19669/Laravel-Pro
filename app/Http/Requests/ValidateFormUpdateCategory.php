<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateFormUpdateCategory extends FormRequest
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
        ];
    }
    public function messages()
    {
        return [
            'cate_pro_id.required' => 'Không được phép để trống' ,
            'cate_pro_id.unique' => 'ID đã tồn tại' ,
            'cate_pro_id.numeric' => 'Mã sản phẩm phải là số' ,
            'cate_pro_id.min' => 'Số nhỏ nhất phải là 1' ,
            'cate_pro_id.max' => 'Số lớn nhất phải là 200' ,
            'category_product_name.unique'=> 'Tên danh mục đã tồn tại',
            'category_product_name.required' => 'Không được phép để trống',
            'category_product_name.min' => 'Phải nhập ít nhất 3 kí tự',
            'category_product_desc.required' => 'Không được phép để trống',
            'category_product_desc.min' => 'Phải nhập ít nhất 5 kí tự',

        ];
    }
}
