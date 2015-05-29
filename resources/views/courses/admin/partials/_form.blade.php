{{-- /resources/views/courses/admin/partials/_form.blade.php --}}
@if(isset($course))
	<input type="hidden" id="courseId" value="{{ $course->id }}"/>
@endif
<div class="form-group">
	{!! Form::label('slug', 'Slug', ['class' => 'text-danger control-label col-md-3']) !!}
	<div class="col-md-7">
		{!! Form::text('slug', isset($course) ? $course->slug : '', ['class' => 'form-control', 'id' => 'slug-field']) !!}
	</div>
	@if($edit_mode)
		<div class="col-md-2 slug-danger">
			{!! Form::label('slug', 'Dont Change', ['class' => 'label label-danger']) !!}
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