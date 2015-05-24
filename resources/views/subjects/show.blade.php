{{-- /resources/views/subjects/show.blade.php --}}
@extends('layouts.master')

@section('title', "$subject->title")

@section('content')
<div class="container">
	<div class="top-link">
		<a href="{{ route('courses.show', $course) }}" class="btn btn-default btn-sm">Back</a>
		@if(!$course)
			<label class="label label-danger">Warning! no backreference found...</label>
		@endif
		<div class="btn-group pull-right">
			<a href="{{ route('subjects.edit', ['subjects' => $subject, 'course' => $course]) }}" class="btn btn-primary btn-sm">Edit</a>
			<a href="{{ route('subjects.create') }}" class="btn btn-success btn-sm">Create</a>
		</div>
	</div>
	<div class="jumbotron">
		<h1 class="subject-title">{{ $subject->title }}</h1>
		<div class="top-pad">{{ $subject->description }}<span class="label label-success pull-right">{{ $subject->acronym }}</span></div>
		<div class="top-pad">
			Time Period : <span class="label label-primary">{{ $subject->timeperiod }} Hrs</span>
			<span class="badge">Cost : <span class="glyphicon glyphicon-euro"></span> {{ $subject->cost }}</span>
		</div>
	</div>
</div>
@endsection