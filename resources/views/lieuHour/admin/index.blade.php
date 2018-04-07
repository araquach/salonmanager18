@extends('layouts.main')

@section('head')

@include('layouts.partials.head')

@stop

@section('content')

<div class="pageHead lieuHour">
	<a href="{{ url('/admin') }}"><h3>Admin</h3></a>

	@include('widgets.admin.lieuHour')

	<nav class"pageHeadNav">
		<a href="{{ url('/admin/lieu/create') }}" class="button button-outline">Book lieuHour</a>
		<a href="{{ url('/admin/lieu/index', 'awaiting') }}" class="button button-outline">Awaiting Approval</a>
		<a href="{{ url('/admin/lieu/index', 'approved') }}" class="button button-outline">Approved Lieu Hours</a>
		<a href="{{ url('/admin/lieu/index', 'denied') }}" class="button button-outline">Denied Lieu Hours</a>
		<a href="{{ url('/admin/lieu/index', 'all') }}" class="button button-outline">All Lieu Hours</a>
	</nav>

</div> <!--.pageHead lieuHour-->

<div class="views">

@foreach($lieuHours as $lieuHour)
	
	<a href="/admin/lieu/view/{{ $lieuHour->id }}" >
		<div class="view @if($lieuHour->approved == 1) 
								unapproved 
							@elseif($lieuHour->approved == 2) 
								approved 
							@else 
								pending 
							@endif" >
							
			<b>{!! $lieuHour->staff->first_name !!} {!! $lieuHour->staff->second_name !!}</b>
			
			@if($lieuHour->add_redeem == 1)
				<b>Add</b>
			@elseif($lieuHour->add_redeem == 2)
				<b>Redeem</b>
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
			
		</div>
	</a>
	
	@endforeach

</div>

@stop