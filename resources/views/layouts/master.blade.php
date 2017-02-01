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
        <script
                src="https://code.jquery.com/jquery-3.1.1.js"
                integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
                crossorigin="anonymous"></script>
        <script
                src="https://code.jquery.com/jquery-migrate-3.0.0.js"
                integrity="sha256-lsVOB+3Yhm6He5MkTO3Bw/Xw4NXK7wYYTi1Y+M/2PrM="
                crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<script type="text/javascript" src="{{URL::asset('js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{URL::asset('js/message.js') }}"></script>
    </body>
</html>