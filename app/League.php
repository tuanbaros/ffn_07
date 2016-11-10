<?php

namespace App;

use App\Country;
use App\LeagueSeason;
use App\BaseModel;

use Illuminate\Database\Eloquent\Model;


class League extends BaseModel
{
    protected $table = 'leagues';

    protected $fillable = [
        'name',
        'country_id'
    ];

    public function rules($ruleName)
    {
        if ($ruleName == 'updateRule') {
            $nameRules = 'required|unique:leagues,name,' . $this->id;
        } else {
            $nameRules = 'required|unique:leagues,name';
        }
        return [
            'name' => $nameRules,
            'country_id' => 'required|exists:countries,id'
        ];
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function leagueSeasons()
    {
        return $this->hasMany(LeagueSeason::class);
    }
}
