@extends('admin.layout')

@section('admin')
	<div class="jumbotron">
		<h1 class="h1">Welcome to Admin dashboard!</h1>
		<a class="btn btn-danger" href="{{ url('admin/runonce') }}">Run once</a>
	</div>
@stop