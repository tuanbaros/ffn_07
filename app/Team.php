<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public function country()
    {
    	return $this->belongsTo('App\Country');
    }

    public function ranks()
    {
    	return $this->hasMany('App\Rank');
    }

    public function players()
    {
    	return $this->hasMany('App\Player');
    }

    public function matchs()
    {
    	return $this->hasMany('App\Match');
    }

    public function team_achievements()
    {
    	return $this->hasMany('App\TeamAchievement');
    }
}
