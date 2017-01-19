@extends('layouts.master')

@section('title')
    Catalogue
@endsection

@section('content')
    @foreach($fields as $field)
        <li><a href="{{ route('field', ['fieldname' => $field->name]) }}">{{ $field->name }}</a></li>
    @endforeach
@endsection