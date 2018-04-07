@extends('layouts.main')

@section('head')

@include('layouts.partials.head')

@stop

@section('content')

<div class="detail sickDay">


<table class="detail-view @if($sickDay->deducted == 1)
							approved
						@else
							pending
						@endif">
	
	<tr>
		<th>Sick Day</th>
		<td><img src="{{ asset('/images/icons/icons_sick.png') }}" class="thumb"/>
		</td>
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
		<td><strong>Sick Days:</strong></td>
		<td>{{ calculateDays($sickDay->sick_hours) }}</td>
	</tr>
	<tr>
		<td><strong>Description:</strong></td>
		<td>{{ $sickDay->description }}</td>
	</tr>
	<tr>
		<td><strong>Deducted:</strong></td>
		<td>{{ $sickDay->deducted ? 'Yes' : 'No' }}</td>
	</tr>
	
</table>

{!! link_to('/sick/index', 'Back to Sick Days overview') !!}

</div> <!-- detail sickDay  -->


@stop