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
		<td>@foreach($user->roles as $role) {{ $role->title . ',' }} @endforeach</td>
		<td>{{ $user->online() }}</td>
		<td>{{ $user->active() }}</td>
		<td>
			<div class="btn-group">
				<span class="dropdown-toggle" data-toggle="dropdown"><a class="btn btn-default btn-xs" data-placement="right" data-toggle="tooltip" title="Settings"><span class="glyphicon glyphicon-cog" style="margin-top:3px;"></span></a></span>
				<ul class="dropdown-menu" role="menu">
					<li><a href="#"> Edit User</a></li>
					<li><a href="#"> <b class="text-danger">Delete User</b></a></li>
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