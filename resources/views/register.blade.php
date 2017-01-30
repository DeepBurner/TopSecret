@extends('layouts.master-cover')

@section('title')
	Register
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
					<div class="col-md-4 cover-header-body">
						<div class="panel panel-default cover-header-body-panel">
							<div class="panel-heading">Login</div>
							<div class="panel-body">
								@include('includes.login-pane')
							</div>
						</div>
					</div>
					<div class="col-md-4"></div>
					<div class="col-md-4 cover-header-body">
						<div class="panel panel-default cover-header-body-panel">
							<div class="panel-heading">Register</div>
							<div class="panel-body">
								@include('includes.register-pane')
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection