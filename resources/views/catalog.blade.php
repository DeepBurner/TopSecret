@extends('layouts.modular')

@section('title')
    Catalog
@endsection

@section('header')
		<h1>Catalog</h1>
		<h4>Here, you can learn about many fields.</h4>
@endsection

@section('left-column')
		<div class="panel panel-default panel-modular">
			<div class="panel-heading">Help Information</div>
			<div class="panel-body">!! Work in progress !!</div>
		</div>
@endsection

@section('right-column')
		<div class="panel panel-default panel-modular">
			<div class="panel-heading">Fields</div>
			<div class="panel-body">
				<ul class="list-unstyled">
				@foreach($fields as $field)
				<li class="media">
					<a class="media-left" href="{{ route('field', ['fieldname' => $field->name]) }}">
						<img class="d-flex mr-3 pull-left" src="{{ route('field.image', $field->name) }}" alt="{{ $field->name }}">
					</a>
					<div class="media-body">
						<a href="{{ route('field', ['fieldname' => $field->name]) }}">
							<h4 class="media-heading">{{ $field->name }}</h4>
						</a>
						<p>{{ $field->desc }}</p>
					</div>
				</li>
				@endforeach
				</ul>
			</div>
		</div>
@endsection