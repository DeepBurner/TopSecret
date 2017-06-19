@extends('layouts.main')

@section('title')
    Catalog
@endsection

@section('header')
		<h1>Catalog</h1>
		<h4>Here, you can learn about many fields.</h4>
@endsection

@section('page-heading')
		{{ $fields->count() }} fields
		@if (Auth::check() && Auth::user()->user_level == 'admin')
			<a href="/adminpanel#mfields" type="button" class="btn btn-warning btn-md btn-post-add">Manage</a>
		@endif
@endsection

@section('page-content')
		<div class="field-head"><h1>Popular Fields</h1></div>
		<ul class="list-unstyled">
		@foreach($fields as $field)
		<div class="col-lg-6 field-wrapper">
			<li class="media">
				<a class="media-left" href="{{ route('field', ['fieldname' => $field->name]) }}">
					<img class="d-flex mr-3 pull-left" src="{{ route('field.image', $field->name) }}" alt="{{ $field->name }}">
				</a>
				<div class="media-body">
					<a class="media-heading field-title" href="{{ route('field', ['fieldname' => $field->name]) }}">
						{{ $field->name }}
					</a>
					<p>{!! str_limit($field->desc, $limit = 120, $end = '...') !!}</p>
				</div>
			</li>
		</div>
		@endforeach
		</ul>
		
		<div class="col-lg-12"><hr style="margin-left: -30px; margin-right: -30px;"></div>

		<div class="field-head"><h1>Other Fields</h1></div>
		<ul class="list-unstyled">
		@foreach($fields as $field)
		<div class="col-lg-6 field-wrapper">
			<li class="media">
				<a class="media-left" href="{{ route('field', ['fieldname' => $field->name]) }}">
					<img class="d-flex mr-3 pull-left" src="{{ route('field.image', $field->name) }}" alt="{{ $field->name }}">
				</a>
				<div class="media-body">
					<a class="media-heading field-title" href="{{ route('field', ['fieldname' => $field->name]) }}">
						{{ $field->name }}
					</a>
					<p>{!! str_limit($field->desc, $limit = 120, $end = '...') !!}</p>
				</div>
			</li>
		</div>
		@endforeach
		</ul>
@endsection