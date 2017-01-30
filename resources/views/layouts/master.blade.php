<!DOCTYPE html>
<html lang="en">
    <head>
        <title>@yield('title')
		</title>
		
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

		<!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>
		<script type="text/javascript" src="{{URL::asset('js/bootstrap.min.js') }}"></script>
		<script type="text/javascript" src="{{URL::asset('js/app.js') }}"></script>

    </body>
</html>