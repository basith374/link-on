@extends('layouts.master')

@section('title', 'Blogs')

@section('csslinks')
<style type="text/css">
.backb {
	background: #111;
	height: 250px;
}
#blog-banner {
	background:url('/img/colorful_paint_splatter-wallpaper-1400x1050.jpg');
	height: 250px;
	text-align: center;
	transition: all 0.5s linear;
	vertical-align: middle;
}
#blog-banner > h1 {
	transition: all 0.5s linear;
	opacity: 0.1;
	color: #333;
	vertical-align: middle;
}
#blog-banner:hover {
	opacity: 0.7;
}
#blog-banner:hover > h1 {
	opacity: 0.9;
	color: #fff;
}
</style>
@endsection

@section('content')
<div class="container">
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
		<div class="row">
			<div class="col-lg-12">
				<div class="backb">
					<div id="blog-banner"><h1>{{ $blog->title }}</h1></div>
				</div>
			</div>
		</div>
		<div class="top-link">
			<a href="{{ route('blogs.index') }}" class="btn btn-default">Back</a>
		</div>
		<div class="col-lg-8 col-lg-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading"><h1>{{ $blog->title }}</h1></div>
				<div class="panel-body">{{ $blog->body }}</div>
				<div class="panel-footer">by {{ $blog->user->name }}<span class="badge pull-right">Posted {{ $blog->updated_at }}</span></div>
			</div>
		</div>
		<div class="col-lg-12">
			<h3>Comments</h3>
			<div>
			<form class="form-horizontal">
				<div class="form-group">
					<div class="col-lg-6">
						<label class="label">Email</label>
						<input type="text" class="form-control" />
					</div>
				</div>
				<div class="form-group">
					<div class="col-lg-6">
						<label class="label">Comment</label>
						<textarea class="form-control" rows="10"></textarea>
					</div>
				</div>
				<input type="submit" class="btn btn-primary" value="Post Comment" />
			</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('jslinks')
<script type="text/javascript">
// remember to move this code out to seperate js file. (Unobtrusive javascript)

	$(document).scroll(function() {
		var scrollPos = $(this).scrollTop();
		$('#blog-banner').css({
			//'top' : (scrollPos/3) + 'px',
			'opacity' : 1-(scrollPos/280)
		});
	});

</script>
@endsection