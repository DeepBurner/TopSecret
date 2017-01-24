@extends('layouts.master')

@section('title')
    Admin Panel
@endsection

@section('content')
    <div class="row add-field">
        <div class="col-md-6">
            <h1>New field</h1>
            <form action="{{ route('panel.addfield') }}" method="post">
                <div class="form-group">
                    <label for="fieldname">Field Name</label>
                    <input class="form-control" type="text" name="fieldname" id="fieldname">
                </div>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
                <button type="submit" class="btn btn-primary" name="button1">Add</button>
            </form>
        </div>
    </div>
@endsection