{{-- /resources/views/courses/admin/partials/_form.blade.php --}}
<div class="form-group">
	{!! Form::label('slug', 'Slug', ['class' => 'text-danger control-label col-md-3']) !!}
	<div class="col-md-7">
		{!! Form::text('slug', isset($course) ? $course->slug : '', ['class' => 'form-control backt']) !!}
	</div>
	@if($edit_mode)
		<div class="col-md-2 slug-danger">
			{!! Form::label('slug', 'Dont Change', ['class' => 'label label-danger', 'id' => 'slug-field']) !!}
		</div>
	@endif
</div>
<div class="form-group">
	{!! Form::label('title', 'Title', ['class' => 'control-label col-md-3']) !!}
	<div class="col-md-7">
		{!! Form::text('title', isset($course) ? $course->title : '', ['class' => 'form-control', 'id' => 'title-field']) !!}
	</div>
</div>
<div class="form-group">
	{!! Form::label('acronym', 'Acronym', ['class' => 'control-label col-md-3']) !!}
	<div class="col-md-7">
		{!! Form::text('acronym', isset($course) ? $course->acronym : '', ['class' => 'form-control', 'id' => 'acronym-field']) !!}
	</div>
</div>
<div class="form-group">	
	{!! Form::label('description', 'Description', ['class' => 'control-label col-md-3']) !!}
	<div class="col-md-7">
		{!! Form::textarea('description', isset($course) ? $course->description : '', ['class' => 'form-control', 'id' => 'description-field']) !!}
	</div>
</div>
{{-- start subjects --}}
<div class="form-group">
	<div class="col-md-7 col-md-offset-3">
		<div class="panel panel-success" id="subjects-panel">
			<div class="panel-heading">
				Subjects
			</div>
			<ul class="list-group" id="subjectList">
				@if($edit_mode)
					@foreach($subjects as $subject)
						<li class="list-group-item">
							<div class="input-group input-group-sm">
								{!! Form::select('subjects', $subjectnames, array_search($subject->title, $subjectnames), ['class' => 'form-control']) !!}
								<a class="btn btn-danger input-group-addon subjectRemove"><span class="glyphicon glyphicon-remove"></span></a>
							</div>
						</li>
					@endforeach
				@endif
				<li class="list-group-item">
					<a class="btn btn-primary btn-xs disabled" id="subjectAdd"><span class="glyphicon glyphicon-plus"></span> Add</a>
				</li>
			</ul>
		</div>
	</div>
</div>
{{-- end subjects --}}
<div class="form-group">
	<div class="col-md-2 col-md-offset-3">
		{!! Form::button('<span class="glyphicon glyphicon-save"></span> ' . $submit_text, ['class' => 'btn btn-danger', 'type' => 'submit'])!!}
	</div>
</div>