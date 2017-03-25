<!DOCTYPE html>
<html lang="en">
    <head>
        <title>@yield('title')</title>
		
        <!-- Stylesheets -->
		<link rel="stylesheet" type="text/css" href="{{URL::asset('css/bootstrap.min.css')}}">
		<link rel="stylesheet" type="text/css" href="{{URL::asset('css/main.css')}}">
		<link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme.green.css')}}">
        <!-- Fonts -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Raleway:regular">
		 <!-- Scripts -->
		<script>var navFix = 0;</script>
		<script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>
		<script>tinymce.init({ selector:'textarea'});</script>
        @yield('head')
    </head>
    <body>
		<!-- Navigation -->
        @include('includes.navbar')
		
		<!-- Header -->
		<div class="container-fluid header">
			<div class="col-md-6 col-md-offset-3">
				<div class="">
					<div class="header-text">
						@yield('header')
					</div>
				</div>
			</div>
		</div>
	
		<!-- Left Column -->
		<div class="col-lg-2 colcol-lg-offset-1 col-xs-10 col-xs-offset-1" >
			@if (Auth::guest())
			<!-- Login Panel -->
			<div class="panel panel-default panel-modular">
				<div class="panel-heading">Log In</div>
				<div class="panel-body">@include('includes/login-pane')</div>
			</div>
			@endif
			
			<!-- Search Panel -->
			<div class="panel-modular">
				<form action="{{route('search')}}" method="post">
					<div class="form-group .has-feedback" >
						<input type="text" class="form-control" placeholder="Search" name="to_search" id="to_search">
						<i class="glyphicon glyphicon-search form-control-feedback"></i>
					</div>
					<input type="hidden" name="_token" value="{{ Session::token() }}">
				</form>
			</div>
			
			@yield('left-column')	
		</div>
		
		<!-- Right Column -->
		<div class="col-lg-8 col-lg-offset-0 col-xs-10 col-xs-offset-1">
			@yield('right-column')
		</div>
			
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