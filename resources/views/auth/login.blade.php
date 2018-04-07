@extends('layouts.main')

@section('head')

@include('layouts.partials.head')

@stop

@section('content')

<h2>Login</h2>

{{ Form::open(array('route' => 'login')) }}

        {!! Form::label('email', 'Email Address') !!}
        {!! Form::text('email', old('email')) !!}
        {!! $errors->first('email', '<div class="errorMessage">:message</div>') !!}
    
        {!! Form::label('password', 'Password') !!}
        {!! Form::text('password', old('password')) !!}
        {!! $errors->first('password', '<div class="errorMessage">:message</div>') !!}
    
        {!! Form::label('remember', 'Remember Me') !!}
        {!! Form::checkBox('remember') !!}
    
        {!! Form::submit('Login') !!}

{{ Form::close() }}

<a href="{{ url('/password/reset') }}" class="button">Forgot Your Password?</a>

@endsection