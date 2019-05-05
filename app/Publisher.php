<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    //
    protected $table = 'nha_xb';

    public function bookdetail(){
    	return $this->hasMany('App\BookDetail','nha_xb_id');
    }
}
