{{-- /resources/views/subjects/admin/partials/_form.blade.php --}}
<div class="form-group">
	{!! Form::label('slug', 'Slug', ['class' => 'text-danger control-label col-md-3']) !!}
	<div class="col-md-7">
		{!! Form::text('slug', isset($subject) ? $subject->slug : '', ['class' => 'form-control backt']) !!}
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
		{!! Form::text('title',  isset($subject) ? $subject->title : '', ['class' => 'form-control']) !!}
	</div>
</div>
<div class="form-group">
	{!! Form::label('acronym', 'Acronym', ['class' => 'control-label col-md-3']) !!}
	<div class="col-md-7">
		{!! Form::text('acronym',  isset($subject) ? $subject->acronym : '', ['class' => 'form-control']) !!}
	</div>
</div>
<div class="form-group">
	{!! Form::label('cost', 'Cost', ['class' => 'control-label col-md-3']) !!}
	<div class="col-md-7">
		{!! Form::text('cost',  isset($subject) ? $subject->cost : '', ['class' => 'form-control']) !!}
	</div>
</div>
<div class="form-group">
	{!! Form::label('timeperiod', 'Time Period', ['class' => 'control-label col-md-3']) !!}
	<div class="col-md-7">
		{!! Form::text('timeperiod',  isset($subject) ? $subject->timeperiod : '', ['class' => 'form-control']) !!}
	</div>
</div>
<div class="form-group">	
	{!! Form::label('description', 'Description', ['class' => 'control-label col-md-3']) !!}
	<div class="col-md-7">
		{!! Form::textarea('description',  isset($subject) ? $subject->description : '', ['class' => 'form-control']) !!}
	</div>
</div>
<div class="form-group">
	<div class="col-md-2 col-md-offset-3">
		{!! Form::button('<span class="glyphicon glyphicon-save"></span> ' . $submit_text, ['class' => 'btn btn-danger', 'type' => 'submit'])!!}
	</div>
</div>