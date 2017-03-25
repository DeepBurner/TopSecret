@extends('layouts.modular')

@section('title')
    Messages
@endsection

@section('header')
		<h1>Messages</h1>
		<h4></h4>
@endsection

@section('left-column')
		<div class="panel panel-default panel-modular">
			<div class="panel-heading">Conversations</div>
			<div class="panel-body">
			@if(count($threads) > 0)
				<ul class="list-unstyled">
				@foreach($threads as $threadd)
				<li class="media">
					<a class="media-left" href="messages/{{ $threadd->id }}">
						<img class="d-flex mr-3 pull-left img-circle fix64" src="{{ route('account.image', $threadd->getReceiver()) }}" alt="{{ $threadd->getReceiver() }}">
					</a>
					<div class="media-body">
						<a href="messages/{{ $threadd->id }}">
							<h4 class="media-heading">{{ $threadd->getReceiver() }}</h4>
						</a>
						@if ($threadd->isUnread($currentUserId))
							<strong><div class="message-abstract">{!! str_limit($threadd->latestMessage->body, $limit = 57, $end = '...') !!}</div></strong>
						@else
							<div class="message-abstract">{!! str_limit($threadd->latestMessage->body, $limit = 57, $end = '...') !!}</div>
						@endif
					</div>
				</li>
				<hr class="hr-fixed" />
				@endforeach
				</ul>
			@else
				<p>Sorry, no threads.</p>
			@endif
			</div>
		</div>
@endsection



@section('right-column')
		<div class="panel panel-default panel-modular">
			<div class="panel-heading">Messages</div>
			<div class="panel-body">
				<p>Click on a conversation to start messaging.</p>
			</div>
		</div>
@endsection