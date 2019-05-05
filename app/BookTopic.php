<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class BookTopic extends Model
{
    //

	protected $table = 'chu_de_sach';

    public function bookcontent(){
    	return $this->hasMany('App\BookContent','chu_de_sach_id');
    }
    public function booktype(){
    	return $this->belongsTo('App\BookType','loai_sach_id','id');
    }
    public function bookdetail(){
    	return $this->hasMany('App\BookDetail','chu_de_sach_id');
    }

    use Sluggable;
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'ten_chu_de'
            ]
        ];
    }
}
