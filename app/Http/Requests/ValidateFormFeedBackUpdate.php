<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateFormFeedBackUpdate extends FormRequest
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
            'email1' => 'required|email',

        ];
    }
    public function  messages()
    {
        return [
            'email1.required' =>'không được phép để trống!',
            'email1.email' =>'Bạn cần nhập định dạng email',

        ];
    }
}
