<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];

protected static function boot()
{
    parent::boot();


    self::creating(function ($model){
       if (auth()->check()){ // if user conection = true
           $model->user_id = auth()->id(); // need construct to be opened in CommentsController
       }
        $model->ip = request()->ip();  // recuperer automatiquement l'ip des gens qui font des commentaires

    });
}

    // Relation de Tables
    public function commentable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
