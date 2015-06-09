@extends('layouts.master')

@section('title', 'Admin Console')

@section('csslinks')
<style>
.popover {
	max-width: 500px;
}
.popover-content {
	word-wrap: break-word;
}
</style>
@endsection

@section('content')

<div class="container">
	<div class="row row-space-top">
		<div class="col-md-2">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h4 class="h4">Add stuff here</h3>
				</div>
				<ul class="list-group">
					<li class="list-group-item"><a href="#">Dumb link</a></li>
					<li class="list-group-item"><a href="#">Awesome link</a></li>
					<li class="list-group-item"><a href="#">Cool link</a></li>
					<li class="list-group-item"><a href="#">Amazing link</a></li>
					<li class="list-group-item"><a href="#">Ridiculous link</a></li>
					<li class="list-group-item"><a href="#">Absurd link</a></li>
				</ul>
			</div>
		</div>
		<div class="col-md-10">
			<ul id="myTab" class="nav nav-tabs">
				@foreach($pages as $page)
					<li><a href="#{{$page}}Tab" data-toggle="tab">{{ucwords($page)}}</a></li>
				@endforeach
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