<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatchPlayer extends Model
{
    public function match()
    {
    	return $this->belongsTo('App\Match');
    }

    public function player()
    {
    	return $this->belongsTo('App\Player');
    }
}
