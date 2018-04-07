@extends('layouts.main')

@section('head')

@include('layouts.partials.head')

@stop

@section('content')

<div class="pageHead sickDay">

@include('widgets.sickDay')

<nav class"pageHeadNav">
	<a href="{{ url('/sick/index', 'deducted') }}" class="button button-outline">Deducted Sick</a>
	<a href="{{ url('/sick/index', 'awaiting') }}" class="button button-outline">Awaiting Deduction</a>
	<a href="{{ url('/sick/index', 'all') }}" class="button button-outline">All Sick Days</a>
</nav>

</div> <!--.pageHead sickDay-->


<div class="views">

@foreach($sickDays as $sickDay)

<a href="/sick/view/{{ $sickDay->id }}" >
	<div class="view @if($sickDay->deducted == 1) 
							approved 
						@else 
							pending 
						@endif" >
	
		<b>From:</b> 
		{{ $sickDay->sick_from->format('d/m/Y') }}
		<br />
	
		<b>To:</b> 
		{{ $sickDay->sick_to->format('d/m/Y') }}
		<br />
		
		<b>Sick Days:</b> 
		{{ calculateDays($sickDay->sick_hours) }}
		<br />
	</div>
</a>

@endforeach

</div>

@stop