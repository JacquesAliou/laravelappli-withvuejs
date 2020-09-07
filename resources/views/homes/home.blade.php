@extends('layouts.base-template')

@section('meta-title', $title ="AppLaravelVueJs-Home")


@section('meta-description', $description="A Laravel App with Vue Js")


@section('content')


    <div class="ui heading vertical segment">
        <div class="ui container">
            <h2 class="ui huge header">
                {{$title}}
                <div id="subtitle" class="sub header">
                {{$description}}
                </div>
            </h2>


        </div>
    </div>
    </div>
@endsection
