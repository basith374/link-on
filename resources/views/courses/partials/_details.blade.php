<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-info course-panel">
			<div class="panel-heading clearfix">
				<div>
					<h3 class="h3">{{ $course->title }}</h3>
				</div>
				<span class="label label-success">{{ $course->acronym }}</span>
			</div>

			<div class="panel-body">
				{{ $course->description }}
				<div class="subject-table">
					@if($course->subjects)
						<div class="panel panel-default">
							<div class="panel-heading">Subjects</div>
							<table class="table table-hover">
								<tr>
									<th>Subject Name</th>
									<th>Cost</th>
								</tr>
								@foreach($course->subjects as $subject)
									<tr>
										<td><a href="{{ route('subjects.show', ['subjects' => $subject, 'course' => $course]) }}">{{ $subject->title }}</a></td>
										<td>{{ $subject->cost }}</td>
									</tr>
								@endforeach
								<tr class="active">
									<td>Total</td>
									<td><span class="label label-default"><span class="glyphicon glyphicon-euro"></span> {{ $course->cost() }}</span></td>
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