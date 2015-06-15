@extends('layouts.master')

@section('content')
<div class="container">
	<div class="row row-space-top">
		<div class="col-md-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="h4">Admin console</h3>
                </div>
                <ul class="list-group">
                    <li class="list-group-item"><a href="/admin/dashboard">Dashboard</a></li>
                    <li class="list-group-item"><a href="/admin/profile">Profile</a></li>
                    <li class="list-group-item"><a href="/admin/tracker">Tracker</a></li>
                </ul>
            </div>
		</div>
		<div class="col-md-10">
			@yield('admin')
		</div>
	</div>
</div>
@stop