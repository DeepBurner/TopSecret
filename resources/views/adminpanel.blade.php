@extends('layouts.modular')

@section('title')
    Admin Panel
@endsection

@section('header')
		<h1>Admin Panel</h1>
		<h4>Welcome back {{ Auth::user()->username }}!</h4>
@endsection

@section('right-column')
		<div class="panel panel-default panel-modular">
			<div class="panel-heading">Create a new field</div>
			<div class="panel-body">
				<form action="{{ route('panel.addfield') }}" method="post">
					<div class="form-group col-lg-4">
						<label for="fieldname">Field Name:</label>
						<input class="form-control" type="text" name="fieldname" id="fieldname" placeholder="Name">
					</div>
					
					<div class="form-group col-lg-4">
						<label for="fieldname">Field Description:</label>
						<input class="form-control" type="text" name="description" id="description" placeholder="Description">
					</div>
					
					<div class="form-group col-lg-4" style="margin-top: 25px;" >
						<button type="submit" class="btn btn-primary" name="button1">Add</button>
						<input type="hidden" name="_token" value="{{ Session::token() }}">
					</div>
				</form>
			</div>
		</div>
		
		<div class="panel panel-default panel-modular">
			<div class="panel-heading">Create a new blog post</div>
			<div class="panel-body">
				<form action="{{ route('panel.addblogpost') }}" method="post">
					<div class="form-group col-lg-4">
						<label for="fieldname">Blog Post Title:</label>
						<input class="form-control" type="text" name="title" id="title" placeholder="Title">
					</div>
					
					<div class="form-group col-lg-8" style="margin-top: 25px;" >
						<button type="submit" class="btn btn-primary" name="button1">Add</button>
						<input type="hidden" name="_token" value="{{ Session::token() }}">
					</div>
					
					<div class="form-group col-lg-4">
						<label for="fieldname">Blog Post Body:</label>
						<textarea class="form-control" name="body" id="body"  rows="5" placeholder="Body"></textarea>
					</div>
				</form>
			</div>
		</div>
		
		<div class="panel panel-default panel-modular">
			<div class="panel-heading">Create a new user</div>
			<div class="panel-body">
				<form action="{{ route('panel.adduser') }}" method="post">
					<div class="form-group col-lg-3">
						<label for="fieldname">Username:</label>
						<input class="form-control" type="text" name="username" id="username" placeholder="Username">
					</div>
					
					<div class="form-group col-lg-3">
						<label for="fieldname">Email:</label>
						<input class="form-control" type="text" name="email" id="email" placeholder="Email">
					</div>
					
					<div class="form-group col-lg-3">
						<label for="fieldname">Password:</label>
						<input class="form-control" type="password" name="password" id="password" placeholder="●●●●●●">
					</div>
					
					<div class="form-group col-lg-3" style="margin-top: 25px;" >
						<button type="submit" class="btn btn-primary" name="button1">Add</button>
						<input type="hidden" name="_token" value="{{ Session::token() }}">
					</div>
				</form>
			</div>
		</div>
@endsection
