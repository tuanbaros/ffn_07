<?php

namespace App;

use App\Comment;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use Validator;

class User extends BaseModel implements
    AuthenticatableContract,
    CanResetPasswordContract,
    AuthorizableContract
{
    use Authenticatable, Authorizable, CanResetPassword;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_active', 'is_admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function rules()
    {
        return [
            'name' => 'required|max:50|min:4'
        ];
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
