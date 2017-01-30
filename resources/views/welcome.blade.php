@extends('layouts.master-cover')

@section('title')
	Top Secret
@endsection

@section('content')<!-- Header -->
		<div id="top" class="cover-header">
			<div class="container">
				<div class="row">
					<div class="col-md-12 cover-header-text">
						<span>Top Secret is </span>
						<span id="typed"></span>
					</div>
				</div>
				@include('includes.message-block-alert')
				<div class="row">
					<div class="col-md-6 cover-header-body cover-header-body-text">
						<h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur accumsan sem ut augue consequat, 
							non sollicitudin odio maximus. Nulla nec facilisis erat. Ut at pellentesque ex, eu posuere augue. 
							Donec non lobortis nisi. Fusce sagittis interdum lectus. Pellentesque vitae libero vel nunc sodales 
							porta. Nunc lacus diam, pretium eu augue at, placerat aliquet elit.</h3>
					</div>
					<div class="col-md-2"></div>
					<div class="col-md-4 cover-header-body">
						<div class="panel panel-default cover-header-body-panel">
							<div class="panel-body">
								<ul class="nav nav-tabs">
									<li class="active"><a data-toggle="tab" href="#login">Login</a></li>
									<li><a data-toggle="tab" href="#register">Register</a></li>
								</ul>

								<div class="tab-content">
									<div id="login" class="tab-pane fade in active">
										@include('includes.login-pane')
									</div>
									<div id="register" class="tab-pane fade">
										@include('includes.register-pane')
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection