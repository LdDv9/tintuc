<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
	    protected $table = 'theloai';

    function loaitin(){
    	return $this->hasMany('App\LoaiTin','idTheLoai','id');
    }

    function tintuc(){
    	return $this->hasManyThrough('App\TinTuc','App\LoaiTin','idTheLoai','idLoaiTin','id');
    }
}
