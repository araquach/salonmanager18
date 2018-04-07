@extends('layouts.main')

@section('head')

@include('layouts.partials.head')

@stop

@section('content')

<div class="form freeTime">
	
	<h2>Edit Free Time</h2>
	
@if(Session::has('message'))
    <div>
    {{{ Session::get('message') }}}
    </div>
@endif

{!! Form::model($freeTime, ['method' => 'PATCH', 'action' => ['FreeTimeController@update', $freeTime->id]]) !!}

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
	
	<p>
    	{!! Form::label('date_regarding', 'Date of free time:') !!}
    	{!! Form::date('date_regarding') !!}
    	{!! $errors->first('date_regarding', '<div class="errorMessage">:message</div>') !!}
	</p>
	
	<p>
    	{!! Form::label('free_time_hours', 'Number of hours:') !!}
    	{!! Form::number('free_time_hours') !!}
    	{!! $errors->first('free_time_hours', '<div class="errorMessage">:message</div>') !!}
	</p>
	
	<p>
    	{!! Form::label('description', 'Description:') !!}
    	{!! Form::text('description') !!}
    	{!! $errors->first('description', '<div class="errorMessage">:message</div>') !!}
	</p>
	
	<p>
	    {!! Form::submit('Update') !!}
	</p>
	
	<a href="{{ action('FreeTimeController@index') }}">cancel</a>

{{ Form::close() }}


</div>

@stop