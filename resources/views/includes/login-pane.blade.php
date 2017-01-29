		<form action="{{ route('signin') }}" method="post">
			<div class="form-group">
				<label for="email">E-Mail</label>
				<input class="form-control" type="text" name="email" id="email">
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input class="form-control" type="password" name="password" id="password">
			</div>
			<button type="submit" class="btn btn-primary">Login</button>
			<input type="hidden" name="_token" value="{{ Session::token() }}">
		</form>