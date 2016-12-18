<?php
/**
 * Created by PhpStorm.
 * User: kcancelik
 * Date: 12/18/16
 * Time: 2:24 PM
 */
?>

@extends('layouts.master')

@section('title')
    Register
@endsection

@section('content')
    @include('includes.message-block')
    <div class="row">
        <div class="col-md-6">
            <h3>Sign Up</h3>
            <form action="{{ route('signup') }}" method="post">
                <div class="form-group  {{ $errors->has('email') ? 'has-error' : "" }}">
                    <label for="email">E-Mail</label>
                    <input class="form-control" type="text" name="email" id="email" value="{{ Request::old('email') }}">
                </div>
                <div class="form-group  {{ $errors->has('username') ? 'has-error' : "" }}">
                    <label for="username">Username</label>
                    <input class="form-control" type="text" name="username" id="username"  value="{{ Request::old('username') }}">
                </div>
                <div class="form-group  {{ $errors->has('password') ? 'has-error' : "" }}">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                <button type="submit" class="btn btn-primary" name="button">Submit</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    <div>
@endsection