@extends('layouts.main')

@section('title')
    Search Results
@endsection


@section('header')
		<h1>Search Results</h1>
		<h4>"{{ strtoupper($query) }}"</h4>
@endsection

@section('page-content')
		@if (count($users) != 0)
		<div class="panel panel-default panel-modular">
			<div class="panel-heading">{{ count($users) }} user(s) found</div>
			<div class="panel-body">
				<ul class="list-unstyled">
					@foreach($users as $user)
					<li class="media">
					<a class="media-left" href="{{ route('account_real', ['username' => $user->username]) }}">
						<img style="width: 64px;" class="d-flex mr-3 pull-left" src="{{ route('account.image', $user->username) }}" alt="{{ $user->username }}">
					</a>
					<div class="media-body">
						<a href="{{ route('account_real', ['username' => $user->username]) }}">
							<h4 class="media-heading">{{ $user->username }}</h4>
						</a>
						<p>{{ $user->name }}@if ($user->name && $user->location),@endif {{ $user->location }}</p>
					</div>
				</li>
					@endforeach
				</ul>
			</div>
		</div>
		@endif
		
		@if (count($fields) != 0)
		<div class="panel panel-default panel-modular">
			<div class="panel-heading">{{ count($fields) }} field(s) found</div>
			<div class="panel-body">
				<ul class="list-unstyled">
					@foreach($fields as $field)
					<li class="media">
						<a class="media-left" href="{{ route('field', ['fieldname' => $field->name]) }}">
							<img class="d-flex mr-3 pull-left" src="{{ route('field.image', $field->name) }}" alt="{{ $field->name }}">
						</a>
						<div class="media-body">
							<a href="{{ route('field', ['fieldname' => $field->name]) }}">
								<h4 class="media-heading">{{ $field->name }}</h4>
							</a>
							<p>{{ $field->desc }}</p>
						</div>
					</li>
					@endforeach
				</ul>
			</div>
		</div>
		@endif
		
		@if (count($posts) != 0)
		<div class="panel panel-default panel-modular">
			<div class="panel-heading">{{ count($posts) }} post(s) found</div>
			<div class="panel-body">
				<ul class="list-unstyled">
					@foreach($posts as $post)
						<li>{{ $post }}</li>
					@endforeach
					
					<p>Posts are deprecated!! Update using the forum system!!</p>
				</ul>
			</div>
		</div>
		@endif
@endsection

