@extends('layouts.master')

@section('title')
    {{ $field->name }}
@endsection

@section('content')
    <div class="jumbotron">
        <h1>{{ $field->name }}</h1>
        <p>We need to learn how to fill this up.</p>
    </div>
    <p>Information about field goes here. Also a subcribe button</p>
    <p>Show forums, learning center and ongoing projects sections here. TODO</p>
@endsection