<?php

namespace App\Providers;


use App\Category;
use Carbon\Carbon;
use cebe\markdown\GithubMarkdown;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        /** Pour eviter les erreurs en bdd lors des migrations */
        Schema::defaultStringLength(191);


        /** Langue: Affichange en francais par exple temps d'apparition Tutos*/
        Carbon::setLocale('fr');
        setlocale(LC_TIME, 'fr_FR.utf8', 'fr');


        // l'accessibilite de la categorie dans le fichier 'posts.edit-post' voir la boucle
        // l'accessibilite de la categorie dans dans toute l'appli = '*'
        view()->composer('*', function ($view){
            $view->with('categories', Category::select('id', 'name', 'slug')->get());
        });


        /** Markdown:Ici il cible le body de la table posts. $body represente le contenu à éditer */
        view()->composer('*', function ($view){
            $view->with('markdown', (new GithubMarkdown()));
        });
    }
}
