@extends('layouts.main')

@section('head')

@include('layouts.partials.head')

@stop

@section('content')

<h2>Login</h2>

{{ Form::open(array('url' => '/login')) }}

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
    	{!! Form::label('remember', 'Remember Me') !!}
    	{!! Form::checkBox('remember') !!}
    </p>
    
    <p>
	    {!! Form::submit('Login') !!}
	</p>

{{ Form::close() }}

<p><a href="{{ url('/password/reset') }}">Forgot Your Password?</a></p>

@endsection
