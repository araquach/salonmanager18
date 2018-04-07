@extends('layouts.main')

@section('head')

@include('layouts.partials.head')

@stop

@section('content')

<div class="form holiday" id="app">
	
	<h2>Edit holiday</h2>
	
	@if(Session::has('message'))
	    <div>
	    	{{{ Session::get('message') }}}
	    </div>
	@endif
	
	{!! Form::model($holiday, ['method' => 'PATCH', 'action' => ['AdminHolidayController@update', $holiday->id]]) !!}
	
	
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
		
	<p>
    	{!! Form::label('staff_id', 'Staff:') !!}
    	{!! Form::select('staff_id', $staffs) !!}
    	{!! $errors->first('staff_id', '<div class="errorMessage">:message</div>') !!}
	</p>
	
	<p>
    	{!! Form::label('request_date_from', 'New from date:') !!}
    	{!! Form::date('request_date_from') !!}
    	{!! $errors->first('request_date_from', '<div class="errorMessage">:message</div>') !!}
	</p>
	
	<p>
    	{!! Form::label('request_date_to', 'New to date:') !!}
    	{!! Form::date('request_date_to') !!}
    	{!! $errors->first('request_date_to', '<div class="errorMessage">:message</div>') !!}
	</p>
	
	<p>
		{!! Form::label('hours_requested', 'Days Requested:') !!}
		
		<input v-model="days" name="hours_requested" type="number" id="hours_requested">
		
		<input v-model="hours"input name="hours_requested" type="hidden">
		{!! $errors->first('hours_requested', '<div class="errorMessage">:message</div>') !!}
	</p>
	
	<div class="row question">
		<p>
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
		</p>
	</div>
	
	<p>
	    {!! Form::submit('Update') !!}
	</p>
	
	<a href="{{ action('AdminHolidayController@index') }}">cancel</a>

	{{ Form::close() }}

</div>

<script>

	new Vue({
		el: '#app',
		
		data: {
			days: '{!! $holiday->hours_requested / 8 !!}',
		},
		
		computed: {
			hours: function () {
    			return this.days * 8
    		}
		}
	})
	
</script>

@stop