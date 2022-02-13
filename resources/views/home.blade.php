@extends('layouts.app')

{{-- @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- <div class="card"> --}}
                {{-- <div class="card-header">Dashboard</div>
                @auth
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
                @else
                Pleasel log in!
                @endauth --}}
            {{-- </div> --}}
        {{-- </div>
    </div>
</div> --}}
{{-- @endsection --}}
@section('content')
<div class="container">

    <div class="row">

        <!-- Blog Post Content Column -->
        <div class="col-lg-8">

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
                <!-- Blog Sidebar Widgets Column -->
                <div class="col-md-4">


                    {{-- @if($contentcategories)
                    <div class="well">
                        <h4>Kategóriák</h4>
                        @foreach($contentcategories as $contentcategory)
                        <div class="row">
                            <div class="col-lg-6">
                                <ul class="list-unstyled">
                                    <li><a href="#">{{$contentcategory->name}}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                        @endforeach
                    @endif --}}
    
    
        </div>
</div>
@stop


@section('scripts')

@stop

