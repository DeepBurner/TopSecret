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
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Noto+Sans"> 
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto">
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
			<div class="container header-ghost">
				<div class="col-md-6 col-md-offset-3">
					<div class="">
						<div class="header-text">
							@yield('header')
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Page Content -->
		<div class="col-lg-8 col-lg-offset-2 col-xs-10 col-xs-offset-1">
			<div class="panel panel-default panel-content">
				<div class="panel-heading">
					@yield('page-heading')
				</div>
				<div class="panel-body">
					@yield('page-content')
				</div>
				<div class="panel-footer">
					
				</div>
			</div>
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