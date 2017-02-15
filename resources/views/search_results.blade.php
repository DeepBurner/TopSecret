@extends('layouts.master')

@section('title')
    Search Results
@endsection

@section('content')
    <ul>
        @foreach($users as $user)
        <li>{{ $user->username }}</li>
        @endforeach
    </ul>

    <ul>
        @foreach($fields as $fields)
            <li>{{ $fields }}</li>
        @endforeach
    </ul>

    <ul>
        @foreach($posts as $post)
            <li>{{ $post }}</li>
        @endforeach
    </ul>
@endsection