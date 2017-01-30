@extends('layouts.master')

@section('title')
    {{ $field->name }}
@endsection

@section('content')
    <div class="jumbotron">
        <h1>{{ $field->name }}</h1>
        <p>We need to learn how to fill this up.</p>
        <form action="{{ route('sub_unsub', ['fieldname' => $field->name]) }}" method="post">
            <input type="hidden" name="_token" value="{{ Session::token() }}">
            @if(Auth::user() != null)
            <button type="submit" class="btn btn-primary" name="button1">
                {{ Auth::user() -> fields()->where('name', $field->name)->first() != null ? 'Unsubscribe' : 'Subscribe' }}
            </button>
            @endif
        </form>
    </div>
    <p>Information about field goes here. Also a subcribe button</p>
    <p>Show forums, learning center and ongoing projects sections here. TODO</p>
@endsection