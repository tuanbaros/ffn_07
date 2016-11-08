<?php

namespace App;

use App\User;
use App\News;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function news()
    {
    	return $this->belongsTo(News::class);
    }
}
