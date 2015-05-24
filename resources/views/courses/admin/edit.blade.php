{{-- /resources/views/courses/admin/edit.blade.php --}}
@extends('layouts.master')

@section('content')
<div class="container">
	<div class="top-link">
		<a href="{{ route('courses.show', $course) }}" class="btn btn-default btn-sm">Back</a>
	</div>
	<div>
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-primary">
				<div class="panel-heading">Create course</div>
				<div class="panel-body">
					{!! Form::open(['method' => 'PATCH', 'route' => ['courses.update', $course], 'class' => 'form-horizontal', ]) !!}
						@include('courses/admin/partials/_form', ['submit_text' => 'Save Changes', 'edit_mode' => true])
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection