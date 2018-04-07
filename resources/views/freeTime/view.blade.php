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
		<th>Free Time Request</th>
		<td><img src="{{ asset('/images/icons/icons_freeTime.png') }}" class="thumb"/>
		</td>
	</tr>
	<tr>
		<td><strong>Date:</strong></td>
		<td>{{ $freeTime->date_regarding->format('D d/m/Y') }}</td>
	</tr>
	<tr>
		<td><strong>Hours Requested:</strong></td>
		<td>{!! $freeTime->free_time_hours !!}</td>
	</tr>
	<tr>
		<td><strong>Description:</strong></td>
		<td>{{ $freeTime->description }}</td>
	</tr>
	<tr>
		<td><strong>Approved:</strong></td>
		<td>
			@if($freeTime->approved == 1)
				No
			@elseif($freeTime->approved == 2)
				Yes
			@else
				Waiting Approval
			@endif
		</td>
	</tr>
</table>

@if($freeTime->approved < 1)
	<div class="edit-button">
		<a href="/freetime/{{ $freeTime->id }}/edit">Edit</a>
	</div>
@endif

<br>

{!! link_to('/freetime/index', 'Back to Free Time overview') !!}

</div> <!-- detail freeTime  -->


@stop