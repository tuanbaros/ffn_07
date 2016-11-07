<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    public function team()
    {
    	return $this->belongsTo('App\Team');
    }

    public function league_season()
    {
    	return $this->belongsTo('App\LeagueSeason');
    }
}
