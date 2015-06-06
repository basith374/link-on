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
						<input type="hidden" id="courseId" value="{{ $course->id }}" />
						<a href="#" id="courseDetails" class="btn ad-nav-sd-btn cl-cust-blue bcz-help --btn">Details</a>
						<a href="#" id="courseCreate" class="btn ad-nav-sd-btn cl-cust-green bcz-help --btn">Create</a>
						<a href="#" id="courseEdit" class="btn ad-nav-sd-btn cl-cust-blue bcz-help --btn">Edit</a>
						<a href="#" data-toggle="modal" data-target="#delete-modal" class="btn ad-nav-sd-btn cl-cust-red bcz-help --btn">Delete</a>
						<a class="fakeLink btn ad-nav-sd-btn cl-cust-blue bcz-help " id="bcz-cons-btn" tip="Click console and type quick commands">Console</a>
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
	<div class="top-link">
		<a href="{{ route('courses.index') }}" class="btn btn-default btn-sm">Back</a>
	</div>
	@if(Session::has('success-message'))	
		<div class="alert alert-success alert-dismissable" id="mass-error">
			<a href="#" data-dismiss="alert" class="close">&times;</a>{{Session::get('success-message')}}
		</div>
	@endif
	
	<div class="row" id="formContainer">
		@include('courses/partials/_details')
	</div>
</div>
@endsection

@section('jslinks')
<script type="text/javascript" src="{{ asset('/js/course-app.js') }}"></script>
@endsection