@extends('layouts.main')

@section('head')

@include('layouts.partials.head')

@stop

@section('content')

<div class="form sickDay" id="app">
	
	<h2>Log Sick Days</h2>
	
	@if(Session::has('message'))
	    <div>
	    	{{{ Session::get('message') }}}
	    </div>
	@endif
	
	{!! Form::model(array(
		'action' => 'AdminSickDayController@store'
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
	
    	{!! Form::label('staff_id', 'Staff:') !!}
    	{!! Form::select('staff_id', $staffs) !!}
    	{!! $errors->first('staff_id', '<div class="errorMessage">:message</div>') !!}
		
	
    	{!! Form::label('sick_from', 'From:') !!}
    	{!! Form::text('sick_from', '', ['class' => 'datepicker']) !!}
    	{!! $errors->first('sick_from', '<div class="errorMessage">:message</div>') !!}
		
		
		
    	{!! Form::label('sick_to', 'To:') !!}
    	{!! Form::text('sick_to', '', ['class' => 'datepicker']) !!}
    	{!! $errors->first('sick_to', '<div class="errorMessage">:message</div>') !!}
	
	
	
		{!! Form::label('sick_hours', 'Number of days:') !!}
		
		<input v-model="days" name="sick_hours" type="text" id="sick_hours">
		
		<input v-model="hours"input name="sick_hours" type="hidden">
		{!! $errors->first('sick_hours', '<div class="errorMessage">:message</div>') !!}
	
	
	
    	{!! Form::label('description', 'Description:') !!}
    	{!! Form::text('description') !!}
    	{!! $errors->first('description', '<div class="errorMessage">:message</div>') !!}
		
		
		<div class="row question">
			
	    	<p class="scale_label">Deducted</p>
	    	{!! Form::radio('deducted', '1') !!}
	    	<p class="scale_label">Pending</p>
	    	{!! Form::radio('deducted', '0') !!}
			
		</div>
		
	
		{!! Form::submit('Save') !!}
		
		
		<a href="{{ action('AdminSickDayController@index') }}">cancel</a>
	
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