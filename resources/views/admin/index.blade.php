@extends('layouts.master')

@section('title', 'Example')

@section('content')
<div class="container">
	<div class="row row-space-top">
		<div class="col-md-2">
			<ul class="list-group">
				<li class="list-group-item">Stats</li>
				<li class="list-group-item">Users</li>
				<li class="list-group-item">Graphs</li>
				<li class="list-group-item">Console</li>
				<li class="list-group-item">Commands</li>
				<li class="list-group-item">API</li>
				<li class="list-group-item">Services</li>
			</ul>
		</div>
		<div class="col-md-10">
			<div class="jumbotron">
				<h1 class="h1">Welcome to dashboard Admin!</h1>
				<a class="btn btn-danger" href="{{ url('admin/runonce') }}">Run once</a>
			</div>
		</div>
	</div>
</div>
@endsection