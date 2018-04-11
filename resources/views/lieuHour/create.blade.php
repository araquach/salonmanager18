@extends('layouts.main')

@section('head')

@include('layouts.partials.head')

@stop

@section('content')

<div class="form lieuHour">
	
	<h2>Lieu Hours</h2>
	
@if(Session::has('message'))
    <div>
    {{{ Session::get('message') }}}
    </div>
@endif

{!! Form::model(array(
	'action' => 'LieuHourController@store'
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
	
	<div class="row question">

    	<p class="scale_label">Add</p>
    	{!! Form::radio('add_redeem', '1') !!}
    	<p class="scale_label">Redeem</p>
    	{!! Form::radio('add_redeem', '2') !!}
        
    	{!! $errors->first('add_redeem', '<div class="errorMessage">:message</div>') !!}
		
	</div>
	

	{!! Form::label('date_regarding', 'Date:') !!}
	{!! Form::text('date_regarding', '', ['class' => 'datepicker']) !!}
	{!! $errors->first('date_regarding', '<div class="errorMessage">:message</div>') !!}

	{!! Form::label('lieu_hours', 'Hours:') !!}
	{!! Form::text('lieu_hours') !!}
	{!! $errors->first('lieu_hours', '<div class="errorMessage">:message</div>') !!}

	{!! Form::label('description', 'Description:') !!}
	{!! Form::text('description') !!}
	{!! $errors->first('description', '<div class="errorMessage">:message</div>') !!}
	
	{!! Form::submit('Save') !!}
	
	<a href="{{ action('LieuHourController@index') }}">cancel</a>

{{ Form::close() }}


</div>

@stop