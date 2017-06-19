		<div class="panel panel-default panel-modular">
			<div class="panel-heading">Create a new field</div>
			<div class="panel-body">
				<form action="{{ route('panel.addfield') }}" method="post">
					<div class="form-group col-lg-4">
						<label for="fieldname">Field Name:</label>
						<input class="form-control" type="text" name="fieldname" id="fieldname" placeholder="Name">
					</div>
					
					<div class="form-group col-lg-4">
						<label for="fieldname">Field Description:</label>
						<input class="form-control" type="text" name="description" id="description" placeholder="Description">
					</div>
					
					<div class="form-group col-lg-4" style="margin-top: 25px;" >
						<button type="submit" class="btn btn-primary" name="button1">Add</button>
						<input type="hidden" name="_token" value="{{ Session::token() }}">
					</div>
				</form>
			</div>
		</div>