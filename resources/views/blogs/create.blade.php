@extends('layouts.master')

@section('title', 'Blogs')

@section('content')
<div class="container">
	<div class="row">
		<div class="top-link">
			<a href="{{ route('blogs.index') }}" class="btn btn-default btn-sm">Back</a>
		</div
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
			<div class="col-lg-10">
				{!! Form::open(['route' => 'blogs.store', 'class' => 'form-horizontal']) !!}
					@include('/blogs/partials/_form')
					<div class="col-lg-offset-3 col-lg-4">
						{!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection