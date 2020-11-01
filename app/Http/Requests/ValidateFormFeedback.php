<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateFormFeedback extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email',
            'title' => 'required',
            'content' =>'required'
        ];
    }
    public function  messages()
    {
        return [
          'name.required' =>'không được phép để trống!',
            'email.required' =>'không được phép để trống!',
            'email.email' =>'Bạn cần nhập định dạng email',
            'title.required' =>'không được phép để trống!',
             'content.required' =>'không được phép để trống!',
        ];
    }
}
