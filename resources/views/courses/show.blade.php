{{-- /resources/views/courses/show.blade.php --}}
@extends('layouts.master')

@section('title', "$course->title")

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
		<div class="pull-right btn-group">
			<a href="{{ route('courses.edit', $course) }}" class="btn btn-primary btn-sm">Edit</a>
			<a href="{{ route('courses.create') }}" class="btn btn-success btn-sm">Create</a>
			<a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-modal">Delete</a>
		</div>
	</div>
	@if(Session::has('success-message'))
		
		<div class="alert alert-success alert-dismissable" id="mass-error">
			<a href="#" data-dismiss="alert" class="close">&times;</a>{{Session::get('success-message')}}
		</div>
	@endif
	
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-info">
				<div class="panel-heading">
					{{ $course->title }} <span class="label label-success pull-right">{{ $course->acronym }}</span>
				</div>

				<div class="panel-body">
					{{ $course->description }}
					<div class="subject-table">
						@if($subjects)						
							<div class="panel panel-default">
								<div class="panel-heading">Subjects</div>
								<table class="table table-hover">
									<tr>
										<th>Subject Name</th>
										<th>Cost</th>
									</tr>
									<?php
										$total = 0;
									?>
									@foreach($subjects as $subject)
										<tr>
											<td><a href="{{ route('subjects.show', ['subjects' => $subject, 'course' => $course]) }}">{{ $subject->title }}</a></td>
											<td>{{ $subject->cost }}</td>
										</tr>
										<?php
											$total = $total + $subject->cost;
										?>
									@endforeach
									<tr class="active">
										<td>Total</td>
										<td><span class="label label-default"><span class="glyphicon glyphicon-euro"></span> {{ $total }}</span></td>
									</tr>
								</table>
							</div>
						@else
							<div class="well well-sm">
								No subjects
							</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection