{{-- /resources/views/blogs/admin/partials/_form.blade.php --}}
<div class="form-group">
	<div class="col-md-7 col-md-offset-3">
		<div id="title-info" class="text text-danger"></div>
	</div>
	{!! Form::label('title', 'Title', ['class' => 'control-label col-md-3']) !!}
	<div class="col-md-7">
		{!! Form::text('title',  isset($blog) ? $blog->title : '', ['class' => 'form-control', 'id' => 'title' ,'required' => 'true']) !!}
	</div>
</div>
<div class="form-group">
	<div class="col-md-7 col-md-offset-3">
		<div id="image-info" class="text text-danger"></div>
	</div>
	{!! Form::label('image', 'Image', ['class' => 'control-label col-md-3']) !!}
	<div class="col-md-7">
		{!! Form::text('image',  isset($blog) ? $blog->image : null, ['class' => 'form-control', 'id' => 'image']) !!}
	</div>
</div>
<div class="form-group">
	<div class="col-md-7 col-md-offset-3">
		<div id="description-info" class="text text-danger"></div>
	</div>
	{!! Form::label('description', 'Description', ['class' => 'control-label col-md-3']) !!}
	<div class="col-md-7">
		{!! Form::textarea('description',  isset($blog) ? $blog->description : null, ['class' => 'form-control', 'rows' => '10', 'id' => 'description']) !!}
	</div>
</div>