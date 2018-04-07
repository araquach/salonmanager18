@extends('layouts.main')

@section('head')

@include('layouts.partials.head')

@stop

@section('content')

<div class="detail sickDay">

<table class="detail-view pending">
	<tr>
		<td><strong>Staff:</strong></td>
		<td>{{ $sickDay->staff->first_name }} {{ $sickDay->staff->second_name }}</td>
	</tr>
		<tr>
		<td><strong>From:</strong></td>
		<td>{{ $sickDay->sick_from->format('D d/m/Y') }}</td>
	</tr>
	<tr>
		<td><strong>To:</strong></td>
		<td>{{ $sickDay->sick_to->format('D d/m/Y') }}</td>
	</tr>
	<tr>
		<td><strong>Days Sick:</strong></td>
		<td>{{ calculateDays($sickDay->sick_hours) }}</td>
	</tr>
	<tr>
		<td><strong>Description:</strong></td>
		<td>{{ $sickDay->description }}</td>
	</tr>
	<tr>
		<td><strong>Deducted:</strong></td>
		<td>{{ $sickDay->deducted ? 'Yes' : 'No'}}</td>
	</tr>
	<tr>
		<td><strong>Logged Date:</strong></td>
		<td>{{ $sickDay->created_at->format('d/m/Y') }}</td>
	</tr>
</table>

<div class="edit-button">
	<a href="{{ action('AdminSickDayController@edit', $sickDay) }}">Edit the information</a>
</div>

<br>

{!! link_to('admin/sick/index', 'Back to Sick Days overview') !!}

</div> <!-- detail sickDay  -->

@stop