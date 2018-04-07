@extends('layouts.main')

@section('head')

@include('layouts.partials.head')

@stop

@section('content')

<div class="pageHead sickDay">
	<a href="{{ url('/admin') }}"><h3>Admin</h3></a>

	@include('widgets.admin.sickDay')

	<nav class"pageHeadNav">
		<ul class="list--inline">
			<li><a href="{{ url('/admin/sick/create') }}">Log Sick Day</a></li>
			<li><a href="{{ url('/admin/sick/index', 'awaiting') }}">Awaiting Deduction</a></li>
			<li><a href="{{ url('/admin/sick/index', 'deducted') }}">Deducted Sick</a></li>
			<li><a href="{{ url('/admin/sick/index', 'all') }}">All Sick Days</a></li>
		</ul>
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