@extends('layouts.master')

@section('title', 'Subjects')

@section('content')
<div class="container">
	<div class="modal fade" id="create-modal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="createModalLabel"><span class="glyphicon glyphicon-new"></span> Create New Subject</h4>
				</div>
				<div class="modal-body">
					{!! Form::open(['route' => ['subjects.store'], 'class' => 'form-horizontal', ]) !!}
						@include('subjects/admin/partials/_form')
					{!! Form::close() !!}
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<a href="#" class="btn btn-success" id="subjectCreate">Create</a>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="editModalLabel"><span class="glyphicon glyphicon-edit"></span> Edit Subject</h4>
				</div>
				<div class="modal-body">
					{!! Form::open(['method' => 'PATCH','route' => ['subjects.update', ], 'class' => 'form-horizontal', ]) !!}
						@include('subjects/admin/partials/_form')
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<a href="#" class="btn btn-primary" id="subjectEdit">Save changes</a>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-trash"></span> Confirm Delete</h4>
				</div>
				<div class="modal-body">
					Are you sure you want to delete this subject? You cannot undo this action.
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<a href="#" class="btn btn-danger" id="subjectDelete">Delete</a>
				</div>
			</div>
		</div>
	</div>
	<div class="top-link">
		<a href="{{ route('courses.index') }}" class="btn btn-default btn-sm">Back</a>
		<a class="btn btn-success btn-sm pull-right" data-target="#create-modal" data-toggle="modal" id="subject-create-btn">Create</a>
	</div>
	<div class="panel panel-default">
		<table class="table table-striped">
			<tr>
				<th>Slug</th>
				<th>Title</th>
				<th>Default</th>
			</tr>
			@foreach($subjects as $subject)
				<tr>
					<td>{{ $subject->slug }}</td>
					<td><a href="{{ route('subjects.show', $subject) }}">{{ $subject->title }}</a></td>
					<td>
						<input type="hidden" name="subjectId" value="{{ $subject->id }}" />
						<span class="btn-group btn-group-xs">
							<a class="btn btn-primary subject-edit-btn" data-target="#edit-modal" data-toggle="modal">Edit</button>
							<a class="btn btn-danger subject-delete-btn" data-target="#delete-modal" data-toggle="modal">Delete</a>
						</span>
					</td>
				</tr>
			@endforeach
		</table>
	</div>
</div>
@endsection
@section('jslinks')
<script type="text/javascript" src="{{ asset('/js/subject-app.js') }}"></script>
@endsection