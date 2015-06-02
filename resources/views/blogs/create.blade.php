@extends('layouts.master')

@section('title', 'Blogs')

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
	</div>
</div>
@endsection