{{-- /resources/views/subjects/admin/create.blade.php --}}
@extends('layouts.master')

@section('title', 'Create Subject')

@section('content')
<div class="container">
	<div class="top-link">
		<a href="{{ route('courses.index') }}" class="btn btn-default btn-sm">Back</a>
	</div>
	<div>
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-primary">
				<div class="panel-heading">Create Subject</div>
				<div class="panel-body">
					{!! Form::open(['route' => ['subjects.store'], 'class' => 'form-horizontal', ]) !!}
						@include('subjects/admin/partials/_form', ['submit_text' => 'Create Subject', 'edit_mode' => false])
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection