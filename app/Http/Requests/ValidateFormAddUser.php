<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class ValidateFormAddUser extends FormRequest{

    public function authorize()
    {
        return true;
    }
    public function rules(){
        return [
            'username'=>'required|min:8',
            'email' => 'unique:users,email,' . $this->id,
            'phone'=>'required|min:10|max:11|regex:[^[0-9\-\+]{9,15}$]',
            'address'=>'required',
            'password' => 'required|min:6|max:32|regex:[^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$]',

		];
    }
    public function messages()
    {
        return [
            'username.required'=>'Tên không được để trống',
            'username.min'=>'Tên phải dài tối thiểu 8 kí tự',
            'email.required' => 'Email không được để trống!',
            'email.email' => 'Email sai định dạng! Ví dụ: abc@gmail.com',
            'email.unique'=>'Email da duoc su dung',
            'phone.required' => 'Số điện thoại không được để trống',
            'phone.min' => 'Số điện thoại không được ít hơn 10 số',
            'phone.max' => 'Số điện thoại không được nhiều hơn 11 số',
            'phone.regex'=>'Số điện thoại không đúng định dạng',
            'address.required'=>'Địa chỉ không được để trống',
            'password.required' => 'Mật khẩu không được để trống!',
            'password.min' => 'Mật khẩu phải dài hơn 6 ký tự.',
            'password.max' => 'Mật khẩu phải không được vượt quá 32 ký tự.',
            'password.regex' => 'Mật khẩu là có chữ và số (Không có ký tự đặc biệt!)',
        ];
    }
}
