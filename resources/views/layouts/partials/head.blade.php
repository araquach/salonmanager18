<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Salon Manager">
	
	<meta property="og:title" content="{{ $ogtitle or 'Salon Manager' }}">
    <meta property="og:description" content="{{ $ogdescription or '' }}">
	<meta property="og:image" content="{{ $ogimage or url('/') . '/images/ogimage/home.jpg' }}">
	<meta property="og:url" content="{{ url()->current() }}">
	
	
	<!--Google analytics -->

	<title>{{ $title or 'Salon Manager' }}</title>

	<script src="{{ asset('js/app.js') }}" defer></script>
	
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>