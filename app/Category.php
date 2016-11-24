<?php

namespace App;

use App\News;
use Illuminate\Database\Eloquent\Model;
use Validator;
use App\BaseModel;

class Category extends BaseModel
{
    protected $table = "categories";

    public function rules($ruleName)
    {
        if ($ruleName == 'updateRule') {
            $nameRules = 'required|max:50|unique:categories,name,' . $this->id;
        } else {
            $nameRules = 'required|max:50|unique:categories,name';
        }
        return [
            'name' => $nameRules
        ];
    }

    public function scopeNewsInCategory($query, $take = 1)
    {
        return Category::with('news')->get()->map(function($category) use ($take) {
            $category->news = $category->news->take($take);
            return $category;
        });
    }

    public function news()
    {
        return $this->hasMany(News::class, 'cate_id', 'id');
    }
}
