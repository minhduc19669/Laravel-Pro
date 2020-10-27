<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateFormTransprot extends FormRequest
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
            'city_receive' => 'required',
            'district_receive' => 'required',
            'fee' => 'required|numeric|min:0'
        ];
    }
    public function messages()
    {
        return [
            'city_receive.required' => 'Không được để trống trường này !',
            'district_receive.required' => 'Không được để trống trường này !',
            'fee.required' => 'Không được để trống trường này !',
            'fee.numeric' => 'Cần phải nhập số !',
            'fee.min' => 'Số nhỏ nhất là 0'


        ];
    }
}
