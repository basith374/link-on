{{-- /resources/views/app/academy/courses/index.blade.php --}}
@extends('layouts.master')

@section('title', 'Courses')

@section('content')
<div class="container">
	<div class="top-link">
		<a href="{{ route('courses.create') }}" class="btn btn-sm btn-primary" >Create Course</a>
		<a href="{{ route('subjects.create') }}" class="btn btn-sm btn-success" >Create Subject</a>
		<a href="{{ route('subjects.index') }}" class="btn btn-sm btn-danger" >View Subjects</a>
	</div>
</div>
<div class="container">
	<div class="row">
		@if(Session::has('success-message'))
			<div class="alert alert-success alert-dismissable">
				<a href="#" data-dismiss="alert" class="close">&times;</a>{{ Session::get('success-message') }}
			</div>
		@endif
		@if(Session::has('failure-message'))
			<div class="alert alert-danger alert-dismissable">
				<a href="#" data-dismiss="alert" class="close">&times;</a>{{ Session::get('failure-message') }}
			</div>
		@endif
		<div id="coursesGrid"><!-- gridbox width class here -->
			@if($courses)
				@foreach($courses as $course)
					<div class="col-sm-6 col-md-4 col-lg-3">
						<a href="{{ route('courses.show', $course) }}" class="grid-link">
							<div class="panel panel-default grid-btn">
								<div class="panel-heading">
									<h3 class="panel-title"><span class="glyphicon glyphicon-asterisk"></span> {{ $course->title }}</h3>
								</div>
								<div class="panel-body">
									{{ $course->description }}
									<span class="badge backt">{{ $course->acronym }}</span>
								</div>
							</div>
						</a>
					</div>
				@endforeach
			@endif
		</div>
	</div>
</div>
@endsection