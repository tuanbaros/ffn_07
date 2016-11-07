<?php

namespace App;

use App\LeagueSeason;
use App\Team;
use App\PlayerAward;
use App\MatchPlayer;
use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    public function leagueSeason()
    {
    	return $this->belongsTo(LeagueSeason::class);
    }

    public function team()
    {
    	return $this->belongsTo(Team::class);
    }

    public function playerAwards()
    {
    	return $this->hasMany(PlayerAward::class);
    }

    public function matchPlayers()
    {
    	return $this->hasMany(MatchPlayer::class);
    }
}
