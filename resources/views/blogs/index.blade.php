@extends('layouts.master')

@section('title', 'Blogs')

@section('csslinks')
	<input type="hidden" value="striped" id="smartHead">
@endsection

@section('content')
<div class="page-w-lblack">
	<div class="container">
		<div id="blog-container">
			<div class="col-lg-offset-1">
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
							<div class="col-lg-8 blog-post blog-box-cust">
								<div class="blog-head-wrapper">
									<div class="blog-post-head blog-box-head">
										<span class="h1 ">{{ $blog->title }} </span>
										<span class="blod-box-date pull-right">Posted {{ $blog->updated_at }}</span>
									</div>
								</div>
								<div class="blog-post-body blog-box-body">
									<p>{{ $blog->body }}</p>
								</div>
								<div class="blog-post-foot blog-box-footer">
									0 : Likes 
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
	</div>
</div>
@endsection