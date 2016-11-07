<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    public function country()
    {
    	return $this->belongsTo('App\Country');
    }

    public function league_seasons()
    {
    	return $this->hasMany('App\LeagueSeason');
    }
}
