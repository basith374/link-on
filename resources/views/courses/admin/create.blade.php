{{-- /resources/views/courses/admin/create.blade.php --}}
@extends('layouts.master')

@section('title', 'Create Course')

@section('content')
<div class="container">
	<div class="top-link">
		<a href="{{ route('courses.index') }}" class="btn btn-default btn-sm">Back</a>
	</div>
	<div>
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-primary">
				<div class="panel-heading">Create Course</div>
				<div class="panel-body">
					{!! Form::open(['route' => ['courses.store'], 'class' => 'form-horizontal', ]) !!}
						@include('courses/admin/partials/_form', ['submit_text' => 'Create Course', 'edit_mode' => false])
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>


@endsection

@section('jslinks')
<script src="{{asset('/js/course-app.js')}}" type="text/javascript"></script>
@endsection

