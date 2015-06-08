@extends('layouts.master')

@section('title', 'Admin Console')

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
			<ul id="myTab" class="nav nav-tabs">
				<li><a href="#dashboardTab" data-toggle="tab">Dashboard</a></li>
				<li><a href="#statsTab" data-toggle="tab">Stats</a></li>
				<li><a href="#usersTab" data-toggle="tab">Users</a></li>
				<li><a href="#consoleTab" data-toggle="tab">Console</a></li>
				<li><a href="#servicesTab" data-toggle="tab">Services</a></li>
			</ul>
			<div id="myTabContent" class="tab-content">
				@foreach($pages as $page)
					@if($page == $showpage)
					<div class="tab-pane fade in active" id="{{$page . 'Tab'}}">
						@include('/admin/dashboard/' . $showpage)
					</div>
					@else
					<div class="tab-pane fade" id="{{$page . 'Tab'}}">
					</div>
					@endif
				@endforeach
			</div>
		</div>
	</div>
</div>
@stop

@section('jslinks')
<script type="text/javascript" src="{{ asset('/js/Chart.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/dashboard-app.js') }}"></script>
@stop