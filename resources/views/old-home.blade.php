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
        @if($publications)
            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                @foreach($publications as $pub)
                    <h1>{{$pub->title}}</h1>

                    <p class="lead">
                        by {{$pub->user_id}}
                    </p>

                    <img class="img-responsive" src="{{$pub->photo ? $pub->photo->file : null}}" alt="">

                    <p>{!!$pub->body!!}</p>

                    <p><span class="glyphicon glyphicon-time"></span> Posted {{$pub->created_at->diffForHumans()}}</p>

                    <hr>
                @endforeach
            @endif
            <!-- Blog Sidebar Widgets Column -->
{{--                <div class="col-md-4">--}}


                    {{-- @if($publicationcategories)
                    <div class="well">
                        <h4>Kategóriák</h4>
                        @foreach($publicationcategories as $contentcategory)
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


{{--                </div>--}}
            </div>
        </div>
    </div>
@stop


@section('scripts')

@stop

