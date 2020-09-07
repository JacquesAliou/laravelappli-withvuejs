<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tutorial extends Model
{
    protected $guarded = [];

    protected $with = ['user', 'category'];

    //Pour que le slug soit créé automatiquement à la mise-a-jour
    protected static function boot()
    {
        parent::boot();

        self::creating(function ($model){
            $model->slug = Str::slug($model->name);
        });
    }



    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
