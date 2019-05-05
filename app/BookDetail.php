<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Laravel\Scout\Searchable;


class BookDetail extends Model
{
    //
    use Sluggable;
    use Searchable;

    protected $table = "chi_tiet_sach";
    public function tac_gia(){
    	return $this->belongsTo('App\Author','tac_gia_id','id');
    }
    public function noi_dung(){
    	return $this->belongsTo('App\BookContent','noi_dung_sach_id','id');
    }
    public function chu_de(){
        return $this->belongsTo('App\BookTopic','chu_de_sach_id','id');
    }
    public function loai_sach(){
        return $this->belongsTo('App\Booktype','loai_sach_id','id');
    }
    public function nha_xb(){
    	return $this->belongsTo('App\Publisher','nha_xb_id','id');
    }
    public function binh_luan(){
    	return $this->hasMany('App\Comment','chi_tiet_sach_id');
    }
    public function gio_hang_chi_tiet(){
    	return $this->hasMany('App\ShoppingCartDetail','chi_tiet_sach_id');
    }
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'ten_sach'
            ]
        ];
    }
    public function rating(){
        return $this->hasMany('App\Rating','chi_tiet_sach_id');
    }
    public function slider(){
        return $this->hasMany('App\Slider','chi_tiet_sach_id');
    }
}
