



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