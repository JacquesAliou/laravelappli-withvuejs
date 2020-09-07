@extends('layouts.base-template')

@section('meta-title', $title = $post->name)

{{--Str::limit($post->body, 35) = une sorte d'introduction de l'article avant le contenu entier--}}
@section('meta-description', $description = Str::limit($post->body, 35))


@section('content')


    <div class="ui heading vertical segment">
        <div class="ui container">
            <h2 class="ui huge header">
                {{ $title }}
                <div id="subtitle" class="sub header">
                    {{ $description }}
                </div>
            </h2>

            {{-- Btn édition d'un article et lien vers le form d'edition--}}
            <div class="d-flex justify-content-end">

                <a href="{{ url("{$post->path()}/edit") }}" class="ui olive button icon mb-3">
                    <i class="edit icon"></i>
                    Editer</a>

                <form action="{{ url("{$post->path()}") }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="ui red button icon mb-3">
                        <i class="trash icon"></i>
                        </button>
                </form>
            </div>

            {{--le contenu entier de l'article--}}
            <div>{!! $markdown->parse($post->body) !!}</div>

            {{--Component Vue Js--}}
            <comments></comments>
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
