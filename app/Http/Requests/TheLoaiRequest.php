<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TheLoaiRequest extends FormRequest
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
            'txtName'=>'required|min:3|max:50',
            
        ];
    }
    public function messages(){
        return [
            'txtName.required'=>'Chưa Nhập Tên Thể Loại',
            'txtName.min'=>'Tên Thể Loại Phải Tối Thiểu 3 Ký Tự',
            'txtName.max'=>'Tên Thể Loại Chỉ Tối Đa 50 Ký Tự',
            //khong dau
            
        ];
    }
}
