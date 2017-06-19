		<div class="panel panel-default">
			<div class="panel-heading">Create a new blog post</div>
			<div class="panel-body">
				<form action="{{ route('panel.addblogpost') }}" method="post">
					<div class="form-group col-lg-4">
						<label for="fieldname">Blog Post Title:</label>
						<input class="form-control" type="text" name="title" id="title" placeholder="Title">
					</div>
					
					<div class="form-group col-lg-8" style="margin-top: 25px;" >
						<button type="submit" class="btn btn-primary" name="button1">Add</button>
						<input type="hidden" name="_token" value="{{ Session::token() }}">
					</div>
					
					<div class="form-group col-lg-10">
						<label for="fieldname">Blog Post Body:</label>
						<textarea class="form-control" name="body" id="body"  rows="5" placeholder="Body"></textarea>
					</div>
				</form>
			</div>
		</div>