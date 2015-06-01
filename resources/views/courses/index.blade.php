{{-- /resources/views/app/academy/courses/index.blade.php --}}

@extends('layouts.master')

@section('title', 'Courses')

{{---------------------------------------------------------------------------------------------------------

	This section is for admin navigation bar. Put this code top of every page if you need admin tools in 
	that page. 

----------------------------------------------------------------------------------------------------------}}

	@section('adminTools')
		
		<div class="ad-nav-base">
			<div class="container bczh-main">
				<div class="row">
					<div class="top-link pull-right ad-panel-btns">
						<a href="{{ route('courses.create') }}" class="btn ad-nav-sd-btn cl-cust-blue bcz-help --btn" >Create Course</a>
						<a href="{{ route('subjects.create') }}" class="btn ad-nav-sd-btn cl-cust-green bcz-help  --btn" >Create Subject</a>
						<a href="{{ route('subjects.index') }}" class="btn ad-nav-sd-btn cl-cust-red bcz-help --btn-e" extra="You can also add/delete subjects from here.">View Subjects</a>
					</div>
					
					{{-- Help Panel --}}
			
					<div class="ad-help-panel untouchable bcz-help-panel">
						<span class="bcz-icon">BCZ</span> <span class="bcz-help-panel-value">Hi - BCZ Help system</span>
					</div>
					
				</div>	
			</div>
		</div>		
	@endsection
	@section('fakeAdminHead')
		<div class="fakeAdminHead"> </div>
	@endsection

{{--------------------------------------------------------------------------------------------------------}}
	
@section('content')
<div class="container row-space-top">
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
		<div id="coursesGrid"><!-- gridbox width class here -->
			@if($courses)
				@foreach($courses as $course)
					<div class="col-sm-6 col-md-4">
						<a href="{{ route('courses.show', $course) }}" class="cors-g-box">
							<div class="panel panel-default">
								<div class="cors-g-head">
									<h3 class="panel-title"><span class="glyphicon glyphicon-asterisk"></span> {{ $course->title }}</h3>
									<div class="cors-g-ribbon-wrapper"><div class="cors-g-ribbon">New</div></div>
								</div>
								<div class="panel-body cors-g-body">
									{{ $course->description }}
									<span class="badge backt">{{ $course->acronym }}</span>
								</div>
							</div>
						</a>
					</div>
				@endforeach
			@endif
			<div id="coursesGrid"><!-- gridbox width class here -->
				@if($courses)
					@foreach($courses as $course)
						<div class="col-sm-6 col-md-4">
							<a href="{{ route('courses.show', $course) }}" class="cors-g-box">
								<div class="">
									<div class="cors-g-head">
										<h3 class="panel-title"><span class="glyphicon glyphicon-asterisk"></span> {{ $course->title }}</h3>
									</div>
									<div class="panel-body cors-g-body">
										{{ $course->description }}
										<span class="badge badge-cust clr-cust-dgrey">{{ $course->acronym }}</span>
									</div>
								</div>
							</a>
						</div>
					@endforeach
				@endif
			</div>
		</div>
	</div>
</div>	
@endsection