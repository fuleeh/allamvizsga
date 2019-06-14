@extends('layouts.blog-post')



@section('content')

    <h1>{{$post->title}}</h1>

    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>
    <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

    <hr>

    <img class="img-responsive" src="{{$post->photo ? $post->photo->file : null}}" alt="">

    <hr>

    <p>{!!$post->body!!}</p>

    <hr>




@stop


@section('scripts')



@stop

