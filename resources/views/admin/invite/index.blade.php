@extends('layouts.admin')

@section('content')

<h2>Create new invitation</h2>

<div class="col-sm-12">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
</div>

<div class="col-md-6 col-sm-12">

    {!! Form::open(['method'=>'POST', 'action'=>'InvitesController@sendInvitation']) !!}

    <div class="form-group">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::text('email', null, ['class'=>'form-control']) !!}
    </div>
    <div>

    @if($roles)
        <select class="form-control" name="role">
            @foreach($roles as $role)
                <option value="{{$role->id}}">{{$role->name}}</option>
            @endforeach
        </select>
    @endif

    </div>

    <div class="form-group">
            {!! Form::submit('Send Invitaion', ['class'=>'btn btn-primary']) !!}
    </div>
    
    {!! Form::close() !!}

</div>

@endsection

@section('scripts')



<script>

    </script>

@stop