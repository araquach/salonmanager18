<!doctype html>

<html>

@section('head')

@show

<body>

<div container>

	<header>
		<div id="logo"><a href="{{ url('/') }}"><h1>Salon Manager</h1></a></div>

		<ul class="list--inline">
        	<li><a href="{{ url('/') }}">Home</a></li>
        	<li><a href="{{ url('/holiday/index') }}">Holidays</a></li>
        	<li><a href="{{ url('/sick/index') }}">Sick Days</a></li>
        	<li><a href="{{ url('/lieu/index') }}">Lieu Hours</a></li>
        	<li><a href="{{ url('/freetime/index') }}">Free Time</a></li>
        </ul>
	</header>
	
	
		@yield('content')
	
	<footer>
			<ul class="list--inline">
				<li><a href="{{ url('/') }}">Home</li>
				@if (Auth::guest())
					<li><a href="{{ url('/login') }}">Login</a></li>
                @else 
				<li><a href="{{ url('/logout') }}">Logout</a></li>
				@endif
				@if(Auth::user() && Auth::user()->staff->role == 1)
					<li><a href="{{ url('/admin') }}">Admin</a></li>
				@endif
			</ul>
	</footer>
	

</div><!-- page -->

</body>
</html>
