<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    //
    protected $table = 'danh_gia_sach';

	public function bookdetail(){
		return $this->belongsTo('App\BookDetail','chi_tiet_sach_id','id');
	}

	public function customers(){
		return $this->belongsTo('App\Customer','customers_id','id');
	}
}
