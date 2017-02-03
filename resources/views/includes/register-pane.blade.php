		<form action="{{ route('signup') }}" method="post">
			<div class="form-group  {{ $errors->has('register-email') ? 'has-error' : "" }}">
				<label for="email">E-Mail</label>
				<input class="form-control" type="text" name="register-email" id="register-email" value="{{ Request::old('register-email') }}">
			</div>
			<div class="form-group  {{ $errors->has('register-username') ? 'has-error' : "" }}">
				<label for="username">Username</label>
				<input class="form-control" type="text" name="register-username" id="register-username"  value="{{ Request::old('register-username') }}">
			</div>
			<div class="form-group  {{ $errors->has('register-password') ? 'has-error' : "" }}">
				<label for="password">Password</label>
				<input class="form-control" type="password" name="register-password" id="register-password">
			</div>
			<button type="submit" class="btn btn-primary" name="button">Register</button>
			<input type="hidden" name="_token" value="{{ Session::token() }}">
		</form>
