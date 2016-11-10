<?php

namespace App;

use App\News;
use Illuminate\Database\Eloquent\Model;
use Validator;
use App\BaseModel;

class Category extends BaseModel
{
    protected $table = "categories";
    protected $rules = [
        'name' => 'required|max:50|unique:categories',
    ];

    public function news()
    {
        return $this->hasMany(News::class);
    }
}
