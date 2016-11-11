<?php

namespace App;

use App\Comment;
use App\Category;
use App\Country;
use Illuminate\Database\Eloquent\Model;
use App\BaseModel;

class News extends BaseModel
{
    protected $table = 'news';

    protected $rules = [
        'description' => 'required|max:200|min:10',
        'content' => 'required|min:10',
        'cate_id' => 'required',
        'country_id' => 'required',
        'title' => 'required|max:100',
    ];

    protected $fillable = [
        'title',
        'description',
        'content',
        'cate_id',
        'country_id',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'cate_id', 'id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
