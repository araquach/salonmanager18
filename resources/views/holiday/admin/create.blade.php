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
	'action' => 'AdminHolidayController@store'
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

	{!! Form::label('request_date_from', 'From:') !!}
	{!! Form::text('request_date_from', '', ['class' => 'datepicker']) !!}
	{!! $errors->first('request_date_from', '<div class="errorMessage">:message</div>') !!}

	{!! Form::label('request_date_to', 'To:') !!}
	{!! Form::text('request_date_to', '', ['class' => 'datepicker']) !!}
	{!! $errors->first('request_date_to', '<div class="errorMessage">:message</div>') !!}

	{!! Form::label('hours_requested', 'Days Requested:') !!}
	<input v-model="days" name="hours_requested" type="text" id="hours_requested">
	<input v-model="hours"input name="hours_requested" type="hidden">
	{!! $errors->first('hours_requested', '<div class="errorMessage">:message</div>') !!}
	
	{!! Form::label('saturday', 'To:') !!}
	{!! Form::text('saturday') !!}
	{!! $errors->first('saturday', '<div class="errorMessage">:message</div>') !!}
	
	{!! Form::submit('Save') !!}

	
	<a href="{{ action('AdminHolidayController@index') }}">cancel</a>

{{ Form::close() }}


</div>

<script>

	new Vue({
		el: '#app',
		
		data: {
			days: '',
		},
		
		computed: {
			hours: function () {
    			return this.days * 8
    		}
		}
	})
	
</script>

@stop