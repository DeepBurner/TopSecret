		<form action="{{ route('signin') }}" method="post">
			<div class="form-group {{ $errors->has('login-email') ? 'has-error' : "" }}">
				<label for="email">E-Mail</label>
				<input class="form-control" type="text" name="login-email" id="login-email" value="{{ Request::old('login-email') }}">
			</div>
			<div class="form-group {{ $errors->has('login-password') ? 'has-error' : "" }}">
				<label for="password">Password</label>
				<input class="form-control" type="password" name="login-password" id="login-password" value="{{ Request::old('login-password') }}">
			</div>
			<button type="submit" class="btn btn-primary">Login</button>
			<input type="hidden" name="_token" value="{{ Session::token() }}">
		</form>
