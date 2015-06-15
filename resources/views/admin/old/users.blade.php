@extends('admin.layouts.master')

@section('admin')
	<table class="table">
		<tr>
			<th>Username</th>
			<th>Role</th>
			<th>Last Activity</th>
			<th>Active</th>
			<th>Online</th>
			<th>Actions</th>
		</tr>
		@forelse($users as $user)
		<tr>
			<td>{{ $user->email }}</td>
			<td>Admin</td>
			<td>{{ time('HH') }}</td>
			<td>Yes</td>
			<td>Yes</td>
			<td><a class="btn btn-default btn-sm" data-toggle="tooltip" title="Settings"><span class="glyphicon glyphicon-cog"></span></a></td>
		</tr>
		@empty
		<tr>
			<td colspan="6">No users</td>
		</tr>
		@endforelse
	</table>
@stop