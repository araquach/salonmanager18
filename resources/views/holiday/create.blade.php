@extends('layouts.main')

@section('head')

@include('layouts.partials.head')

@stop

@section('content')

<script   src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"   integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="   crossorigin="anonymous"></script>

<script>
  $( function() {
    $( ".datepicker" ).datepicker();
  } );
  </script>

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
	{!! Form::text('request_date_from', '', array('class' => 'datepicker')) !!}
	{!! $errors->first('request_date_from', '<div class="errorMessage">:message</div>') !!}
	
	
    {!! Form::label('request_date_to', 'To:') !!}
	{!! Form::text('request_date_to', '', array('class' => 'datepicker')) !!}
	{!! $errors->first('request_date_to', '<div class="errorMessage">:message</div>') !!}

		

	{!! Form::label('hours_requested', 'Days Requested:') !!}
		
	<input v-model="days" name="hours_requested" type="number" id="hours_requested">
		
	<input v-model="hours"input name="hours_requested" type="hidden">
	{!! $errors->first('hours_requested', '<div class="errorMessage">:message</div>') !!}
	
	<div class="row question">
			{!! Form::label('saturday', 'How Many Saturdays:') !!}
	    	<p class="scale_label">0</p>
	    	{!! Form::radio('saturday', '0') !!}
	    	<p class="scale_label">1/2</p>
	    	{!! Form::radio('saturday', '.5') !!}
	        <p class="scale_label">1</p>
	        {!! Form::radio('saturday', '1') !!}
	        <p class="scale_label">1 1/2</p>
	        {!! Form::radio('saturday', '1.5') !!}
	        <p class="scale_label">2</p>
	        {!! Form::radio('saturday', '2') !!}
	    	{!! $errors->first('saturday', '<div class="errorMessage">:message</div>') !!}
	</div>
	
	{!! Form::submit('Book') !!}
	
	<a href="{{ action('HolidayController@index') }}">cancel</a>

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