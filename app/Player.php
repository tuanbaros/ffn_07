<?php

namespace App;

use App\Country;
use App\Team;
use App\MatchPlayer;
use App\PlayerAward;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    public function country()
    {
    	return $this->belongsTo(Country::class);
    }

    public function team()
    {
    	return $this->belongsTo(Team::class);
    }

    public function matchPlayers()
    {
    	return $this->hasMany(MatchPlayer::class);
    }

    public function playerAwards()
    {
    	return $this->hasMany(PlayerAward::class);
    }
}
