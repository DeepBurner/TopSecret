@extends('layouts.master')

@section('content')
    @include('includes.message-block')
    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>What do you have to say?</h3></header>
            <form action="{{ route('post.create') }}" method="post">
                <div class="form-group">
                    <textarea class="form-control" name="body" id="body"  rows="5" placeholder="Your post"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Create Post</button>
                <input type="hidden" value="{{ Session::token() }}" name="_token">
            </form>
        </div>
    </section>
    <section class="row posts">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>What's going on?</h3></header>
            <article class="post">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam enim dolor, ullamcorper quis euismod ac, aliquam a nisi. Aliquam vitae pharetra arcu, a accumsan ex. Sed rhoncus nunc eu erat sagittis, nec laoreet metus varius. Quisque faucibus tempor sapien, sit amet placerat risus imperdiet ultricies. Donec turpis sapien, porttitor a facilisis vitae, tincidunt sed orci.</p>
                <div class="info">
                    Posted by Max on 12 Feb 2016
                </div>
                <div class="interaction">
                    <a href="#">Like</a> |
                    <a href="#">Dislike</a> |
                    <a href="#">Edit</a> |
                    <a href="#">Delete</a>
                </div>
            </article>

            <article class="post">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam enim dolor, ullamcorper quis euismod ac, aliquam a nisi. Aliquam vitae pharetra arcu, a accumsan ex. Sed rhoncus nunc eu erat sagittis, nec laoreet metus varius. Quisque faucibus tempor sapien, sit amet placerat risus imperdiet ultricies. Donec turpis sapien, porttitor a facilisis vitae, tincidunt sed orci.</p>
                <div class="info">
                    Posted by Max on 12 Feb 2016
                </div>
                <div class="interaction">
                    <a href="#">Like</a> |
                    <a href="#">Dislike</a> |
                    <a href="#">Edit</a> |
                    <a href="#">Delete</a>
                </div>
            </article>
        </div>
    </section>
@endsection
