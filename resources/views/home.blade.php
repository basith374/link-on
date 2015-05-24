{{-- /resources/views/home.blade.php --}}
@extends('layouts.master')

@section('title', 'Home')

@section('content')
<div class="container">
	
	@if(Auth::user())
		<div class="alert alert-info">You're user</div>
	@endif

	<div class="row">
		@for($i=0;$i<12;$i++)
			<div class="col-md-2">
				<a href="{{ route('courses.index') }}" class="pawe">
					<div class="panel panel-default paws">
						<div class="panel-heading">
							<h3 class="panel-title"><span class="glyphicon glyphicon-asterisk"></span> Courses</h3>
						</div>
						<div class="panel-body">
							Panel content, there are supposed to be a ton of content in here but unfortunately this shit is under development.
							<span class="badge backt">Awesome</span>
						</div>
					</div>
				</a>
			</div>
		@endfor
	</div>

</div>
@endsection