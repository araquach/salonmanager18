<!doctype html>

<html>

	@section('head')

	@show

	<body>
		<div class="container">
			<header>
				<div id="logo"><a href="{{ url('/') }}"><h1>Salon Manager</h1></a></div>

		    	<a href="{{ url('/') }}" class="button">Home</a>
		    	<a href="{{ url('/holiday/index') }}" class="button">Holidays</a>
		    	<a href="{{ url('/sick/index') }}" class="button">Sick Days</a>
		    	<a href="{{ url('/lieu/index') }}" class="button">Lieu Hours</a>
		    	<a href="{{ url('/freetime/index') }}" class="button">Free Time</a>
		    </header>
			
			<div id="newapp">
			@yield('content')
			</div>
			
			<footer class="row">
				<a href="{{ url('/') }}" class="button button-clear">Home</a>
				@if (Auth::guest())
					<a href="{{ url('/login') }}" class="button button-clear">Login</a>
		        @else 
				
					<a href="{{ route('logout') }}"
		               onclick="event.preventDefault();
		                             document.getElementById('logout-form').submit();" class="button button-clear">
		                {{ __('Logout') }}
		            </a>
				        
		            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
		                @csrf
		            </form>
				@endif
				@if(Auth::user() && Auth::user()->staff->role == 1)
					<a href="{{ url('/admin') }}" class="button button-clear">Admin</a>
				@endif
			</footer>
		</div>
	</body>
</html>
