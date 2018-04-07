@extends('layouts.main')

@section('head')

@include('layouts.partials.head')

@stop

@section('content')

<div class="pageHead lieuHour">
	<a href="{{ url('/admin') }}"><h3>Admin</h3></a>

	@include('widgets.admin.lieuHour')

	<nav class"pageHeadNav">
		<ul class="list--inline">
			<li><a href="{{ url('/admin/lieu/create') }}">Book lieuHour</a></li>
			<li><a href="{{ url('/admin/lieu/index', 'awaiting') }}">Awaiting Approval</a></li>
			<li><a href="{{ url('/admin/lieu/index', 'approved') }}">Approved Lieu Hours</a></li>
			<li><a href="{{ url('/admin/lieu/index', 'denied') }}">Denied Lieu Hours</a></li>
			<li><a href="{{ url('/admin/lieu/index', 'all') }}">All Lieu Hours</a></li>
		</ul>
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