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

    protected $fillable = [
        'name',
        'code'
    ];

    public function rules($ruleName)
    {
        if ($ruleName == 'updateRule') {
            $nameRule = 'required|unique:countries,name,' . $this->id;
        } else {
            $nameRule = 'required|unique:countries,name';
        }
        return [
            'name' => $nameRule,
            'code' => 'required|numeric'
        ];
    }

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
