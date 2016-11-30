<?php

namespace App;

use App\Player;
use App\LeagueSeason;
use App\Match;
use App\BaseModel;

class PlayerAward extends BaseModel
{

    protected $table = 'player_awards';

    protected $fillable = ['name', 'match_id', 'league_season_id', 'player_id'];

    public function rules($ruleName)
    {
        return [
            'name' => 'required',
            'league_season_id' => 'required|exists:league_seasons,id',
            'player_id' => 'required|exists:players,id',
            'match_id' => 'required|exists:matches,id'
        ];
    }

    public function scopeFindAward($query, $name, $match_id)
    {
        return $query->where([
            'name' => $name,
            'match_id' => $match_id
        ]);
    }

    public function player()
    {
    	return $this->belongsTo(Player::class);
    }

    public function leagueSeason()
    {
    	return $this->belongsTo(LeagueSeason::class);
    }

    public function match()
    {
        return $this->belongsTo(Match::class);
    }
}
