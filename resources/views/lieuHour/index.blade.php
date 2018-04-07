@extends('layouts.main')

@section('head')

@include('layouts.partials.head')

@stop

@section('content')

<div class="pageHead lieuHour">

@include('widgets.lieuHour')

<nav class"pageHeadNav">
	<a href="{{ url('/lieu/create') }}" class="button button-outline">Log Lieu Hours</a>
	<a href="{{ url('/lieu/index', 'upcoming') }}" class="button button-outline">Upcoming Lieu</a>
	<a href="{{ url('/lieu/index', 'awaiting') }}" class="button button-outline">Awaiting Approval</a>
	<a href="{{ url('/lieu/index', 'denied') }}" class="button button-outline">Denied Lieu Hours</a>
	<a href="{{ url('/lieu/index', 'all') }}" class="button button-outline">All Lieu Hours</a>
</nav>

</div> <!--.pageHead lieuHour-->


<div class="views">

	@foreach($lieuHours as $lieuHour)
	
	<a href="/lieu/view/{{ $lieuHour->id }}" >
		<div class="view @if($lieuHour->approved == 1) 
								unapproved 
							@elseif($lieuHour->approved == 2) 
								approved 
							@else 
								pending 
							@endif" >
							
			
			
			@if($lieuHour->add_redeem == 1)
				<b>Add Hours</b>
			@elseif($lieuHour->add_redeem == 2)
				<b>Redeem Hours</b>
			@else
				<b>Not Sure</b>
			@endif
			
			<br>
			
			<b>Request Date:</b> 
			{{ $lieuHour->date_regarding->format('d/m/Y') }}
			<br>
			
			<b>Hours:</b> 
			{!! $lieuHour->lieu_hours !!}
			
			<br>
			
			@if($lieuHour->approved == 1)
				Denied
				@elseif($lieuHour->approved == 2)
				Approved
				@else
				Waiting Approval
			@endif
			
			<br>
			
		</div>
	</a>
	
	@endforeach

</div>

@stop