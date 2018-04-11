@extends('layouts.main')

@section('head')

@include('layouts.partials.head')

@stop

@section('content')

<div class="pageHead freeTime">
	<a href="{{ url('/admin') }}"><h3>Admin</h3></a>

	@include('widgets.admin.freeTime')

	<nav class"pageHeadNav">
		<a href="{{ url('/admin/freetime/create') }}" class="button button-outline">Book Free Time</a>
		<a href="{{ url('/admin/freetime/index', 'awaiting') }}" class="button button-outline">Awaiting Approval</a>
		<a href="{{ url('/admin/freetime/index', 'approved') }}" class="button button-outline">Approved Free Time</a>
		<a href="{{ url('/admin/freetime/index', 'denied') }}" class="button button-outline">Denied Free Time</a>
		<a href="{{ url('/admin/freetime/index', 'all') }}" class="button button-outline">All Free Time</a>
	</nav>

</div> <!--.pageHead freeTime-->


<div class="views">

@foreach($freeTimes as $freeTime)

<a href="/admin/freetime/view/{{ $freeTime->id }}" >
	<div class="view @if($freeTime->approved == 1) 
							unapproved 
						@elseif($freeTime->approved == 2) 
							approved 
						@else 
							pending 
						@endif" >
						
		<p>{!! $freeTime->staff->first_name !!} {!! $freeTime->staff->second_name !!}</p>
		
		<p>Date:</p> 
		<p>{{ $freeTime->date_regarding->format('d/m/Y') }}</p>
		
		<p>Hours Requested:</p> 
		<p>{!! $freeTime->free_time_hours !!}</p>

		@if($freeTime->approved == 1)
			Denied
		@elseif($freeTime->approved == 2)
			Approved
		@else
			Waiting Approval
		@endif
	</div>
</a>

@endforeach

</div>

@stop