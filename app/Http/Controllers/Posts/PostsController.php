<?php

namespace App\Http\Controllers\Posts;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**With(Category $category) we're still stuck on Category id.
     *Getting the slug as wished in the View needs getRoutekeyName() in Category model */
    public function index(Category $category)
    {

        /** if any category exists in db(jump to $posts)*/
        if ($category->exists){

            /** get that category and all posts in relation with that category*/
            $posts = $category->posts()->latest()->get();

        }else{

            $posts =  Post::latest()->get();
        }

        return view('posts.index-posts', [
            'posts' => $posts,
            'categories' => Category::get(),
            /**We get Categories via 'categories' in PostsController and $categories(View => boucle)
              Same for 'posts'*/
        ]);
    }

    /**Lire la suite d'un article. On récupère la Category et le Post comme indiqué dansla Route */
    public function show(Category $category, Post $post)
    {
        return view('posts.show-post', [
            'post' => $post,
        ]);
    }


    public function edit(Category $category, Post $post)
    {
       return view('posts.edit-post', [

           'post' => $post,
       ]);
    }

    /** update a post */
    public function update(Category $category, Post $post)
    {
        $post->update(request()->all());

        return redirect($post->path());
    }

    /** delete a post */
    public function destroy(Category $category, Post $post)
    {
        $post->delete();

        return redirect()->route('blog');
    }
}
