<?php

namespace App;

use App\Comment;
use App\Category;
use App\Country;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public function comments()
    {
    	return $this->hasMany(Comment::class);
    }

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function country()
    {
    	return $this->belongsTo(Country::class);
    }

}
