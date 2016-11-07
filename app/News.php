<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public function comments()
    {
    	return $this->hasMany('App\Comment');
    }

    public function category()
    {
    	return $this->belongsTo('App\Category', 'cate_id');
    }

    public function country()
    {
    	return $this->belongsTo('App\Country');
    }

}
