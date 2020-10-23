<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateFormOrder extends FormRequest
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
            'shipping_order' => 'required',
            'order_total' => 'required',
            'order_status' => 'required'
        ];
    }
    public function messages()
    {
        return [
          'shipping_order.required'  => 'không được phép để trống',
            'order_total.required'   => 'không được phép để trống',
            'order_status.required' => 'không được phép để trống'
        ];
    }
}
