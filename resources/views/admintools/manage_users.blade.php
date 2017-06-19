		<div class="panel panel-default panel-modular">
			<div class="panel-heading">Create a new user</div>
			<div class="panel-body">
				<form action="{{ route('panel.adduser') }}" method="post">
					<div class="form-group col-lg-3">
						<label for="fieldname">Username:</label>
						<input class="form-control" type="text" name="username" id="username" placeholder="Username">
					</div>
					
					<div class="form-group col-lg-3">
						<label for="fieldname">Email:</label>
						<input class="form-control" type="text" name="email" id="email" placeholder="Email">
					</div>
					
					<div class="form-group col-lg-3">
						<label for="fieldname">Password:</label>
						<input class="form-control" type="password" name="password" id="password" placeholder="??????">
					</div>
					
					<div class="form-group col-lg-3" style="margin-top: 25px;" >
						<button type="submit" class="btn btn-primary" name="button1">Add</button>
						<input type="hidden" name="_token" value="{{ Session::token() }}">
					</div>
				</form>
			</div>
		</div>