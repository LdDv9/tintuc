<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DangKyRequest extends FormRequest
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
            'txtName'=>'required|min:3',
            'txtEmail'=>'required|email|unique:users,email',
            'txtPassword'=>'required|min:6|max:20',
            'txtRePassword'=>'required|same:txtPassword'
        ];
    }
    public function messages(){
        return[
            'txtName.required'=>'Chưa Nhập Tên Người Dùng',
            'txtName.min'=>'Tên Người Dùng Phải Nhiều Hơn 3 Ký Tự',

            'txtEmail.required'=>'Chưa Nhập Địa Chỉ Email',
            'txtEmail.email'=>'Địa Chỉ Email Không Hợp Lệ',
            'txtEmail.unique'=>'Địa Chỉ Email Đã Tồn Tại',

            'txtPassword.required' => 'Chưa Nhập Mật Khẩu',
            'txtPassword.min'=>'Mật Khẩu Phải Nhiều Hơn 6 Ký Tự',
            'txtPassword.max'=>'Mật Khẩu Phải Ít Hơn 20 Ký Tự',

            'txtRePassword.required'=>'Nhập Lại Mật Khẩu',
            'txtRePassword.same'=>'Mật Khẩu Nhập Lại Không Đúng'
        ];   

    }
}
