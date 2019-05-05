<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCartDetail extends Model
{
    //
    protected $table = 'gio_hang_chi_tiet';

    public function bookdetail(){
    	return $this->belongsTo('App\BookDetail','chi_tiet_sach_id','id');
    }

    public function shoppingcart(){
    	return $this->belongsTo('App\ShoppingCart','gio_hang_id');
    }
}
