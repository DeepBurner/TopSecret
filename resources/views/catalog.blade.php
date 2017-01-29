@extends('layouts.master')

@section('title')
    Catalogue
@endsection

@section('content')
	<div class="row posts">
		<div class="col-md-6 col-md-offset-3">
			<header><h3>Catalogue</h3></header>
			@foreach($fields as $field)
				<li><a href="{{ route('field', ['fieldname' => $field->name]) }}">{{ $field->name }}</a></li>
			@endforeach
		</div>
	</div>
@endsection