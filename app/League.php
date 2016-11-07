<?php

namespace App;

use App\Country;
use App\LeagueSeason;
use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    public function country()
    {
    	return $this->belongsTo(Country::class);
    }

    public function leagueSeasons()
    {
    	return $this->hasMany(LeagueSeason::class);
    }
}
