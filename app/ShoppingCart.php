<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    //
    protected $table = 'gio_hang';

    public function shoppingcartdetail(){
    	return $this->hasMany('App\ShoppingCartDetail','gio_hang_id');
    }
    public function user(){
    	return $this->belongsTo('App\Customer','nguoi_dung_id','id');
    }
}
