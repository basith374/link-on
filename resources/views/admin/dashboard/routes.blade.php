<table class="table table-condensed table-bordered" id="routes-table">
	<tr>
		<th>Method</th>
		<th>Name</th>
		<th>Path</th>
		<th>Action</th>
	</tr>
	@forelse($routes as $route)
	<tr>
		<td>@foreach($route->getMethods() as $method) {{ $method . ',' }} @endforeach</td>
		<td>{{ $route->getName() }}</td>
		<td>{{ $route->getPath() }}</td>
		<td>{{ $route->getActionName() }}</td>
	</tr>
	@empty
	<tr>
		<td colspan="4">No routes</td>
	</tr>
	@endforelse
</table>