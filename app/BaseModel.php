<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class BaseModel extends Model
{
    protected $valid;

    public function validate($data)
    {
        $this->valid = Validator::make($data, $this->rules);
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
