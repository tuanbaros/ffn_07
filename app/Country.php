<?php

namespace App;

use App\News;
use App\League;
use App\Player;
use App\Team;
use App\BaseModel;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Country extends BaseModel
{
    protected $table = 'countries';
    
    protected $rules = [
        'name' => 'required|unique:countries,name',
        'code' => 'required|numeric'
    ];


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
