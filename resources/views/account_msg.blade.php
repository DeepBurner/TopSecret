@extends('layouts.master')

@section('title')
    Account
@endsection

@section('content')
    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>Your Account</h3></header>
            <form action="{{ route('account.save') }}" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}" id="name">
                </div>
                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" name="location" class="form-control" value="{{ $user->location }}" id="location">
                </div>
                <div class="form-group">
                    <label for="bio">Bio</label>
                    <input type="text" name="bio" class="form-control" value="{{ $user->bio }}" id="bio">
                </div>
                <div class="form-group row">
					<div class="col-md-3">
						<img class src="{{ route('account.image', $user->username) }}" alt="" class="img-responsive" style="">
					</div>
					
					<div class="col-md-6" style="padding: 6px;">
						<label for="image">Image (only .jpg and .png)</label>
						<input name="image" type="file" accept="image/jpeg, image/png">
					</div>
					

                </div>
                <button type="submit" class="btn btn-primary">Save Account</button>
                <input type="hidden" value="{{ Session::token() }}" name="_token">
            </form>
        </div>
    </section>
@endsection