<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateFormAddCustom extends FormRequest
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
            'customer_name' => 'required',
            'customer_email' => 'required|email',
            'customer_address' => 'required',
            'customer_phone' => 'required',
            'customer_password' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'customer_name.required' => 'không được để trống ô này',
            'customer_email.required' => 'không được để trống ô này',
            'customer_email.email' => 'Cần nhập đúng định dạng email',
            'customer_address.required' => 'không được để trống ô này',
            'customer_phone.required' => 'không được để trống ô này',
            'customer_password.required' => 'không được để trống ô này',
        ];
    }
}
