@extends('layouts.master')

@section('title', 'Admin Panel')

@section('content')
<div class="container">
	<div class="row row-space-top">
		<div class="col-md-2">
			<ul class="list-group">
				<li class="list-group-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
				<li class="list-group-item"><a href="{{ url('/admin/stats') }}">Stats</a></li>
				<li class="list-group-item"><a href="{{ url('/admin/users') }}">Users</a></li>
				<li class="list-group-item"><a href="{{ url('/admin/console') }}">Console</a></li>
				<li class="list-group-item"><a href="{{ url('/admin/services') }}">Services</a></li>
			</ul>
		</div>
		<div class="col-md-10">
			@yield('admin')
		</div>
	</div>
</div>
@stop