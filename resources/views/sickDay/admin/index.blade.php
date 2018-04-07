@extends('layouts.main')

@section('head')

@include('layouts.partials.head')

@stop

@section('content')

<div class="pageHead sickDay">
	<a href="{{ url('/admin') }}"><h3>Admin</h3></a>

	@include('widgets.admin.sickDay')

	<nav class"pageHeadNav">
		<a href="{{ url('/admin/sick/create') }}" class="button button-outline">Log Sick Day</a>
		<a href="{{ url('/admin/sick/index', 'awaiting') }}" class="button button-outline">Awaiting Deduction</a>
		<a href="{{ url('/admin/sick/index', 'deducted') }}" class="button button-outline">Deducted Sick</a>
		<a href="{{ url('/admin/sick/index', 'all') }}" class="button button-outline">All Sick Days</a>
	</nav>

</div> <!--.pageHead sickDay-->

<div class="views">

	@foreach($sickDays as $sickDay)
	
	<a href="/admin/sick/view/{{ $sickDay->id }}" >
		<div class="view @if($sickDay->deducted == 1) 
							approved 
						@else 
							pending 
						@endif" >
							
			<b>{!! $sickDay->staff->first_name !!} {!! $sickDay->staff->second_name !!}</b> 
			<br>
			
			<b>From:</b> 
			{{ $sickDay->sick_from->format('d/m/Y') }}
			<br>
		
			<b>To:</b> 
			{{ $sickDay->sick_to->format('d/m/Y') }}
			<br>
			
			<b>Days Sick:</b> 
			{!! calculateDays($sickDay->sick_hours) !!}
			<br>
		</div>
	</a>
	
	@endforeach

</div>

@stop