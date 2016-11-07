<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function news()
    {
    	return $this->hasMany('App\News');
    }

    public function leagues()
    {
    	return $this->hasMany('App\League');
    }

    public function players()
    {
    	return $this->hasMany('App\Player');
    }

    public function teams()
    {
    	return $this->hasMany('App\Team');
    }
}
