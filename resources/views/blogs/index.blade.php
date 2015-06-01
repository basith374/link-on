@extends('layouts.master')

@section('title', 'Blogs')

@section('content')
<div class="container">
	<div id="blog-container">
		<div class="row">
			@if(Session::has('success-message'))
				<div class="alert alert-success alert-dismissable">
					<a href="#" data-dismiss="alert" class="close">&times;</a>{{ Session::get('success-message') }}
				</div>
			@endif
			@if(Session::has('failure-message'))
				<div class="alert alert-danger alert-dismissable">
					<a href="#" data-dismiss="alert" class="close">&times;</a>{{ Session::get('failure-message') }}
				</div>
			@endif
			@if($errors->any())
				<div class="alert alert-danger alert-dismissable">
					<a href="#" data-dismiss="alert" class="close">&times;</a>
					@foreach($errors->all() as $error)
						<p>{{ $error }}</p>
					@endforeach
				</div>
			@endif
		</div>
		<div id="blog-view" class="row-space clearfix">
			<div class="row">
				@foreach($blogs as $blog)
					<div class="col-lg-8 blog-post">
						<div class="blog-post-head">
							<h1 class="h1">{{ $blog->title }}</h1>
						</div>
						<div class="blog-post-body">
							<p>{{ $blog->body }}</p>
						</div>
						<div class="blog-post-foot">
							<span class="badge">Posted {{ $blog->updated_at }}</span>
						</div>
					</div>
				@endforeach
			</div>
			<div class="row">
				<div class="col-lg-4 col-lg-offset-3">
					{!! $blogs->render() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection