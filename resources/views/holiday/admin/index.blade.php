@extends('layouts.main')

@section('head')

@include('layouts.partials.head')

@stop

@section('content')

<div class="pageHead holiday">
	<a href="{{ url('/admin') }}"><h3>Admin</h3></a>

	@include('widgets.admin.holiday')

	<nav class"pageHeadNav">
		<a href="{{ url('/admin/holiday/create') }}" class="button button-outline">Book holiday</a>
		<a href="{{ url('/admin/holiday/index', 'awaiting') }}" class="button button-outline">Awaiting Approval</a>
		<a href="{{ url('/admin/holiday/index', 'approved') }}" class="button button-outline">Approved Holidays</a>
		<a href="{{ url('/admin/holiday/index', 'denied') }}" class="button button-outline">Denied Holidays</a>
		<a href="{{ url('/admin/holiday/index', 'all') }}" class="button button-outline">All Holidays</a>
	</nav>

</div> <!--.pageHead holiday-->

<div class="views">

@foreach($holidays as $holiday)

<a href="/admin/holiday/view/{{ $holiday->id }}" >
	<div class="view @if($holiday->approved == 1) 
							unapproved 
						@elseif($holiday->approved == 2) 
							approved 
						@else 
							pending 
						@endif" >
						
		<p>{!! $holiday->staff->first_name !!} {!! $holiday->staff->second_name !!}</p>
	
		<p>From:</p> 
		<p>{{ $holiday->request_date_from->format('d/m/Y') }}</p>
	
		<p>To:</p> 
		<p>{{ $holiday->request_date_to->format('d/m/Y') }}</p>
		
		<p>Requested:</p> 
		<p>{!! calculateDays($holiday->hours_requested) !!}</p>
		
		@if($holiday->saturday == 0.5) 
		 	<img src="{{ asset('/images/icons/icons_halfxsat.png') }}" />
		@elseif($holiday->saturday == 1)
			<img src="{{ asset('/images/icons/icons_1xsat.png') }}" />
		@elseif($holiday->saturday == 1.5)
			<img src="{{ asset('/images/icons/icons_1andhalfxsat.png') }}" />
		@elseif($holiday->saturday == 2)
			<img src="{{ asset('/images/icons/icons_2xsat.png') }}" />
		@endif
		
		@if($holiday->prebooked ==1)
			<img src="{{ asset('images/icons/pb-11.png') }}">
		@endif
	</div>
</a>

@endforeach

</div>

@stop