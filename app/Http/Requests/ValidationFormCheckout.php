<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidationFormCheckout extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'name'=>'required|min:8|max:50',
            'email'=>'required|email',
            'phone' => 'required|min:10|max:11|regex:[^[0-9\-\+]{9,15}$]',
            'address' => 'required',
            'city'=>'required',
            'district'=>'required',
            'name_receive'=> 'required|min:8|max:50',
            'phone_receive'=> 'required|min:10|max:11|regex:[^[0-9\-\+]{9,15}$]',
            'address_receive'=> 'required',
            'city_receive'=> 'required',
            'district_receive'=> 'required',

        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Tên không được để trống !',
            'name.min'=> 'Tên phải nhiều hơn 8 kí tự !',
            'name.max'=> 'Tên phải ít hơn 50 kí tự !',
            'email.required'=>'Email không được để trống',
            'email.email'=> 'Email không đúng định dạng (Ví dụ:example@gmail.com) !',
            'phone.required'=> 'Trống !',
            'phone.min'=> 'Số điện thoại không đúng !',
            'phone.max'=> 'Số điện thoại không đúng !',
            'phone.regex'=> 'Số điện thoại không đúng !',
            'address.required'=> 'Trống !',
            'city.required'=> 'Trống !',
            'district.required'=> 'Trống !',
            'name_receive.required'=>'Trống',
            'phone_receive.required'=> 'Số điện thoại không được để trống !',
            'phone_receive.min'=> 'Số điện thoại không đúng !',
            'phone_receive.max'=> 'Số điện thoại không đúng !',
            'phone_receive.regex'=> 'Số điện thoại không đúng !',
            'address_receive.required'=> 'Trống !',
            'city_receive.required'=> 'Trống !',
            'district_receive.required'=> 'Trống !'
        ];

    }
}
