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
            'custom_name' => 'required',
            'custom_email' => 'required|email',
            'custom_address' => 'required',
            'custom_phone' => 'required',
            'custom_password' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'custom_name.required' => 'không được để trống ô này',
            'custom_email.required' => 'không được để trống ô này',
            'custom_email.email' => 'Cần nhập đúng định dạng email',
            'custom_address.required' => 'không được để trống ô này',
            'custom_phone.required' => 'không được để trống ô này',
            'custom_password.required' => 'không được để trống ô này',
        ];
    }
}
