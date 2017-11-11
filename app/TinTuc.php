<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TinTuc extends Model
{
    protected $table = 'tintuc';
    function loaitin(){
    	return $this->belongsTo('App\LoaiTin','idLoaiTin','id');
    }
    function comment(){
    	return $this->hasMany('App\Comment','idTinTuc','id');
    }
}
