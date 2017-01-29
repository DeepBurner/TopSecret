@if(count(@errors) > 0)
	<div class="row">
		<div class="col-md-4 col-md-offset-4 error">
			<ul>
				@foreach($errors->all() as $error)
				<li>
					<div class="alert alert-danger alert-dismiss">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						
						<strong>{{$error}}</strong>
					</div>
				</li>
				@endforeach
			</ul>
		</div>
	</div>
@endif
@if(Session::has('message'))
	<div class="row">
		<div class="col-md-4 col-md-offset-4 error">
			<ul>
				<li>
					<div class="alert alert-success alert-dismiss">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						
						<strong>{{ Session::get('message') }}</strong>
					</div>
				</li>
			</ul>
		</div>
	</div>
@endif