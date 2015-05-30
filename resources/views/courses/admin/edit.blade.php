{{-- /resources/views/courses/admin/edit.blade.php --}}
@extends('layouts.master')
@section('title', 'Edit Course')
@section('content')
<div class="container">
	<div class="top-link">
		<a class="btn btn-default" href="#">Back</a>
		<input type="hidden" value="initEdit" id="editTrigger" />
	</div>
	<div class="row">
		@if($errors)
			@if($errors->count()>0)
				<div class="alert alert-danger alert-dismissable" >
					<a href="#" data-dismiss="alert" class="close">&times;</a> 
					@foreach($errors->all() as $error)
						<p>{{$error}}</p>
					@endforeach
				</div>
			@endif
		@endif
		<div>
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-primary">
					<div class="panel-heading">Edit course</div>
					<div class="panel-body">
						{!! Form::open(['method' => 'PATCH', 'route' => ['courses.update', $course], 'class' => 'form-horizontal', ]) !!}
							@include('courses/admin/partials/_form', ['submit_text' => 'Save Changes', 'edit_mode' => true])
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('jslinks')
<script type="text/javascript" src="{{ asset('/js/course-app.js') }}"></script>
@endsection