<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateFormSubcategory extends FormRequest
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
            'sub_id' => 'required|unique:categories,sub_id|numeric|min:1|max:200',
            'category_sub_product_name' => 'required',
            'category_sub_product_desc' => 'required|min:5',
        ];
    }
    public function messages()
    {
        return [

            'category_sub_product_name.unique' => 'Tên danh mục đã tồn tại',
            'sub_id.required' => 'Không được phép để trống' ,
            'sub_id.unique' => 'ID đã tồn tại' ,
            'sub_id.numeric' => 'Mã sản phẩm phải là số' ,
            'sub_id.min' => 'Số nhỏ nhất phải là 1' ,
            'sub_id.max' => 'Số lớn nhất phải là 200' ,
            'category_sub_product_name.required' => 'Không được phép để trống',
            'category_sub_product_name.min' => 'Phải nhập ít nhất 3 kí tự',
            'category_sub_product_desc.required' => 'Không được phép để trống',
            'category_sub_product_desc.min' => 'Phải nhập ít nhất 5 kí tự',

        ];
    }
}
