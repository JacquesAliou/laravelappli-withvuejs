<?php

namespace App\Http\Controllers\Posts;

use App\Category;
use App\Comment;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class CommentsController extends Controller
{

    // In relation with Comment model => $model->user_id = auth()->id;
    public function __construct()
    {
        $this->middleware(['auth'])->except(['index']); // only authenticated user can comment
    }


    /** recuperer les commentaires: en lien avec le component comments de vue js */
    public function index(Category $category, Post $post)
    {
        $comments = $post->comments()->with('user')->latest()->get();
        return $comments;
    }


    /** publier un commentaire et l'enregistrer en bd */
    public function store(Category $category, Post $post)
    {
        $comment = $post->comments()->create(request()->all());

            return $comment->load('user');
    }


    /**mettre à jour le commentaire*/
    public function update(Category $category, Post $post, Comment $comment)
    {
        $comment->update(request()->all());

        return response("Le commentaire a bien été mis-à-jour §§§");
    }

    /**Supprimer un commentaire*/
    public function destroy(Category $category, Post $post, Comment $comment)
    {
        $comment->delete();

        return response("Le commentaire a bien été supprimé §§§");
    }
}
