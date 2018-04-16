<!doctype html>

<html>

@section('head')

@show

<body>

<script   src="https://code.jquery.com/jquery-3.3.1.min.js"   integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="   crossorigin="anonymous"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>

<script>
  $( function() {
    $(".datepicker").datepicker({ dateFormat: "yy-mm-dd" });
  } );
</script>



<div class="container">

	<header>
		<div id="logo"><a href="{{ url('/') }}"><h1>Salon Manager</h1></a></div>

    	<a href="{{ url('/') }}"" class="button">Home</a>
    	<a href="{{ url('/holiday/index') }}" class="button">Holidays</a>
    	<a href="{{ url('/sick/index') }}" class="button">Sick Days</a>
    	<a href="{{ url('/lieu/index') }}" class="button">Lieu Hours</a>
    	<a href="{{ url('/freetime/index') }}" class="button">Free Time</a>
    </header>
	
	@yield('content')
	
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

<script src="/js/app.js"></script>

</body>
</html>
