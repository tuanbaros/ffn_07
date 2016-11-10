<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class BaseModel extends Model
{
    protected $valid;

    public function validate($data, $ruleName)
    {
        $this->valid = Validator::make($data, $this->rules($ruleName));
        if ($this->valid->fails()) {
            return false;
        }
        return true;
    }

    public function valid()
    {
        return $this->valid;
    }
}
