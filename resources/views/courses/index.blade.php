{{-- /resources/views/app/academy/courses/index.blade.php --}}
@extends('layouts.master')

@section('title', 'Courses')

@section('content')
<div class="container">
	<div class="row">
		<div class="top-link">
			<a href="{{ route('courses.create') }}" class="btn btn-sm btn-primary" >Create Course</a>
			<a href="{{ route('subjects.create') }}" class="btn btn-sm btn-success" >Create Subject</a>
		</div>
		@if(Session::has('success-message'))
			<div class="alert alert-success alert-dismissable">
				<p>{{ Session::get('success-message') }}</p>
			</div>
		@endif
		<div class="">{{-- grid box width class here --}}
			@if($courses)
				@foreach($courses as $course)
					<div class="col-md-4">
						<a href="{{ route('courses.show', $course) }}" class="pawe">
							<div class="panel panel-default paws">
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