<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class ValidateFormAddPosition extends FormRequest{


    public function authorize(){
        return true;
    }
    public function rules(){
        return [
            'position'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'position.required'=>'Khong duoc de trong truong nay'
        ];
    }
}
