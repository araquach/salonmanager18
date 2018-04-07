@extends('layouts.main')

@section('head')

@include('layouts.partials.head')

@stop

@section('content')

<div class="form lieuHour">
	
	<h2>Edit Lieu Request</h2>
	
@if(Session::has('message'))
    <div>
    {{{ Session::get('message') }}}
    </div>
@endif

{!! Form::model($lieuHour, ['method' => 'PATCH', 'action' => ['LieuHourController@update', $lieuHour->id]]) !!}

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
	
	<div class="row question">
		<p>
	    	<p class="scale_label">Add</p>
	    	{!! Form::radio('add_redeem', '1') !!}
	    	<p class="scale_label">Redeem</p>
	    	{!! Form::radio('add_redeem', '2') !!}
	        
	    	{!! $errors->first('add_redeem', '<div class="errorMessage">:message</div>') !!}
		</p>
	</div>
	
	<p>
    	{!! Form::label('date_regarding', 'Date:') !!}
    	{!! Form::date('date_regarding') !!}
    	{!! $errors->first('date_regarding', '<div class="errorMessage">:message</div>') !!}
	</p>
	
	<p>
    	{!! Form::label('lieu_hours', 'Hours:') !!}
    	{!! Form::text('lieu_hours') !!}
    	{!! $errors->first('lieu_hours', '<div class="errorMessage">:message</div>') !!}
	</p>
	
	<p>
    	{!! Form::label('description', 'Description:') !!}
    	{!! Form::text('description') !!}
    	{!! $errors->first('description', '<div class="errorMessage">:message</div>') !!}
	</p>
	
	<p>
	    {!! Form::submit('Update') !!}
	</p>
	
	<a href="{{ action('LieuHourController@index') }}">cancel</a>

{{ Form::close() }}


</div>

@stop