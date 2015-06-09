<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group">
	<div class="col-md-6 col-md-offset-4"><span class="text-danger" id="name-info"></span></div>
	<label class="col-md-4 control-label">Name</label>
	<div class="col-md-6">
		<input type="text" class="form-control" name="name" value="{{ old('name') }}" id="name-field">
	</div>
</div>

<div class="form-group">
	<div class="col-md-6 col-md-offset-4"><span class="text-danger" id="email-info"></span></div>
	<label class="col-md-4 control-label">E-Mail Address</label>
	<div class="col-md-6">
		<input type="email" class="form-control" name="email" value="{{ old('email') }}" id="email-field">
	</div>
</div>

<div class="form-group">
	<div class="col-md-6 col-md-offset-4"><span class="text-danger" id="password-info"></span></div>
	<label class="col-md-4 control-label">Password</label>
	<div class="col-md-6">
		<input type="password" class="form-control" name="password" id="password-field">
	</div>
</div>

<div class="form-group">
	<label class="col-md-4 control-label">Confirm Password</label>
	<div class="col-md-6">
		<input type="password" class="form-control" name="password_confirmation" id="rpassword-field">
	</div>
</div>


<div class="form-group">
	<div class="col-md-6 col-md-offset-4">
		<div class="panel panel-success">
			<div class="panel-heading">
				Roles
			</div>
			<ul class="list-group" id="rolesList">
				<li class="list-group-item">
					<a class="btn btn-primary btn-xs disabled" id="roleAdd"><span class="glyphicon glyphicon-plus"></span> Add</a>
				</li>
			</ul>
		</div>
	</div>
</div>