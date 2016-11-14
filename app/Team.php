<?php

namespace App;

use App\Country;
use App\Rank;
use App\Player;
use App\Match;
use App\TeamAchievement;
use App\BaseModel;
use Illuminate\Database\Eloquent\Model;

class Team extends BaseModel
{
    protected $table = 'teams';

    protected $rules = [
        'name' => 'required|max:100',
        'introduction' => 'required|min:10',
        'country_id' => 'required',
    ];

    protected $fillable = [
        'name',
        'introduction',
        'country_id',
        'logo',
    ];

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
