@extends('layouts.home')

@section('content')
    <h1 class="my-4">{{__('Publications')}}</h1>

    @if($publications)
        @foreach($publications as $publication)
            <div class="card mb-4">
                <img class="card-img-top" src="{{$publication->photo ? $publication->photo->file : null}}"
                     alt="Card image cap">
                <div class="card-body">
                    <h2 class="card-title">{{$publication->title}}</h2>
                    <p class="card-text">{{$publication->body}}</p>
                    <a href="#" class="btn btn-primary">Read More &rarr;</a>
                </div>
                <div class="card-footer text-muted">
                    Posted on {{$publication->created_at}}
                    by {{$publication->user->first_name}} {{$publication->user->last_name}}
                </div>
            </div>
        @endforeach

        <!-- Pagination -->
        <div class="d-flex justify-content-center">
            {!! $publications->links() !!}
        </div>
    @endif

@stop

@section('side-widget')
    <div class="active-pink-3 active-pink-4 mb-4">
        <input class="form-control" type="text" placeholder="{{__('Search')}}" aria-label="Search">
    </div>

    <div class="card my-4">
        <h5 class="card-header">{{__('Publication Categories')}}</h5>
        <div class="card-body">
            <div class="row">
                @if($pubCategories)
                    @foreach($pubCategories as $categ)
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="#">{{$categ->name}}</a>
                                </li>
                            </ul>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <div class="card my-4">
        <h5 class="card-header">Side Widget</h5>
        <div class="card-body">
            You can put anything you want inside of these side widgets. They are easy to use, and feature the
            new Bootstrap 4 card containers!
        </div>
    </div>
@stop


@section('scripts')

@stop

