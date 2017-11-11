<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TinTucRequest extends FormRequest
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
            'txtTieuDe' => 'required|min:5|max:50',
            'txtTomTat' => 'required|min:20|max:500',
            'txtNoiDung' => 'required|min:150',
            'fileHinh' => 'required'
        ];
    }
    public function messages(){
          return [
            'txtTieuDe.required' => 'Bạn Chưa Nhập Tiêu Đề',
            'txtTieuDe.min'=>'Tiêu Đề Phải Có Ít Nhất 5 Ký Tự',
            'txtTieuDe.max'=>'Tiêu Đề Chỉ Tối Đa 50 Ký Tự',

            'txtTomTat.required'=>'Bạn Chưa Nhập Nội Dung Tóm Tắt',
            'txtTomTat.min'=> 'Nội Dung Tóm Tắt Phải Chứa Ít Nhất 20 Ký Tự',
            'txtTomTat.max'=> 'Nội Dung Tóm Tắt Chỉ Chứa Tối Đa 500 Ký Tự',

            'txtNoiDung.required'=>'Bạn Chưa Nhập Nội Dung',
            'txtNoiDung.min'=>'Nội Dung Phải Chứa Ít Nhất 150 Ký Tự',
            
            'fileHinh.required' => 'Bạn Chưa Chọn Hình Ảnh'
        ];
    }
}
