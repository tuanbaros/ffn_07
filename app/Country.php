<?php

namespace App;

use App\News;
use App\League;
use App\Player;
use App\Team;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function news()
    {
    	return $this->hasMany(News::class);
    }

    public function leagues()
    {
    	return $this->hasMany(League::class);
    }

    public function players()
    {
    	return $this->hasMany(Player::class);
    }

    public function teams()
    {
    	return $this->hasMany(Team::class);
    }
}
