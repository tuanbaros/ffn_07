<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    public function league_season()
    {
    	return $this->belongsTo('App\LeagueSeason');
    }

    public function team()
    {
    	return $this->belongsTo('App\Team');
    }

    public function player_awards()
    {
    	return $this->hasMany('App\PlayerAward');
    }

    public function match_players()
    {
    	return $this->hasMany('App\MatchPlayer');
    }
}
