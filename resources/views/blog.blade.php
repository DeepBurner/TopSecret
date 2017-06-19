@extends('layouts.main')

@section('title')
    Blog
@endsection

@section('header')
		<h1>Latest News</h1>
		<h4>Here, you can find the latest news about the platform.</h4>
@endsection

@section('page-heading')
		{{ $blogposts->count() }} blogposts | Last updated {{ $blogposts->first()->created_at->diffForHumans() }}
		@if (Auth::check() && Auth::user()->user_level == 'admin')
			<a href="/adminpanel#mblogposts" type="button" class="btn btn-warning btn-md btn-post-add">Manage</a>
		@endif
@endsection

@section('page-content')
		@foreach($blogposts as $index => $blogpost)	
			<div class="blogpost">
				<h3>{{ $blogpost->title }}</h3>
				{!! $blogpost->body !!}
				<p class="post-date"><small class="text-muted"><i class="glyphicon glyphicon-time"></i> Posted by <a href="{{ route('account_real', ['username' =>  $blogpost->user->username]) }}">{{ $blogpost->user->username }}</a>  {{ $blogpost->created_at->diffForHumans() }}</small></p>
				<button type="button" class="btn btn-primary btn-md btn-post">Read More</button>
				@if ($blogpost != $blogposts->last())
					<hr style="margin-left: -15px; margin-right: -15px;">
				@endif	
			</div>
		@endforeach
@endsection