@extends('layouts.master')

@section('title', 'Blogs')

@section('content')
<div class="page-w-lblack">
	<div class="container">
		<div id="blog-container">
			<div class="top-link">
				<a href="{{ route('blogs.create') }}" class="btn btn-success">New Post</a>
			</div>
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
						<div class="col-lg-10 col-lg-offset-1 blog-post blog-box-cust">
							<div class="blog-head-wrapper">
								<div class="blog-post-head blog-box-head">
									<span class="h1 ">{{ $blog->title }} </span>
									<small">by {{ $blog->user->name }} </small>
									<span class="blod-box-date pull-right">Posted {{ $blog->updated_at }}</span>
								</div>
							</div>
							<div class="blog-post-body blog-box-body">
								<p>{{ str_limit($blog->body, 350) }}<a href="{{ route('blogs.show', $blog) }}">continue reading</a></p>
								</div>
							<div class="blog-post-foot blog-box-footer">
								<span>0 : Likes</span> |
								<span>0 : Tags</span> |
								<span>0 : Categories</span>
								<div class="pull-right" style="margin-right:5px;">
									{!! Form::open(['method' => 'DELETE', 'route' => 'blogs.destroy', 'class' => 'form-inline']) !!}
										<a href="{{ route('blogs.edit', $blog) }}" class="btn btn-primary btn-sm">Edit</a>
										{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
									{!! Form::close() !!}
								</div>
							</div>
						</div>
					@endforeach
				</div>
				<div class="row">
					<div class="col-lg-3 col-lg-offset-5">
						{!! $blogs->render() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection