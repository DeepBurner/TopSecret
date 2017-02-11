<?php
/**
 * Created by PhpStorm.
 * User: kcancelik
 * Date: 12/18/16
 * Time: 3:00 PM
 */
?>

@extends('layouts.master')

@section('title')
    Blog
@endsection

@section('header')
	<div class="container-fluid header">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="header-text">
					<h1>Latest News</h1>
					<h4>Here, you can find the latest news about the platform.</h4>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('content')
		<div class="row">
			<div class="col-md-12">
				<ul class="timeline">
					@foreach($blogposts as $index => $blogpost)	
					@if ($index % 2 == 0)
					<li>
					@else
					<li class="timeline-right">
					@endif
						<div class="timeline-badge lightblue"><i class="glyphicon glyphicon-pencil"></i></div>
						<div class="timeline-panel">
							<div class="timeline-heading">
								<h4 class="timeline-title"><strong>{{ $blogpost->title }}</strong></h4>
								<p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> Posted by <a href="{{ route('account_real', ['username' =>  $blogpost->user->username]) }}">{{ $blogpost->user->username }}</a>  on {{ $blogpost->created_at }}</small></p>
							</div>
							<div class="timeline-body">
								<p>{{ $blogpost->body }}</p>
							</div>
						</div>
					</li>
					@endforeach
				</ul>
			</div>
		</div>
@endsection