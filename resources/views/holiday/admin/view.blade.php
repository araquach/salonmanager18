@extends('layouts.main')

@section('head')

@include('layouts.partials.head')

@stop

@section('content')

<div class="detail holiday">

<table class="detail-view @if($holiday->approved == 1)
							unapproved
						@elseif($holiday->approved == 2)
							approved
						@else
							pending
						@endif">
	<tr>
		<td><strong>Staff:</strong></td>
		<td>{{ $holiday->staff->first_name }} {{ $holiday->staff->second_name }}</td>
	</tr>
	<tr>
		<td><strong>From:</strong></td>
		<td>{{ $holiday->request_date_from->format('D d/m/Y') }}</td>
	</tr>
	<tr>
		<td><strong>To:</strong></td>
		<td>{{ $holiday->request_date_to->format('D d/m/Y') }}</td>
	</tr>
	<tr>
		<td><strong>Days Requested:</strong></td>
		<td>{{ calculateDays($holiday->hours_requested) }}</td>
	</tr>
	<tr>
		<td><strong>Prebooked:</strong></td>
		<td>{{ $holiday->prebooked ? 'Yes' : 'No'}}</td>
	</tr>
	<tr>
		<td><strong>Saturday:</strong></td>
		<td>{{ $holiday->saturday}}</td>
	</tr>
	<tr>
		<td><strong>Request Date:</strong></td>
		<td>{{ $holiday->created_at->format('d/m/Y') }}</td>
	</tr>
</table>

<div class="edit-button">
	<a href="{{ action('AdminHolidayController@edit', $holiday) }}">Edit the information</a>
</div>

<div class="form holiday">
	
@if(Session::has('message'))
    <div>
    {{{ Session::get('message') }}}
    </div>
@endif
	
{!! Form::model($holiday, [
	'method' => 'PATCH', 
	'action' => ['AdminHolidayController@authorise', $holiday->id]
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
	
	<a href="{{ action('AdminHolidayController@index') }}">cancel</a>

{{ Form::close() }}


</div>

{!! link_to('admin/holiday/index', 'Back to Holidays overview') !!}


</div> <!-- detail holiday  -->

@stop