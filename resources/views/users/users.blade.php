@extends('layouts.base-template')

@section('meta-title', $title ="AppLaravelVueJs-Membres")


@section('meta-description', $description="La liste des utilisateurs")


@section('content')


    <div class="ui heading vertical segment">
        <div class="ui container">
            <h2 class="ui huge header">
                {{$title}}
                <div id="subtitle" class="sub header mt-3">
                    {{$description}}
                </div>
            </h2>

            <div class="ui six column grid">
                @forelse ($users as $user)
                    <div class="column">
                        <div class="ui fluid card">
                            <div class="image">
                                <img src="{{$user->avatar}}">
                            </div>
                            <div class="content">
                                <a class="header text-center">{{$user->name}}</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="ui icon message mt-5">
                        <i class="info icon"></i>
                        <div class="content">
                            <div class="header">
                                Pas d'utulisateurs pour l'instant
                            </div>
                            <p>Désolé, ce site est en maintenance !!!</p>
                        </div>
                    </div>
                @endforelse
        </div>
    </div>
    </div>

@endsection
