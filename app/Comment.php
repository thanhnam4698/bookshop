<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table = "binh_luan";

    public function bookdetail(){
    	return $this->belongsTo('App\BookDetail','chi_tiet_sach_id','id');
    }
    public function user(){
    	return $this->belongsTo('App\Customer','nguoi_dung_id','id');
    }
    public function replycomment(){
    	return $this->hasMany('App\ReplyComment','binh_luan_id');
    }
}
