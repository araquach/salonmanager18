@extends('layouts.main')

@section('head')

@include('layouts.partials.head')

@stop

@section('content')

<div class="detail holiday">


<table class="detail-view holiday @if($holiday->approved == 1)
							unapproved
						@elseif($holiday->approved == 2)
							approved
						@else
							pending
						@endif">
	
	<tr>
		<th>Holiday Request</th>
		<td><img src="{{ asset('/images/icons/icons_holiday.png') }}" class="thumb"/>
		</td>
	</tr>
	<tr>
		<td><strong>From:</strong></td>
		<td>{{ $holiday->request_date_from->format('d/m/Y') }}</td>
	</tr>
	<tr>
		<td><strong>To:</strong></td>
		<td>{{ $holiday->request_date_to->format('d/m/Y') }}</td>
	</tr>
	<tr>
		<td><strong>Days Requested:</strong></td>
		<td>{!! calculateDays($holiday->hours_requested) !!}</td>
	</tr>
	<tr>
		<td><strong>Approved:</strong></td>
		<td>
			@if($holiday->approved == 1)
				No
			@elseif($holiday->approved == 2)
				Yes
			@else
				Waiting Approval
			@endif
		</td>
	</tr>
	<tr>
		<td>
			@if($holiday->saturday == 0.5) 
		 	<img src="{{ asset('/images/icons/icons_halfxsat.png') }}" />
			@elseif($holiday->saturday == 1)
				<img src="{{ asset('/images/icons/icons_1xsat.png') }}" />
			@elseif($holiday->saturday == 1.5)
				<img src="{{ asset('/images/icons/icons_1andhalfxsat.png') }}" />
			@elseif($holiday->saturday == 2)
				<img src="{{ asset('/images/icons/icons_2xsat.png') }}" />
			@endif
		</td>
		<td>
			@if($holiday->prebooked ==1)
			<img src="{{ asset('images/icons/pb-11.png') }}">
			@endif
		</td>
	</tr>
</table>

@if($holiday->approved < 1)
<div class="edit-button">
	<a href="/holiday/{{ $holiday->id }}/edit">Edit</a>
</div>
@endif

<br>
{!! link_to('/holiday/index', 'Back to Holidays overview') !!}

</div> <!-- detail holiday  -->


@stop