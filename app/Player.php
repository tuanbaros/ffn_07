<?php

namespace App;

use App\Country;
use App\Team;
use App\MatchPlayer;
use App\PlayerAward;
use App\Position;
use Illuminate\Database\Eloquent\Model;

class Player extends BaseModel
{
    protected $table = 'players';

    protected $fillable = [
        'name',
        'introduction',
        'position_id',
        'birthday',
        'avatar',
        'team_id',
        'country_id'
    ];

    public function rules($ruleName)
    {
        if ($ruleName == 'updateRule') {
            $nameRules = 'required|unique:players,name,' . $this->id;
        } else {
            $nameRules = 'required|unique:players,name';
        }
        return [
            'name' => $nameRules,
            'introduction' => 'required',
            'position_id' => 'required|exists:positions,id',
            'birthday' => 'required|date',
            'avatar' => 'required',
            'team_id' => 'required|exists:teams,id',
            'country_id' => 'required|exists:countries,id'
        ];
    }

    public function scopeSearchByName($query, $name)
    {
        return $query->where('name', 'like', '%' . $name . '%');
    }

    public function scopeFilterPlayer($query, $id)
    {
        return $query->where('team_id', $id);
    }

    public function country()
    {
    	return $this->belongsTo(Country::class);
    }

    public function team()
    {
    	return $this->belongsTo(Team::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
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
