<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestResetPassword extends FormRequest
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
            'password' => 'required|min:6|max:32|regex:[^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$]',
            'confirm_password' => 'required|same:password'
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu không được ít hơn 6 ký tự',
            'password.max' => 'Mật khẩu không được quá hơn 12 ký tự',
            'password.regex' => 'Mật khẩu phải có chữ và số (Không có ký tự đặc biệt!)',
            'confirm_password.required' => 'Bắt buộc nhập lại mật khẩu mới!',
            'confirm_password.same' => 'Mật khẩu nhập lại không đúng!'
        ];
    }
}
