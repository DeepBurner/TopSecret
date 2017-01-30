@extends('layouts.master')

@section('title')
    Admin Panel
@endsection

@section('content')
    <section class="row add-field">
        <div class="col-md-6 col-md-offset-3">
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
    </section>
    <section class="row new-blog-post">
        <div class="col-md-6 col-md-offset-3">
            <h1>Add new blog post</h1>
            <form action="{{ route('panel.addblogpost') }}" method="post">
                <div class="form-group">
					<label for="fieldname">Title:</label>
					<input class="form-control" type="text" name="title" id="title">
					<label for="fieldname">Body:</label>
                    <textarea class="form-control" name="body" id="body"  rows="5" placeholder="Blog post"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Create Blog Post</button>
                <input type="hidden" value="{{ Session::token() }}" name="_token">
            </form>
        </div>
    </section>
@endsection