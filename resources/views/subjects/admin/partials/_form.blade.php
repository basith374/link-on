{{-- /resources/views/subjects/admin/partials/_form.blade.php --}}
<div class="form-group">
	{!! Form::label('slug', 'Slug', ['class' => 'text-danger control-label col-md-3']) !!}
	<div class="col-md-7">
		{!! Form::text('slug', isset($subject) ? $subject->slug : null, ['class' => 'form-control', 'id' => 'slug', 'disabled' => '']) !!}
	</div>
</div>
<div class="form-group">
	{!! Form::label('title', 'Title', ['class' => 'control-label col-md-3']) !!}
	<div class="col-md-7">
		{!! Form::text('title',  isset($subject) ? $subject->title : '', ['class' => 'form-control', 'id' => 'title']) !!}
	</div>
</div>
<div class="form-group">
	{!! Form::label('acronym', 'Acronym', ['class' => 'control-label col-md-3']) !!}
	<div class="col-md-7">
		{!! Form::text('acronym',  isset($subject) ? $subject->acronym : null, ['class' => 'form-control', 'id' => 'acronym']) !!}
	</div>
</div>
<div class="form-group">
	{!! Form::label('cost', 'Cost', ['class' => 'control-label col-md-3']) !!}
	<div class="col-md-7">
		{!! Form::text('cost',  isset($subject) ? $subject->cost : null, ['class' => 'form-control', 'id' => 'cost']) !!}
	</div>
</div>
<div class="form-group">
	{!! Form::label('timeperiod', 'Time Period', ['class' => 'control-label col-md-3']) !!}
	<div class="col-md-7">
		{!! Form::text('timeperiod',  isset($subject) ? $subject->timeperiod : null, ['class' => 'form-control', 'id' => 'timeperiod']) !!}
	</div>
</div>
<div class="form-group">	
	{!! Form::label('description', 'Description', ['class' => 'control-label col-md-3']) !!}
	<div class="col-md-7">
		{!! Form::textarea('description',  isset($subject) ? $subject->description : null, ['class' => 'form-control', 'rows' => '6', 'id' => 'description']) !!}
	</div>
</div>