@extends('layouts.modular')

@section('title')
    Sources - {{ $field->name }}
@endsection

@section('header')
    <h1>{{ $field->name }}</h1>
    <h4>Sources</h4>
@endsection

@section('left-column')
    <div class="panel panel-default panel-modular">
        <div class="panel-heading">Field Menu</div>
        <div class="panel-body">!! Work in progress !!</br></br>
            <ul>
            @foreach($field->sections as $section)
                    <a href="{{ route('sources.section', ['field_name' => $field->name, 'id' => $section->id]) }}">{{ $section->name }}</a>
            @endforeach
            </ul>
        </div>
    </div>
@endsection

@section('right-column')
    @if( ! empty($data['section']))

        <div class="panel panel-default panel-modular">
            <div class="panel-heading">{{ $section->name }}</div>
            <div class="panel-body">{{ $section->content }}
            </div>
        </div>
    @else
    <div class="panel panel-default panel-modular">
        <div class="panel-body">This is the {{ $field->name }} sources landing page.</div>
    </div>
    @endif
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