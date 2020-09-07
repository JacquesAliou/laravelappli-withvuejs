<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('homes.home');
});

Route::group(['namespace' => 'Users'], function(){

    Route::get('users', 'UsersController@index')->name('users');
});

Route::group(['namespace' => 'Tutorials'], function(){

    Route::get('tutorials', 'TutorialsController@index')->name('tutorials');
});


/** prefix = avoid repeating 'blog for every Route of the group */
Route::group(['namespace' => 'Posts', 'prefix' => 'blog'], function(){

    Route::get('', 'PostsController@index')->name('blog');

    /** I'ts an url in fact in View and it shows all projects of same category in index page */
    Route::get('{category}', 'PostsController@index');

    /** Lire la suite de l'article dont le contenu est limité au 1er affichage */
    Route::get('{category}/{post}', 'PostsController@show')->name('post');

    /**Route édition d'un article et lien vers le form d'edition*/
    Route::get('{category}/{post}/edit', 'PostsController@edit');

    /** update */
    Route::put('{category}/{post}', 'PostsController@update');

    /** delete */
    Route::delete('{category}/{post}', 'PostsController@destroy');


    /** Créer un commentaire */
    Route::post('{category}/{post}/comment', 'CommentsController@store');


    Route::get('{category}/{post}/comment', 'CommentsController@index');


    /**Mettre à jour un commentaire*/
    Route::patch('{category}/{post}/{comment}/comment', 'CommentsController@update');

    /**Supprimer un commentaire*/
    Route::delete('{category}/{post}/{comment}/comment', 'CommentsController@destroy');
});





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
