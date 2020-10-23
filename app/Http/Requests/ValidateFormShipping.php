<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateFormShipping extends FormRequest
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
            "shipping_name" => "required|alpha|min:3",
            "shipping_phone" => "required|digits_between:10,11",
            "shipping_address" =>"required",
            "shipping_email" =>"required|email|unique:users,email",
            "shipping_name_receive" => "required|min:3",
            "shipping_phone_receive" => "required|digits_between:10,11",
            "shipping_address_receive" =>"required",
            "shipping_node" => 'required'

        ];

    }
    public function messages()
    {
        return [
                "shipping_name.required" => "Không được phép để trống",
               "shipping_name.min" => "Phải nhập ít nhất 3 kí tự",
               "shipping_name.alpha" => "Chỉ được phép nhập chữ cái",
               "shipping_phone.required" =>"Không được phép để trống",
               "shipping_phone.digits_between" =>"độ dài của số phải là 10->11",
               "shipping_address.required" => "Không được phép để trống",
               "shipping_address.regex" => "Cần nhập tên đường , thành phố, ",
               "shipping_email.required" => "Không được phép để trống",
                "shipping_email.email"    =>"Cần nhập đúng định dạng email",
                "shipping_name_receive.required" => "không được phép để trống",
                "shipping_name_receive.min" => "Phải nhập ít nhất 3 kí tự",
                "shipping_phone_receive.required" =>"Không được phép để trống",
                "shipping_phone_receive.digits_between" =>"Độ dài của số phải là 10->11",
                "shipping_address_receive.required" => "Không được phép để trống",
                "shipping_address_receive.regex" => "Cần nhập tên đường , thành phố, ",
                "shipping_node.required" => "Không được phép để trống"
        ];
    }
}
