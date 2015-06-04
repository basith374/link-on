{{-- /resources/views/courses/show.blade.php --}}
@extends('layouts.master')

@section('title', "$course->title")

{{---------------------------------------------------------------------------------------------------------

	This section is for admin navigation bar. Put this code top of every page if you need admin tools in 
	that page. 

----------------------------------------------------------------------------------------------------------}}

	@section('adminTools')
		
		<div class="ad-nav-base">
			<div class="container bczh-main">
				<div class="row">
					<div class="top-link pull-right ad-panel-btns">
						<a href="{{ route('courses.create') }}" class="btn ad-nav-sd-btn cl-cust-blue bcz-help --btn" >Create Course</a>
						<a href="{{ route('subjects.create') }}" class="btn ad-nav-sd-btn cl-cust-green bcz-help  --btn" >Create Subject</a>
						<a href="{{ route('subjects.index') }}" class="btn ad-nav-sd-btn cl-cust-red bcz-help --btn-e" extra="You can also add/delete subjects from here.">View Subjects</a>
					</div>
				</div>	
			</div>
		</div>		
	@endsection
	@section('fakeAdminHead')
		<div class="fakeAdminHead"> </div>
	@endsection

{{--------------------------------------------------------------------------------------------------------}}
	
@section('content')
@section('content')	
<div class="container">
	<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-trash"></span> Confirm Delete</h4>
				</div>
				<div class="modal-body">
					Are you sure you want to delete this course? If you proceed, there is no going back.
				</div>
				<div class="modal-footer">
					{!! Form::open(['method' => 'DELETE', 'route' =>['courses.destroy', $course], 'class' => 'form-inline']) !!}
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						{!! Form::submit('Delete', ['class' => 'btn btn-danger', 'id' => 'courseDelete']) !!}
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
	<!--
	<div class="top-link">
		<a href="{{ route('courses.index') }}" class="btn btn-default btn-sm">Back</a>
		<div class="pull-right btn-group">
			<a class="btn btn-primary btn-sm" id="courseEdit">Edit</a>
			<a class="btn btn-success btn-sm" id="courseCreate">Create</a>
			<a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-modal">Delete</a>
		</div>-->
	<div class="row-space">
		<ul class="nav nav-tabs" id="navtabs">
			<li class="active"><a href="#" id="courseDetails">Details</a></li>
			<li><a href="#" id="courseCreate">Create</a></li>
			<li><a href="#" id="courseEdit">Edit</a></li>
			<li><a href="#" data-toggle="modal" data-target="#delete-modal">Delete</a></li>
			<li><a href="{{ route('courses.index') }}">Back</a></li>
		</ul>
		<input type="hidden" id="courseId" value="{{ $course->id }}"/>
	</div>
	<!--
	</div>
	-->
	@if(Session::has('success-message'))
		
		<div class="alert alert-success alert-dismissable" id="mass-error">
			<a href="#" data-dismiss="alert" class="close">&times;</a>{{Session::get('success-message')}}
		</div>
	@endif
	
	<div class="row" id="formContainer">
		<div class="top-link">
			<a href="{{ route('blogs.index') }}" class="btn btn-default btn-sm">Back</a>
		</div>
		@include('courses/partials/_details')
	</div>
</div>
@endsection

@section('jslinks')
<script type="text/javascript" src="{{ asset('/js/course-app.js') }}"></script>
@endsection