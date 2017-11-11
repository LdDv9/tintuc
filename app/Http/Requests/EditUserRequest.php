<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */



    public function rules(){
        return [
            'txtName' => 'required',
            'txtEmail'=>'required|email'
        ];
    }
    public function messages(){
        return[
            'txtEmail.required'=>'Chưa Nhập Email',
            'txtEmail.email'=>'Địa Chỉ Email Sai Định Dạng',
            'txtName.required'=>'Chưa Nhập Tên'

        ];
    }
}
