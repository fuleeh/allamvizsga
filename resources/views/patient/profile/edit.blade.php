{{--@extends('layouts.home')--}}

{{--@section('content')--}}

{{--    <h1>User's data</h1>--}}
{{--    <div class="col-md-3">--}}

{{--        {!! Form::open(['method'=>'PATCH', 'action'=>'UserController@editUserProfile']) !!}--}}

{{--        <div class="form-group">--}}
{{--            {!! Form::label('first_name', __('First Name')) !!}--}}
{{--            {!! Form::text('first_name', $user->first_name ?: 'null', ['class'=>'form-control']) !!}--}}
{{--        </div>--}}

{{--        <div class="form-group">--}}
{{--            {!! Form::label('last_name', __('Last Name')) !!}--}}
{{--            {!! Form::text('last_name', $user->last_name ?: 'null', ['class'=>'form-control']) !!}--}}
{{--        </div>--}}

{{--        <div class="form-group">--}}
{{--            {!! Form::label('address', __('Address')) !!}--}}
{{--            {!! Form::text('address', $patient->address ?: 'null', ['class'=>'form-control']) !!}--}}
{{--        </div>--}}

{{--        <div class="form-group">--}}
{{--            {!! Form::label('phone_number', __('Phone Number')) !!}--}}
{{--            {!! Form::text('phone_number', $patient->phone_number ?: 'null', ['class'=>'form-control']) !!}--}}
{{--        </div>--}}

{{--        <div class="form-group">--}}
{{--            {!! Form::label('email', __('E-Mail Address')) !!}--}}
{{--            {!! Form::text('email', $user->email, ['class'=>'form-control']) !!}--}}
{{--        </div>--}}

{{--        @if($doctors)--}}
{{--            {!! Form::label('doctor', __('Doctor')) !!}--}}
{{--            <select class="form-control" name="role">--}}
{{--                @foreach($doctors as $doctor)--}}
{{--                    <option value="{{$doctor->id}}">{{$doctor->first_name}} {{$doctor->last_name}}</option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--        @endif--}}

{{--        @if($patientcategories)--}}
{{--            {!! Form::label('category', __('Category')) !!}--}}
{{--            <select class="form-control" name="role">--}}
{{--                @foreach($patientcategories as $patientcategory)--}}
{{--                    <option value="{{$patientcategory->id}}">{{$patientcategory->name}}</option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--        @endif--}}

{{--        <div class="form-group">--}}
{{--            {!! Form::label('password', 'Password:') !!}--}}
{{--            {!! Form::password('password', ['class'=>'form-control']) !!}--}}
{{--        </div>--}}

{{--        <div class="form-group">--}}
{{--            {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}--}}
{{--        </div>--}}

{{--        {!! Form::close() !!}--}}

{{--    </div>--}}

{{--@endsection--}}

{{--@section('scripts')--}}


{{--@stop--}}
