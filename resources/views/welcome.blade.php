@extends('layouts.master')

@section('title')
    Top Secret
@endsection

@section('content')
    @include('includes.message-block')
    <div class="row">
        <div class="col-md-8">
            <h3>What is this?</h3>
            <p>There should be some explanation about the website here.</p>
            <a href="{{ route('register') }}">Click here if you want to join.</a>
        </div>
        <div class="col-md-4">
            <h3>Sign In</h3>
            <form action="{{ route('signin') }}" method="post">
                <div class="form-group">
                    <label for="email">E-Mail</label>
                    <input class="form-control" type="text" name="email" id="email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>
    <div class="row">
        <h3>Learn Things</h3>
        <p>You can learn about many fields here.</p>
        <p>An image from catalog page.</p>
    </div>
    <div class="row">
        <h3>Find About Good Resources</h3>
        <p>If you are interested in a field, you can see reviews of resources about that field.</p>
        <p>An image from the view of a field.</p>
    </div>
    <div class="row">
        <h3>Share With Your Friends</h3>
        <p>You can share your experiences with your friends.</p>
        <p>An image from dashboard.</p>
    </div>
@endsection
