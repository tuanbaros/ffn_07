<?php

namespace App;

use App\Match;
use App\Player;
use Illuminate\Database\Eloquent\Model;

class MatchPlayer extends Model
{
    public function match()
    {
    	return $this->belongsTo(Match::class);
    }

    public function player()
    {
    	return $this->belongsTo(Player::class);
    }
}
