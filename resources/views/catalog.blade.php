@extends('layouts.master')

@section('title')
    Catalog
@endsection

@section('header')
	<div class="container-fluid header">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="header-text">
					<h1>Catalog</h1>
					<h4>Here, you can learn about many fields.</h4>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('content')
	<div class="row posts">
		<div class="col-md-6 col-md-offset-3">
			@foreach($fields as $field)
				<li><a href="{{ route('field', ['fieldname' => $field->name]) }}">{{ $field->name }}</a></li>
			@endforeach
		</div>
	</div>
@endsection