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

<div class="">

</br>

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
							<div id="container">
								<div id="dummy"></div>
								<div id="element">
									<a href="{{ route('courses.show', $course) }}" class="">
										<div class="cors-container">
											<div class="cors-g-ribbon-wrapper"><div class="cors-g-ribbon">New</div></div>

											<div class="cors-top">
												COST {{ $course->cost }}
												
											</div>
											<div class="cors-back ">
												<div class="badge cors-badge">{{ $course->acronym }}</div>
												
											</div>
											<div class="cors-front">
												<div class="cors-head">
												{{ $course->title }}
												</div>
												<div class="cors-body">
												{{ $course->description }}
												</div>
											</div>
										</div>	
									</a>
								</div>
							</div>
					@endforeach
				@endif
			</div>
		</div>
	</div>
</div>	
@endsection