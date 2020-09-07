<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'title', 'name', 'email', 'password', 'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Pour que le mdp soit hashé automatiquement à la mise-a-jour
    protected static function boot()
    {
        parent::boot();

        self::saving(function ($model){
            $model->password = bcrypt($model->password);
        });
    }

    /** Les Relations de Tables */
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function tutorials()
    {
        return $this->hasMany(Tutorial::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
