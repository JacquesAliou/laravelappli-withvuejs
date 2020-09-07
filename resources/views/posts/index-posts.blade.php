@extends('layouts.base-template')

@section('meta-title', $title ="AppLaravelVueJs-Post")


@section('meta-description', $description="La liste des Postes")


@section('content')


    <div class="ui heading vertical segment">
        <div class="ui container">
            <h2 class="ui huge header">
                {{$title}}
                <div id="subtitle" class="sub header">
                    {{$description}}
                </div>
            </h2>

            {{--Filtrer les articles par Catégorie ou par Tag--}}
            <div class="d-flex justify-content-end mb-5">
                <div class="ui labeled icon top right pointing dropdown button ">
                    <i class="filter icon"></i>
                    <span class="text">Filter Posts</span>
                    <div class="menu">
                        <div class="ui search icon input">
                            <i class="search icon"></i>
                            <input type="text" name="search" placeholder="Search issues...">
                        </div>
                        <div class="divider"></div>
                        <div class="header">
                            <i class="tags icon"></i>
                            Filtrer par Tag
                        </div>
                        <div class="item">
                            <div class="ui red empty circular label"></div>
                            Important
                        </div>
                        <div class="item">
                            <div class="ui blue empty circular label"></div>
                            Announcement
                        </div>
                        <div class="item">
                            <div class="ui black empty circular label"></div>
                            Discussion
                        </div>
                        <div class="divider"></div>
                        <div class="header">
                            <i class="calendar icon"></i>
                            Filtrer par Catégorie
                        </div>
                        {{--Pour tte categorie,on l'affiche sous 1 url qui au clique affiche--}}
                        {{--tous les posts en lien avec la catégorie.voir if()PostsController+Route--}}
                        @forelse ($categories as $category)

                            <a href="{{ url("blog/{$category->slug}") }}" class="item">
                                <i class="{{ $category->icon }} {{ $category->color }}"></i>
                                {{ $category->name }}
                            </a>
                        @empty
                            <div class="ui icon message mt-5">
                                <i class="info icon"></i>
                                <div class="content">
                                    <div class="header">
                                        Désolé Il n'y a pas de Catégories
                                    </div>
                                    <p>Veuillez  nous en excuser !!!</p>
                                </div>
                            </div>
                        @endforelse

                    </div>
                </div>
            </div>

            {{--Affichage des articles--}}
            <div class="ui two column grid">
                @forelse ( $posts as $post )
                    <div class="column">
                        <div class="ui raised segment">
                            {{--l'url(de la catégorie), ici niveau posts, au clique, affiche aussi--}}
                            {{--tous les postes en lien avec la catégorie.Voir if()PostsController+Route--}}
                            <a href="{{ url("blog/{$post->category->slug}") }}"
                               class="ui {{ $post->category->color }} ribbon label">
                                {{ $post->category->name }}
                            </a>
                            <span>
                                {{-- Faire du titre de l'article un lien cliquable qui renvoie vers la suite de l'article--}}
                                <a href="{{ url($post->path()) }}">{{ $post->name }}</a>
                            </span>
                            <p class="mt-3">{{ Str::limit($post->body, 200) }}</p>
                            {{--Pour lire la suite de l'article vu en 1er lieu, on affiche que 200 caractères--}}
                            <a href="{{ url($post->path()) }}" class="ui green label">
                                Lire la suite
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="ui icon message mt-5">
                        <i class="info icon"></i>
                        <div class="content">
                            <div class="header">
                                Désolé Pas d'articles pour l'instant
                            </div>
                            <p>Veuillez revenir plustard !!!</p>
                        </div>
                    </div>
                @endforelse

            </div>

        </div>
    </div>
    </div>
@endsection

@section('js')
    <script>
        $('.ui.dropdown')
            .dropdown()
        ;
    </script>
@endsection
