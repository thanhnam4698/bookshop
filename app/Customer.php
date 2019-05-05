<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use Notifiable;
    //
    protected $table = 'customers';

    public function shoppingcart(){
    	return $this->hasMany('App\ShoppingCart','nguoi_dung_id');
    }
    public function comment(){
    	return $this->hasMany('App\Comment','nguoi_dung_id');
    }

    public function rating(){
    	return $this->hasMany('App\Rating','nguoi_dung_id');
    }

    public function replycomment(){
        return $this->hasMany('App\ReplyComment','customers_id');
    }
}
