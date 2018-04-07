@extends('layouts.main')

@section('head')

@include('layouts.partials.head')

@stop

@section('content')

<h2>Register</h2>

{{ Form::open(array('url' => '/register')) }}

    <p>
    	{!! Form::label('name', 'Name') !!}
    	{!! Form::text('name', old('name')) !!}
    	{!! $errors->first('name', '<div class="errorMessage">:message</div>') !!}
    </p>
    
    <p>
    	{!! Form::label('username', 'Username') !!}
    	{!! Form::text('username', old('username')) !!}
    	{!! $errors->first('username', '<div class="errorMessage">:message</div>') !!}
    </p>
    
    <p>
    	{!! Form::label('password', 'Password') !!}
    	{!! Form::text('password', old('password')) !!}
    	{!! $errors->first('password', '<div class="errorMessage">:message</div>') !!}
    </p>
    
    <p>
    	{!! Form::label('password_confirmation', 'Confirm Password') !!}
    	{!! Form::text('password_confirmation', old('password_confirmation')) !!}
    	{!! $errors->first('password_confirmation', '<div class="errorMessage">:message</div>') !!}
    </p>
    
    <p>
    	{!! Form::submit('Register') !!}
	</p>

{{ Form::close() }}

@endsection
