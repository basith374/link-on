<table class="table table-condensed table-bordered" id="sessions-table">
	<tr>
		<th>Id</th>
		<th>Payload</th>
		<th>Username</th>
		<th>Last Activity</th>
	</tr>
	@forelse($sessions as $session)
	<tr>
		<td>{{ $session->id }}</td>
		<td><span data-toggle="popover" data-placement="bottom" data-container="body" data-content="{{ $session->payload }}">{{ str_limit($session->payload, 50) }}</span></td>
		<td>{{ $session->user->email or 'null' }}</td>
		<td>{{ $session->lastseen() }}</td>
	</tr>
	@empty
	<tr>
		<td colspan="4">No sessions</td>
	</tr>
	@endforelse
</table>