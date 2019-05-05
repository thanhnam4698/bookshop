<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Booktype extends Model
{
    //
    protected $table = 'loai_sach';

    public function booktopic(){
    	return $this->hasMany('App\BookTopic','loai_sach_id');
    }
    public function bookdetail(){
    	return $this->hasMany('App\BookDetail','loai_sach_id');
    }
    
    use Sluggable;
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'ten_loai'
            ]
        ];
    }
}
