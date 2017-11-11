<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';
    function tintuc(){
    	return $this->belongsTo('App\TinTuc','idTinTuc','id');
    }
    function user(){
    	return $this->belongsTo('App\User','idUser','id');
    }
}
