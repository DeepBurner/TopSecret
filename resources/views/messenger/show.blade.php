@extends('layouts.master')

@section('content')
    <div class="col-md-6 col-md-offset-3">
        <h1>{{ $thread->getReceiver() }}</h1>

        @foreach($thread->messages as $message)
            <div class="media">
                <a class="pull-left" href="#">
                    <img src="//www.gravatar.com/avatar/{{ md5($message->user->email) }} ?s=64" alt="{{ $message->user->username }}" class="img-circle">
                </a>
                <div class="media-body">
                    <h5 class="media-heading"><strong>{{ $message->user->username }}</strong></h5>
                    <p>{{ $message->body }}</p>
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