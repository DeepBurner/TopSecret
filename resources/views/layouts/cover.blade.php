<!DOCTYPE html>
<html lang="en">
    <head>
        <title>@yield('title')</title>
		
        <!-- Stylesheets -->
		<link rel="stylesheet" type="text/css" href="{{URL::asset('css/bootstrap.min.css')}}">
		<link rel="stylesheet" type="text/css" href="{{URL::asset('themes/simurg/css/main.css')}}">
		<link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme.green.css')}}">
        <!-- Fonts -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Raleway:regular">
		 <!-- Scripts -->
		<script>var navFix = 1;</script>
        @yield('head')
    </head>
    <body>
		<!-- Navigation -->
        @include('includes.navbar')
		
		<!-- Header -->
		@yield('header')
	
		<!-- Page Content -->
		@yield('content')
		
		<!-- Footer -->
		@yield('footer')
		
		<!-- Scripts -->
		<script type="text/javascript" src="{{URL::asset('js/jquery-3.1.1.min.js') }}"></script>
		<script type="text/javascript" src="{{URL::asset('js/jquery-migrate-3.0.0.min.js') }}"></script>
		<script type="text/javascript" src="{{URL::asset('js/bootstrap-3.3.7.min.js') }}"></script>
		<script type="text/javascript" src="{{URL::asset('js/app.js') }}"></script>
		<script type="text/javascript" src="{{URL::asset('js/fixnavbar.js') }}"></script>
		@yield('script')
    </body>
</html>