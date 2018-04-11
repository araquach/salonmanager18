@extends('layouts.main')

@section('head')

@include('layouts.partials.head')

@stop

@section('content')

<div class="form freeTime">
	
	<h2>Book Free Time</h2>
	
@if(Session::has('message'))
    <div>
    {{{ Session::get('message') }}}
    </div>
@endif

{!! Form::model(array(
	'action' => 'AdminFreeTimeController@store'
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
	
	{!! Form::hidden('approved', 2) !!}
	
    	{!! Form::label('staff_id', 'Staff:') !!}
    	{!! Form::select('staff_id', $staffs) !!}
    	{!! $errors->first('staff_id', '<div class="errorMessage">:message</div>') !!}

    	{!! Form::label('date_regarding', 'Date:') !!}
    	{!! Form::text('date_regarding', '', ['class' => 'datepicker']) !!}
    	{!! $errors->first('date_regarding', '<div class="errorMessage">:message</div>') !!}

    	{!! Form::label('free_time_hours', 'Number of hours:') !!}
    	{!! Form::text('free_time_hours') !!}
    	{!! $errors->first('free_time_hours', '<div class="errorMessage">:message</div>') !!}

    	{!! Form::label('description', 'Description:') !!}
    	{!! Form::text('description') !!}
    	{!! $errors->first('description', '<div class="errorMessage">:message</div>') !!}

	    {!! Form::submit('Save') !!}

	<a href="{{ action('AdminFreeTimeController@index') }}">cancel</a>

{{ Form::close() }}


</div>

@stop