<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SlideRequest extends FormRequest
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
            'txtName'=>'required',
            'txtNoiDung'=>'required',
            'fileHinh'=>'required',
            'txtLink' =>'required'
        ];
    }
    public function messages(){
        return[
            'txtName.required'=>'Chưa Nhập Tên Slide',
            'txtNoiDung.required'=>'Chưa Nhập Nội Dung',
            'fileHinh.required'=>'Chưa Chọn Hình Ảnh',
            'txtLink.required'=>'Chưa Nhập Link'
        ];
    }
}
