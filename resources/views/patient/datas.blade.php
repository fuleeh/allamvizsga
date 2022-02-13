<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>User data</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">

    <link href="{{asset('css/libs.css')}}" rel="stylesheet">


@yield('styles')
</head>

<body>

        <div class="col-md-3">

                {!! Form::open(['method'=>'POST', 'action'=>'UserController@userData']) !!}
            
                <div class="form-group">
                    {!! Form::label('first_name', 'First Name:') !!}
                    {!! Form::text('first_name', null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                        {!! Form::label('last_name', 'Last Name:') !!}
                        {!! Form::text('last_name', null, ['class'=>'form-control']) !!}
                </div>
            
                <div class="form-group">
                    {!! Form::label('address', 'Address:') !!}
                    {!! Form::text('address', null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                        {!! Form::label('phone_number', 'Phone Number:') !!}
                        {!! Form::text('phone_number', null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                        {!! Form::label('email', 'Email:') !!}
                        {!! Form::text('email', null, ['class'=>'form-control']) !!}
                </div>

                @if($patientcategories)
                    <select class="form-control" name="role">
                        @foreach($patientcategories as $patientcategory)
                            <option value="{{$patientcategory->id}}">{{$patientcategory->name}}</option>
                        @endforeach
                    </select>
                @endif

                <div class="form-group">
                    {!! Form::label('password', 'Password:') !!}
                    {!! Form::password('password', ['class'=>'form-control']) !!}
                </div>
            
                <div class="form-group">
                        {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
                </div>
            
                {!! Form::close() !!}
            
        </div>



<script src="{{asset('js/libs.js')}}"></script>


@yield('scripts')





</body>




</div>


@section('scripts')

<script>

</script>

@stop