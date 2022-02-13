@extends('layouts.blog-post')



@section('content')
    {{-- {{ dd($post) }} --}}
    @foreach($posts as $post)
        <h1>{{$post->title}}</h1>

        <p class="lead">
            by {{$post->user->first_name}}
        </p>

        <img class="img-responsive" src="{{$post->photo ? $post->photo->file : null}}" alt="">

        <p>{!!$post->body!!}</p>

        <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

        <hr>
    @endforeach
@stop


@section('scripts')

@stop

