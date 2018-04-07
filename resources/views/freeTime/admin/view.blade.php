@extends('layouts.main')

@section('head')

@include('layouts.partials.head')

@stop

@section('content')

<div class="detail freeTime">

	<table class="detail-view @if($freeTime->approved == 1)
								unapproved
							@elseif($freeTime->approved == 2)
								approved
							@else
								pending
							@endif">
		<tr>
			<td><strong>Staff:</strong></td>
			<td>{{ $freeTime->staff->first_name }} {{ $freeTime->staff->second_name }}</td>
		</tr>
		<tr>
			<td><strong>Hours Requested:</strong></td>
			<td>{!! $freeTime->free_time_hours !!}</td>
		</tr>
		<tr>
			<td><strong>Date:</strong></td>
			<td>{{ $freeTime->date_regarding->format('d/m/Y') }}</td>
		</tr>
		<tr>
			<td><strong>Description:</strong></td>
			<td>{{ $freeTime->description }}</td>
		</tr>
		<tr>
			<td><strong>Request Date:</strong></td>
			<td>{{ $freeTime->created_at->format('d/m/Y') }}</td>
		</tr>
	</table>
	
	<div class="edit-button">
		<a href="{{ action('AdminFreeTimeController@edit', $freeTime) }}">Edit the information</a>
	</div>

	<div class="form freeTime">
		
		@if(Session::has('message'))
		    <div>
		    {{{ Session::get('message') }}}
		    </div>
		@endif
		
		{!! Form::model($freeTime, [
			'method' => 'PATCH', 
			'action' => ['AdminFreeTimeController@authorise', $freeTime->id]
		]) !!}
			
		<div class="row question">
			<p>
				{!! Form::label('approved', 'Approval:') !!}
		    	<p class="scale_label">Approved</p>
		    	{!! Form::radio('approved', '2') !!}
		    	<p class="scale_label">Denied</p>
		    	{!! Form::radio('approved', '1') !!}
		        <p class="scale_label">Pending</p>
		        {!! Form::radio('approved', '0') !!}
		        
		    	{!! $errors->first('approved', '<div class="errorMessage">:message</div>') !!}
			</p>
		</div>
			
		<p>
			{!! Form::submit('Save') !!}
		</p>
			
		<a href="{{ action('AdminFreeTimeController@index') }}">cancel</a>
		
		{{ Form::close() }}
	
	</div>

</div> <!-- detail freeTime  -->

@stop