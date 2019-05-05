<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class BookContent extends Model
{
    //
	protected $table = 'noi_dung_sach';

    public function bookdetail(){
    	return $this->hasMany('App\BookDetail','noi_dung_sach_id');
    }
    public function booktopic(){
    	return $this->belongsTo('App\BookTopic','chu_de_sach_id','id');
    }

    use Sluggable;
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'ten_noi_dung'
            ]
        ];
    }
}
