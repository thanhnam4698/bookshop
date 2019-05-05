<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    //
    protected $table = "tac_gia";

    public function bookdetail(){
    	return $this->hasMany('App\chi_tiet_sach','tac_gia_id');
    }
}
