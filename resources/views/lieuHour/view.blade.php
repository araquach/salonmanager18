@extends('layouts.main')

@section('head')

@include('layouts.partials.head')

@stop

@section('content')

<div class="detail lieuHour">


<table class="detail-view @if($lieuHour->approved == 1)
							unapproved
						@elseif($lieuHour->approved == 2)
							approved
						@else
							pending
						@endif">
	
	<tr>
		<th>Lieu Hour Request</th>
		<td><img src="{{ asset('/images/icons/icons_lieu.png') }}" class="thumb"/>
		</td>
	</tr>
	<tr>
		<td><strong>Add/Redeem:</strong></td>
		<td>
			@if($lieuHour->add_redeem == 1)
				<b>Add</b>
			@elseif($lieuHour->add_redeem == 2)
				<b>Redeem</b>
			@else
				<b>Not Sure</b>
			@endif
		</td>
	</tr>
	<tr>
		<td><strong>Date requested:</strong></td>
		<td>{{ $lieuHour->date_regarding->format('D d/m/Y') }}</td>
	</tr>
	<tr>
		<td><strong>Hours Requested:</strong></td>
		<td>{!! $lieuHour->lieu_hours !!}</td>
	</tr>
	<tr>
		<td><strong>Description:</strong></td>
		<td>{{ $lieuHour->description }}</td>
	</tr>
	<tr>
		<td><strong>Approved:</strong></td>
		<td>
			@if($lieuHour->approved == 1)
				No
			@elseif($lieuHour->approved == 2)
				Yes
			@else
				Waiting Approval
			@endif
		</td>
	</tr>
</table>

@if($lieuHour->approved < 1)
<div class="edit-button">
	<a href="/lieu/{{ $lieuHour->id }}/edit">Edit</a>
</div>
@endif

<br>

{!! link_to('lieu/index', 'Back to Lieu Hours overview') !!}

</div> <!-- detail lieuHour  -->


@stop