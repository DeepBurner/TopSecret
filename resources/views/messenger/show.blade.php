@extends('layouts.modular')

@section('title')
    Messages
@endsection

@section('header')
		<h1>Messages</h1>
		<h4>/w {{ $thread->getReceiver() }}</h4>
@endsection

@section('left-column')
		<div class="panel panel-default panel-modular">
			<div class="panel-heading">Conversations</div>
			<div class="panel-body">
			@if(count($threads) > 0)
				<ul class="list-unstyled">
				@foreach($threads as $threadd)
				<li class="media">
					<a class="media-left" href="{{ $threadd->id }}">
						<img class="d-flex mr-3 pull-left img-circle fix64" src="{{ route('account.image', $threadd->getReceiver()) }}" alt="{{ $threadd->getReceiver() }}">
					</a>
					<div class="media-body">
						<a href="{{ $threadd->id }}">
							<h4 class="media-heading">{{ $threadd->getReceiver() }}</h4>
						</a>
						@if ($threadd->isUnread($currentUserId))
							<strong><div class="message-abstract">{!! str_limit($threadd->latestMessage->body, $limit = 50, $end = '...') !!}</div></strong>
						@else
							<div class="message-abstract">{!! str_limit($threadd->latestMessage->body, $limit = 50, $end = '...') !!}</div>
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


@section('right-columna')
    <div class="col-md-6 col-md-offset-3">
        <h1>{{ $thread->getReceiver() }}</h1>

        @foreach($thread->messages as $message)
            <div class="media">
                <a class="pull-left" href="#">
                    <img src="//www.gravatar.com/avatar/{{ md5($message->user->email) }} ?s=64" alt="{{ $message->user->username }}" class="img-circle">
                </a>
                <div class="media-body">
                    <h5 class="media-heading"><strong>{{ $message->user->username }}</strong></h5>
                    {{{ $message->body }}}
                    <div class="text-muted"><small>Posted {{ $message->created_at->diffForHumans() }}</small></div>
                </div>
            </div>
        @endforeach

        <h3>Reply</h3>
        {!! Form::open(['route' => ['messages.update', $thread->id], 'method' => 'PUT']) !!}
    <!-- Message Form Input -->
        <div class="form-group">
            {!! Form::textarea('message', null, ['class' => 'form-control', 'rows' => "2"]) !!}
        </div>

        @if($users->count() > 0)
            <div class="checkbox">
                @foreach($users as $user)
                    <label title="{{ $user->name }}"><input type="checkbox" name="recipients[]" value="{{ $user->id }}">{{ $user->name }}</label>
                @endforeach
            </div>
        @endif

    <!-- Submit Form Input -->
        <div class="form-group">
            {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@stop

@section('right-column')
		<div class="panel panel-default panel-modular">
			<div class="panel-heading">Messages</div>
			<div class="panel-body">
			@foreach($thread->messages as $message)
				<div class="media">
					<a class="pull-left" href="#">
						<img class="d-flex mr-3 pull-left img-circle fix64" src="{{ route('account.image', $message->user->username) }}" alt="{{ $message->user->username }}">
					</a>
					<div class="media-body">
						<h5 class="media-heading"><strong>{{ $message->user->username }}</strong></h5>
						{!!$message->body !!}
						<div class="text-muted"><small>Posted {{ $message->created_at->diffForHumans() }}</small></div>
					</div>
				</div>
			@endforeach
				<h3>Reply</h3>
				{!! Form::open(['route' => ['messages.update', $thread->id], 'method' => 'PUT']) !!}
				<!-- Message Form Input -->
					<div class="form-group">
						{!! Form::textarea('message', null, ['class' => 'form-control', 'rows' => "2"]) !!}
					</div>

					<!--@if($users->count() > 0)
						<div class="checkbox">
							@foreach($users as $user)
								<label title="{{ $user->name }}"><input type="checkbox" name="recipients[]" value="{{ $user->id }}">{{ $user->name }}</label>
							@endforeach
						</div>
					@endif-->

				<!-- Submit Form Input -->
					<div style="width: 128px;" class="form-group">
						{!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
					</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
@endsection