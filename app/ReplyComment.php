<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReplyComment extends Model
{
    //
    public $table = 'tra_loi_binh_luan';

    public function binh_luan(){
    	return $this->belongsTo('App\Comment','binh_luan_id');
    }

    public function user(){
    	return $this->belongsTo('App\Customer','customers_id');
    }
}
