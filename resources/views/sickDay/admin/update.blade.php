@extends('layouts.main')

@section('head')

@include('layouts.partials.head')

@stop

@section('content')

<div class="form sickDay" id="app">
	
	<h2>Update Sick Days</h2>
	
	@if(Session::has('message'))
	    <div>
	    	{{{ Session::get('message') }}}
	    </div>
	@endif
	
	{!! Form::model($sickDay, ['method' => 'PATCH', 'action' => ['AdminSickDayController@update', $sickDay->id]]) !!}
	
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
	    	{!! Form::label('sick_from', 'From:') !!}
	    	{!! Form::date('sick_from') !!}
	    	{!! $errors->first('sick_from', '<div class="errorMessage">:message</div>') !!}
		</p>
		
		<p>
	    	{!! Form::label('sick_to', 'To:') !!}
	    	{!! Form::date('sick_to') !!}
	    	{!! $errors->first('sick_to', '<div class="errorMessage">:message</div>') !!}
		</p>
		
			<p>
			{!! Form::label('sick_hours', 'Number of days:') !!}
			
			<input v-model="days" name="sick_hours" type="number" id="sick_hours">
			
			<input v-model="hours"input name="sick_hours" type="hidden">
			{!! $errors->first('sick_hours', '<div class="errorMessage">:message</div>') !!}
		</p>
		
		<p>
	    	{!! Form::label('description', 'Description:') !!}
	    	{!! Form::text('description') !!}
	    	{!! $errors->first('description', '<div class="errorMessage">:message</div>') !!}
		</p>
		
		<div class="row question">
			<p>
		    	<p class="scale_label">Deducted</p>
		    	{!! Form::radio('deducted', '1') !!}
		    	<p class="scale_label">Pending</p>
		    	{!! Form::radio('deducted', '0') !!}
			</p>
		</div>
		
		<p>
		    {!! Form::submit('Update') !!}
		</p>
		
		<a href="{{ action('AdminSickDayController@index') }}">cancel</a>
	
	{{ Form::close() }}

</div>

<script>

	new Vue({
		el: '#app',
		
		data: {
			days: '{!! $sickDay->sick_hours / 8 !!}',
		},
		
		computed: {
			hours: function () {
    			return this.days * 8
    		}
		}
	})
	
</script>

@stop