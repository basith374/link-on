@extends('layouts.master')

@section('title', 'Blogs')

@section('csslinks')
	<input type="hidden" value="striped" id="smartHead">
@endsection

@section('content')
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-trash"></span> Confirm Delete</h4>
			</div>
			<div class="modal-body">
				Are you sure you want to delete this blog? You cannot undo this action.
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<a href="#" class="btn btn-danger" id="blogDelete">Delete</a>
			</div>
		</div>
	</div>
</div>
<div class="page-w-lblack">
	<div class="container">
		<div id="blog-container">
			<div class="row">
				<div class="top-link">
					<a href="{{ route('blogs.create') }}" class="btn btn-success">New Post</a>
				</div>
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
			<div class="row">
				<div id="blog-view" class="row-space clearfix">
					@foreach($blogs as $blog)
						<div class="col-lg-10 col-lg-offset-1 blog-post blog-box-cust">
							<div class="blog-head-wrapper">
								<div class="blog-post-head blog-box-head">
									<span class="h1 ">{{ $blog->title }}</span>
									<small">by {{ $blog->user->name }}</small>
									<span class="blod-box-date pull-right">Posted {{ $blog->updated_at }}</span>
								</div>
							</div>
							<div class="blog-post-body blog-box-body">
								<p>{{ str_limit($blog->body, 350) }}<?php if(strlen($blog->body) > 350 ){ ?><a href="{{ route('blogs.show', $blog) }}">continue reading</a></p><?php } ?>
							</div>
							<div class="blog-post-foot blog-box-footer">
								<span>0 : Likes</span> |
								<span>0 : Tags</span> |
								<span>0 : Categories</span>
								@if(Auth::user())
									<div class="pull-right" style="margin-right:5px;">
										<a href="{{ route('blogs.edit', $blog) }}" class="btn btn-primary btn-sm">Edit</a>
										{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm', 'data-toggle' => 'modal', 'data-target' => '#delete-modal']) !!}
									</div>
								@endif
							</div>
						</div>
					@endforeach
				</div>
				<div class="col-lg-4 col-lg-offset-5">
					{!! $blogs->render() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection