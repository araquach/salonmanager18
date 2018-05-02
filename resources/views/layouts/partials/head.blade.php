<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Open Graph Tags -->
	<meta property="og:title" content="{{ $ogtitle or 'Salon Manager' }}">
    <meta property="og:description" content="{{ $ogdescription or '' }}">
	<meta property="og:image" content="{{ $ogimage or url('/') . '/images/ogimage/home.jpg' }}">
	<meta property="og:url" content="{{ url()->current() }}">
	
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	
	<!--Google analytics -->

	<title>{{ $title or 'Salon Manager' }}</title>
	
	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}" defer></script>
	
	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>