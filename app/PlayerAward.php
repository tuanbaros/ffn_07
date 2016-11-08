<?php

namespace App;

use App\Player;
use App\LeagueSeason;
use Illuminate\Database\Eloquent\Model;

class PlayerAward extends Model
{
    public function player()
    {
    	return $this->belongsTo(Player::class);
    }

    public function leagueSeason()
    {
    	return $this->belongsTo(LeagueSeason::class);
    }
}
