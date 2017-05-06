@extends('layouts.modular')

@section('title')
    {{ $field->name }}
@endsection

@section('header')
		<h1>{{ $field->name }}</h1>
		<h4>{{ $field->desc }}</h4>
@endsection

@section('left-column')
		<div class="panel panel-default panel-modular">
			<div class="panel-heading">Field Menu</div>
			<div class="panel-body">!! Work in progress !!</br></br>
			
				<form action="{{ route('sub_unsub', ['fieldname' => $field->name]) }}" method="post">
					<input type="hidden" name="_token" value="{{ Session::token() }}">
					@if(Auth::user() != null)
					<button type="submit" class="btn btn-primary" name="button1">
						{{ Auth::user() -> fields()->where('name', $field->name)->first() != null ? 'Unsubscribe' : 'Subscribe' }}
					</button>
					@endif
				</form>
			</div>
		</div>
@endsection

@section('right-column')
		<div class="panel panel-default panel-modular">
			<div class="panel-heading">Forum</div>
			<div class="panel-body">!! Work in progress !!</div>
		</div>
		
		<div class="panel panel-default panel-modular">
			<div class="panel-heading">Sources</div>
			<div class="panel-body"><a href="{{ route('sources', ['field_name' => $field->name]) }}">Here be the sources</a></div>
		</div>
		
		<div class="panel panel-default panel-modular">
			<div class="panel-heading">Projects</div>
			<div class="panel-body">!! Work in progress !!</div>
		</div>
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
    <p><a href="{{ route('fieldforum', ['name' => $field->name]) }}">FORUM</a></p>
    <p>Show forums, learning center and ongoing projects sections here. TODO</p>
@endsection