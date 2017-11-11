<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiTin extends Model
{
    protected $table = 'loaitin';
    function theloai(){
    	return $this->belongsTo('App\TheLoai','idTheLoai','id');
    }
    function tintuc(){
    	return $this->hasMany('App\TinTuc','idLoaiTin','id');
    }
}
