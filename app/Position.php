<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Player;
use App\BaseModel;

class Position extends BaseModel
{
    protected $table = 'positions';

    protected $fillable = ['name'];

    public function rules($ruleName)
    {
        if ($ruleName == 'updateRule') {
            $nameRules = 'required|unique:positions,name,' . $this->id;
        } else {
            $nameRules = 'required|unique:positions,name';
        }
        return [
            'name' => $nameRules
        ];
    }

    public function player()
    {
        return $this->hasMany(Player::class);
    }
}
