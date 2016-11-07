<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeagueSeason extends Model
{
    public function league()
    {
    	return $this->belongsTo('App\League');
    }

    public function ranks()
    {
    	return $this->hasMany('App\Rank');
    }

    public function team_achievements()
    {
    	return $this->hasMany('App\TeamAchievement');
    }

    public function matchs()
    {
    	return $this->hasMany('App\Match');
    }

    public function player_awards()
    {
    	return $this->hasMany('App\PlayerAward');
    }
}
