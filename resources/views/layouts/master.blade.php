<!DOCTYPE html>
<html lang="en">
    <head>
        <title>@yield('title')</title>
		
        <!-- Stylesheets -->
		<link rel="stylesheet" type="text/css" href="{{URL::asset('css/bootstrap.min.css')}}">
		<link rel="stylesheet" type="text/css" href="{{URL::asset('css/main.css')}}">
        <!-- Fonts -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Raleway:regular">
    </head>
    <body>
		<!-- Navigation -->
        @include('includes.navbar')
		
		<!-- Header -->
		@yield('header')
		
		<!-- Page Content -->
        <div class="container">
            @yield('content')
        </div>
		
		<!-- Footer -->
		@yield('footer')
		
		<!-- Scripts -->
		<script type="text/javascript" src="{{URL::asset('js/jquery-3.1.1.min.js') }}"></script>
		<script type="text/javascript" src="{{URL::asset('js/jquery-migrate-3.0.0.min.js') }}"></script>
		<script type="text/javascript" src="{{URL::asset('js/bootstrap-3.3.7.min.js') }}"></script>
		<script type="text/javascript" src="{{URL::asset('js/app.js') }}"></script>
		@yield('script')
    </body>
</html>