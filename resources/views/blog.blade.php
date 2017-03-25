@extends('layouts.modular')

@section('title')
    Blog
@endsection

@section('header')
		<h1>Latest News</h1>
		<h4>Here, you can find the latest news about the platform.</h4>
@endsection

@section('left-column')
		<div class="panel panel-default panel-modular">
			<div class="panel-heading">Moderators</div>
			<div class="panel-body">!! Work in progress !!</div>
		</div>
@endsection

@section('right-column')
		@foreach($blogposts as $index => $blogpost)	
		<div class="panel panel-default panel-modular">
			<div class="panel-heading">{{ $blogpost->title }}</div>
			<div class="panel-body">{{ $blogpost->body }}
			<p class="post-date"><small class="text-muted"><i class="glyphicon glyphicon-time"></i> Posted by <a href="{{ route('account_real', ['username' =>  $blogpost->user->username]) }}">{{ $blogpost->user->username }}</a>  on {{ $blogpost->created_at }}</small></p>
			</div>
		</div>
		@endforeach
@endsection