<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    //
    public $table = 'slider';

    public function bookdetail(){
    	$this->belongsTo('App\BookDetail','chi_tiet_sach_id','id');
    }
}
