<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Category extends Model
{
    protected $guarded = [];

    //Pour que le slug soit créé automatiquement à la mise-a-jour
    protected static function boot()
    {
        parent::boot();

        self::saving(function ($model){
            $model->slug =Str::slug($model->name);
        });
    }

    /** Les Relations de Tables */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function tutorials()
    {
        return $this->hasMany(Tutorial::class);
    }


    /**on recupere les categories parraport à leur slug
     * et non par rapport à leur id: Voir PostsController Comments
     */
    public function getRouteKeyName()
    {
        return 'slug'; // TODO: Change the autogenerated stub
    }
}
