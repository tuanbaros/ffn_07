<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    public function country()
    {
    	return $this->belongsTo('App\Country');
    }

    public function team()
    {
    	return $this->belongsTo('App\Team');
    }

    public function match_players()
    {
    	return $this->hasMany('App\MatchPlayer');
    }

    public function player_awards()
    {
    	return $this->hasMany('App\PlayerAward');
    }
}
