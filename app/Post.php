<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Post extends Model
{
   protected $guarded = [];

   protected $with = ['user', 'category'];

   /** Table Relation */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /** morphMany(Comment::class, 'commentable') => on récupere le commentaire dans commentable_type  */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }


    //seulement pendant la création le slug sera egal a la function
    protected static function boot()
    {
        parent::boot();

        self::creating(function ($model){
            $model->slug = Str::slug($model->name);
        });
    }

    /** Lire la suite de l'article: Cibles = slug de la categorie de l'article et l'id de l'article.
     * Le tout renvoyé sous forme d'url friendly(voir logique de path())
     * Le $this = reference à l'article en question = $post
     */
    public function path()
    {
        return "/blog/{$this->category->slug}/{$this->id}";
    }

}
