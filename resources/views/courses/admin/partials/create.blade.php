{{-- /resources/views/courses/admin/create.blade.php --}}
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
