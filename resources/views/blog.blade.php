<?php
/**
 * Created by PhpStorm.
 * User: kcancelik
 * Date: 12/18/16
 * Time: 3:00 PM
 */
?>

@extends('layouts.master')

@section('title')
    Blog
@endsection

@section('content')
    <div class="col-md-12">
        <section class="row new-blog-post">
            <div class="col-md-6 col-md-offset-3">
                <header><h3>Add new blog post</h3></header>
                <form action="#">
                    <div class="form-group">
                        <textarea class="form-control" name="body" id="body"  rows="5" placeholder="Your post"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Create Post</button>
                    <input type="hidden" value="{{ Session::token() }}" name="_token">
                </form>
            </div>
        </section>
    </div>
    <div class="col-md-12">
        <div class="col-md-6 col-md-offset-3">
            <h3>Latest News</h3>
            <p>Here, you can find the latest news about the platform.</p>
        </div>
    </div>
    <div class="col-md-12">
        <section class="row posts">
            <div class="col-md-6 col-md-offset-3">
                <header><h3>What's going on?</h3></header>
                @foreach($blogposts as $blogpost)
                    <article class="post" data-postid="{{ $blogpost->id }}">
                        <p>{{ $blogpost->body }}</p>
                        <div class="info">
                            Posted by {{ $blogpost->user->username }} on {{ $blogpost->created_at }}
                        </div>
                    </article>
                @endforeach

            </div>
        </section>
    </div>
@endsection