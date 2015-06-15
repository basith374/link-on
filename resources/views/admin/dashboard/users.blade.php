<div class="modal fade" id="error-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
			</div>
			<div class="modal-footer">
				<a href="#" class="btn btn-default close">Close</a>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-trash"></span> Confirm Delete</h4>
			</div>
			<div class="modal-body">
				Are you sure you want to delete this user? You cannot undo this action.
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<a href="#" class="btn btn-danger" id="userDelete">Delete</a>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="editModalLabel"><span class="glyphicon glyphicon-edit"></span> Change User Properties</h4>
			</div>
			<div class="modal-body">
				{!! Form::open(['method' => 'PATCH','route' => ['users.update', ], 'class' => 'form-horizontal', 'id' => 'edit-user-form']) !!}
					@include('admin/partials/users/_form')
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<a href="#" class="btn btn-primary" id="userEdit">Save changes</a>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
<table class="table" id="users-table">
	<tr>
		<th>Username</th>
		<th>Role</th>
		<th>Online</th>
		<th>Active</th>
		<th>Actions</th>
	</tr>
	@forelse($users as $user)
	<tr>
		<td>{{ $user->email }}</td>
		<td><span data-toggle="tooltip" title="{{ implode(', ', $user->roles->lists('title')) }}">{{ str_limit(implode(', ', $user->roles->lists('title')), 50) }}</span></td>
		<td>{{ $user->online() }}</td>
		<td>{{ $user->active() }}</td>
		<td>
			<div class="btn-group">
				<span class="dropdown-toggle" data-toggle="dropdown"><a class="btn btn-default btn-xs" data-placement="right" data-toggle="tooltip" title="Settings"><span class="glyphicon glyphicon-cog" style="margin-top:3px;"></span></a></span>
				<ul class="dropdown-menu" role="menu">
					<li><a href="#" data-target="#edit-modal" data-toggle="modal"> Edit User</a></li>
					<li>
						<input type="hidden" name="userId" value="{{ $user->id }}" />
						<a href="#" data-target="#delete-modal" data-toggle="modal"> <b class="text-danger">Delete User</b></a>
					</li>
				</ul>
			</div>
		</td>
	</tr>
	@empty
	<tr>
		<td colspan="6">No users</td>
	</tr>
	@endforelse
</table>