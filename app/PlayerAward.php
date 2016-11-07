<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayerAward extends Model
{
    public function player()
    {
    	return $this->belongsTo('App\Player');
    }

    public function league_season()
    {
    	return $this->belongsTo('App\LeagueSeason');
    }
}
