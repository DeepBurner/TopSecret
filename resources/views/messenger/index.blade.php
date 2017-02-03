@extends('layouts.master')

@section('content')
    @if (Session::has('error_message'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('error_message') }}
        </div>
    @endif
    <div class="col-md-6 col-md-offset-3">
    @if(count($threads) > 0)
        @foreach($threads as $thread)
            <?php $class = $thread->isUnread($currentUserId) ? 'alert-info' : ''; ?>
            <div class="media alert {{ $class }}">
                <h4 class="media-heading">{!! link_to('messages/' . $thread->id, $thread->getReceiver()) !!}</h4>
                <p>{{ $thread->latestMessage->body }}</p>
            </div>
        @endforeach
    @else
        <p>Sorry, no threads.</p>
    @endif
    </div>
@stop