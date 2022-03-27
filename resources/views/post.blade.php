@extends('layouts.blog-post')



@section('content')
    {{-- {{ dd($post) }} --}}
    @foreach($publications as $pub)
        <h1>{{$pub->title}}</h1>

        <p class="lead">
            by {{$pub->user->first_name}}
        </p>

        <img class="img-responsive" src="{{$pub->photo ? $pub->photo->file : null}}" alt="">

        <p>{!!$pub->body!!}</p>

        <p><span class="glyphicon glyphicon-time"></span> Posted {{$pub->created_at->diffForHumans()}}</p>

        <hr>
    @endforeach
@stop


@section('scripts')

@stop

