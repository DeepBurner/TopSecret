@extends('layouts.main')

@section('title')
    Admin Panel
@endsection

@section('header')
		<h1>Admin Panel</h1>
		<h4>Current system version: XX</h4>
@endsection

@section('page-heading')
	<a type="button" class="btn btn-warning btn-md btn-admin" href="#musers">Users</a></h1>
	<a type="button" class="btn btn-warning btn-md btn-admin" href="#mblogposts">Blogposts</a>
	<a type="button" class="btn btn-warning btn-md btn-admin" href="#mfields">Fields</a>
@endsection

@section('page-content')
	

<div class="tab-content">
	<div id="musers" class="tab-pane fade in active">
		@include('admintools.manage_users')
	</div>
	<div id="mblogposts" class="tab-pane fade">
		@include('admintools.manage_blogposts')
	</div>
	<div id="mfields" class="tab-pane fade">
		@include('admintools.manage_fields')
	</div>
</div>
			
Accessed as "{{ Auth::user()->username }}" using "{{ Auth::user()->user_level }}" permissions on "{{ date('Y-m-d H:i:s' )}}"
@endsection

@section('script')
	<script type="text/javascript" src="{{ URL::asset('js/admintools.js') }}"></script>
@endsection
