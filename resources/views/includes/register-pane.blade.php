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
			<button type="submit" class="btn btn-primary" name="button">Register</button>
			<input type="hidden" name="_token" value="{{ Session::token() }}">
		</form>