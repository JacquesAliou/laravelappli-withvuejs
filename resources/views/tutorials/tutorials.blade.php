@extends('layouts.base-template')

@section('meta-title', $title ="AppLaravelVueJs-Tutorial")


@section('meta-description', $description="La liste des Tutos")


@section('content')


    <div class="ui heading vertical segment">
        <div class="ui container">
            <h2 class="ui huge header">
                {{$title}}
                <div id="subtitle" class="sub header">
                    {{$description}}
                </div>
            </h2>

            {{--La Liste des tutorials --}}
            <div class="ui special cards">
                @forelse($tutorials as $tutorial)
                    <div class="card">
                        <div class="blurring dimmable image">
                            <div class="ui dimmer">
                                <div class="content">
                                    <div class="center">
                                        <div class="ui inverted button">Voir le Tutoriel</div>
                                    </div>
                                </div>
                            </div>
                            <img src="/images/avatar/elliot.jpg">
                        </div>
                        <div class="content">
                            <a class="header">{{ $tutorial->name }}</a>
                            <div class="meta">
                                <span class="date">{{ $tutorial->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                        <div class="extra content">
                            <a>
                                <i class="{{ $tutorial->category->icon }}"></i>
                                {{ $tutorial->category->name }}
                            </a>
                        </div>
                    </div>

                @empty
                    <div class="ui icon message mt-5">
                        <i class="info icon"></i>
                        <div class="content">
                            <div class="header">
                                Désolé Pas de tutos pour l'instant
                            </div>
                            <p>Veuillez revenir plustard, les tutos vous seront mis en ligne!!!</p>
                        </div>
                    </div>
                @endforelse

            </div>
    </div>
@endsection

@section('js')
    <script>
        $('.special.cards .image').dimmer({
            on: 'hover'
        });
    </script>
@endsection
