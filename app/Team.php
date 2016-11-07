<?php

namespace App;

use App\Country;
use App\Rank;
use App\Player;
use App\Match;
use App\TeamAchievement;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public function country()
    {
    	return $this->belongsTo(Country::class);
    }

    public function ranks()
    {
    	return $this->hasMany(Rank::class);
    }

    public function players()
    {
    	return $this->hasMany(Player::class);
    }

    public function matchs()
    {
    	return $this->hasMany(Match::class);
    }

    public function teamAchievements()
    {
    	return $this->hasMany(TeamAchievement::class);
    }
}
