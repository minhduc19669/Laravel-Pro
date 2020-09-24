<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class ValidateFormUpdateUser extends FormRequest{


    public function authorize(){
        return true;
    }
    public function rules(){
        return [
            'name'=>'required|min:8',
            // 'email' => 'required|email',
            'phone'=>'required|min:10|max:11|regex:[^[0-9\-\+]{9,15}$]',
            'address'=>'required'
            // 'password' => 'required|min:6|max:32|regex:[^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$]'
        ];
    }
}
