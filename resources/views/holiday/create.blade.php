@extends('layouts.main')

@section('head')

@include('layouts.partials.head')

@stop

@section('content')

<div class="form holiday" id="app">
	
	<h2>Book a holiday</h2>
	
@if(Session::has('message'))
    <div>
    {{{ Session::get('message') }}}
    </div>
@endif

{!! Form::model(array(
	'action' => 'HolidayController@store'
)) !!}

@if (count($errors) > 0)

	<div class="errorSummary">
			<p>Please fix the following input errors:</p>
			<ul>
		   		 @foreach($errors->all() as $error)
		        <li>{{{ $error }}}</li>
		    	@endforeach
			</ul>
	</div>
   
@endif

	{!! Form::hidden('staff_id', Auth::id()) !!}
	
	{!! Form::hidden('approved', 0) !!}
	
	{!! Form::label('request_date_from', 'From:') !!}
	{!! Form::text('request_date_from', '', ['class' => 'datepicker']) !!}
	{!! $errors->first('request_date_from', '<div class="errorMessage">:message</div>') !!}
	
	
    {!! Form::label('request_date_to', 'To:') !!}
	{!! Form::text('request_date_to', '', ['class' => 'datepicker']) !!}
	{!! $errors->first('request_date_to', '<div class="errorMessage">:message</div>') !!}

	{!! Form::label('hours_requested', 'Hours Requested:') !!}
	{!! Form::text('hours_requested') !!}
	{!! $errors->first('hours_requested', '<div class="errorMessage">:message</div>') !!}

	{!! Form::label('saturday', 'Saturdays:') !!}
	{!! Form::text('saturday') !!}
	{!! $errors->first('saturday', '<div class="errorMessage">:message</div>') !!}
	
	{!! Form::submit('Book') !!}
	
	<a href="{{ action('HolidayController@index') }}">cancel</a>

{{ Form::close() }}


</div>



@stop