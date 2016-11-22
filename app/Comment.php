<?php

namespace App;

use App\User;
use App\News;
use App\BaseModel;
use Illuminate\Database\Eloquent\Model;

class Comment extends BaseModel
{
    protected $table = 'comments';

    public function rules($ruleName)
    {
        return [
            'content' => 'required',
            'news_id' => 'required|exists:news,id',
            'user_id' => 'required|exists:users,id',
        ];
    }

    protected $fillable = [
        'content',
        'news_id',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function news()
    {
        return $this->belongsTo(News::class);
    }
}
