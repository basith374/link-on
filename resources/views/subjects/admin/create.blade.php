{{-- /resources/views/subjects/admin/create.blade.php --}}
@extends('layouts.master')

@section('title', 'Create Subject')

@section('content')
<div class="container">
	<div class="top-link">
		<a href="{{ route('courses.index') }}" class="btn btn-default btn-sm">Back</a>
	</div>
	@if(isset($errors))
		@if($errors->count() > 0)
			<div class="alert alert-danger alert-dismissable" id="mass-error">
				<a href="#" data-dismiss="alert" class="close">&times;</a> 
				@foreach($errors->all() as $error)
					<p>{{ $error }}</p>
				@endforeach
			</div>
		@endif
	@endif
	<div>
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-primary">
				<div class="panel-heading">Create Subject</div>
				<div class="panel-body">
					{!! Form::open(['route' => ['subjects.store'], 'class' => 'form-horizontal', ]) !!}
						@include('subjects/admin/partials/_form', ['edit_mode' => false])						
						<div class="form-group">
							<div class="col-md-2 col-md-offset-3">
								{!! Form::button('<span class="glyphicon glyphicon-save"></span> ' . 'Create Subject', ['class' => 'btn btn-danger', 'type' => 'submit'])!!}
							</div>
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('jslinks')
<script type="text/javascript" src="{{asset('/js/subject-app.js')}}"></script>
@endsection