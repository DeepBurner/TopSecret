@extends('layouts.modular')

@section('title')
    Account Settings
@endsection

@section('header')
		<h1>Account Settings</h1>
		<h4></h4>
@endsection

@section('left-column')
		<div class="panel panel-default panel-modular">
			<div class="panel-heading">Advanced Settings</div>
			<div class="panel-body">!! Work in progress !!</div>
		</div>
@endsection

@section('right-column')
		<div class="panel panel-default panel-modular">
			<div class="panel-heading">Settings</div>
			<div class="panel-body">
				@include('includes.message-block-alert')
				<div class="col-md-6">
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
								<img class src="{{ route('account.image', $user->username) }}" alt="" class="img-responsive">
							</div>
							
							<div class="col-md-6" style="padding: 6px;">
								<label for="image">Image (only .jpg and .png) (max 2MB)</label>
								<input id="image" name="image" type="file" accept="image/jpeg, image/png">
							</div>
						</div>
						<button type="submit" class="btn btn-primary">Save Account</button>
						<input type="hidden" value="{{ Session::token() }}" name="_token">
					</form>
				</div>
			</div>
		</div>
@endsection

@section('content')
	@include('includes.message-block-alert')
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
						<img class src="{{ route('account.image', $user->username) }}" alt="" class="img-responsive">
					</div>
					
					<div class="col-md-6" style="padding: 6px;">
						<label for="image">Image (only .jpg and .png) (max 2MB)</label>
						<input id="image" name="image" type="file" accept="image/jpeg, image/png">
					</div>
                </div>
                <button type="submit" class="btn btn-primary">Save Account</button>
				<input type="hidden" value="{{ Session::token() }}" name="_token">
            </form>
        </div>
    </section>
@endsection

@section('script')
	<script type="text/javascript">
        $('#image').bind('change', function() {
			if (this.files[0].size/1024/1024 >= 2)
				$('#image').replaceWith($('#image').val('').clone(true));
        });
    </script>
@endsection