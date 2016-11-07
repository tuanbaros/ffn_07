<?php

namespace App;

use App\Team;
use App\LeagueSeason;
use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    public function team()
    {
    	return $this->belongsTo(Team::class);
    }

    public function leagueSeason()
    {
    	return $this->belongsTo(LeagueSeason::class);
    }
}
