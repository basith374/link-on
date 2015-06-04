{{-- /resources/views/blogs/admin/partials/_form.blade.php --}}
<div class="form-group">
	<div class="col-md-7 col-md-offset-3">
		<div id="title-info" class="text text-danger"></div>
	</div>
	{!! Form::label('title', 'Title', ['class' => 'control-label col-md-3']) !!}
	<div class="col-md-7">
		{!! Form::text('title',  isset($blog) ? $blog->title : '', ['class' => 'form-control', 'id' => 'title-field' ,'required' => 'true']) !!}
	</div>
</div>
<div class="form-group">
	<div class="col-md-7 col-md-offset-3">
		<div id="image-info" class="text text-danger"></div>
	</div>
	{!! Form::label('image', 'Image', ['class' => 'control-label col-md-3']) !!}
	<div class="col-md-7">
		{!! Form::text('image',  isset($blog) ? $blog->image : null, ['class' => 'form-control', 'id' => 'image-field' ,'required' => 'true']) !!}
	</div>
</div>
<div class="form-group">
	<div class="col-md-7 col-md-offset-3">
		<div id="body-info" class="text text-danger"></div>
	</div>
	{!! Form::label('body', 'Body', ['class' => 'control-label col-md-3']) !!}
	<div class="col-md-7">
		{!! Form::textarea('body',  isset($blog) ? $blog->body : null, ['class' => 'form-control', 'rows' => '10', 'id' => 'body-field' ,'required' => 'true']) !!}
	</div>
</div>