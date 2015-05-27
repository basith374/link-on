@extends('layouts.master')

@section('title', 'Subjects')

@section('content')
<div class="container">
	<div class="modal fade" id="create-modal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="createModalLabel"><span class="glyphicon glyphicon-new"></span> Create New Subject</h4>
				</div>
				<div class="modal-body">
					{!! Form::open(['route' => ['subjects.store'], 'class' => 'form-horizontal', ]) !!}
						@include('subjects/admin/partials/_form')
					{!! Form::close() !!}
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<a href="#" class="btn btn-success" id="subjectCreate">Create</a>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="editModalLabel"><span class="glyphicon glyphicon-edit"></span> Edit Subject</h4>
				</div>
				<div class="modal-body">
					{!! Form::open(['method' => 'PATCH','route' => ['subjects.update', ], 'class' => 'form-horizontal', ]) !!}
						@include('subjects/admin/partials/_form')
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<a href="#" class="btn btn-primary" id="subjectEdit">Save changes</a>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-trash"></span> Confirm Delete</h4>
				</div>
				<div class="modal-body">
					Are you sure you want to delete this subject? You cannot undo this action.
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<a href="#" class="btn btn-danger" id="subjectDelete">Delete</a>
				</div>
			</div>
		</div>
	</div>
	<div class="top-link">
		<a href="{{ route('courses.index') }}" class="btn btn-default btn-sm">Back</a>
		<a class="btn btn-success btn-sm pull-right" data-target="#create-modal" data-toggle="modal" id="show-create">Create</a>
	</div>
	<div class="panel panel-default">
		<table class="table table-striped">
			<tr>
				<th>Slug</th>
				<th>Title</th>
				<th>Default</th>
			</tr>
			@foreach($subjects as $subject)
				<tr>
					<td>{{ $subject->slug }}</td>
					<td><a href="{{ route('subjects.show', $subject) }}">{{ $subject->title }}</a></td>
					<td>
						<span class="btn-group btn-group-xs">
							<button type="button" class="btn btn-primary subject-edit-btn" data-target="#edit-modal" data-toggle="modal" subjectid="{{ $subject->id }}">Edit</button>
							<a class="btn btn-danger subject-delete-btn" data-target="#delete-modal" data-toggle="modal" subjectid="{{ $subject->id }}">Delete</a>
						</span>
					</td>
				</tr>
			@endforeach
		</table>
	</div>
</div>
@endsection

@section('jslinks')
<script type="text/javascript">
	/*
	 * jQuery JYOH!
	 *
	 */
	$(document).ready(function() {
		/*
		 * Standard AJAX EXAMPLE template(below, commented)
		 *
		 */

			// $.ajax({
				// url : deleteUrl,
				// type : 'POST',
				// data : {'_method' : 'DELETE'},
				// success : function(data) {
					// row.slideUp();
				// }
			// });

		var row;
		// delete action, show delete modal
		$(".subject-delete-btn").click(function(e){
			$(this).addClass('disabled');
			$('#subjectDelete').removeClass('disabled');
			var $subjectId = $(this).attr('subjectid');
			var deleteUrl = "{!! URL::to('subjects/" + $subjectId + "') !!}";
			$("#subjectDelete").attr('href', deleteUrl);
			row = $(this).parent().parent().parent();
		});
		// delete modal action
		$("#subjectDelete").click(function(e){
			e.preventDefault(); // stop anchor tag from loading like link.
			var deleteUrl = $(this).attr('href');
			$(this).addClass('disabled');
			$("#delete-modal").modal('hide');
			$.post(deleteUrl, {'_method' : 'DELETE'}, function(response){
				row.fadeOut('fast', function() {
					row.remove();
				});
				var $message = $("<div></div>").attr('class', 'alert alert-danger alert-dismissable alert-sm');
				$("<a>&times;</a>").attr('data-dismiss', 'alert').attr('class', 'close').attr('href', '#').appendTo($message).after('Successfully deleted.');
				$("#delete-modal").after($message);
				setTimeout(function(){
					$message.slideUp('slow', function(){
						$message.remove();
					});
				}, 5000);
			});
		});
		// enable delete button on modal hide
		$("#delete-modal").on('hide.bs.modal',function(){
			$(".subject-delete-btn").removeClass('disabled'); // enable all delete buttons
		});
		
		var $slug = $("input#slug");
		var $title = $("input#title");
		var $acronym = $("input#acronym");
		var $cost = $("input#cost");
		var $timeperiod = $("input#timeperiod");
		var $description = $("textarea#description");
		
		// edit button action
		$(".subject-edit-btn").click(function(e){
			var id = $(this).attr('subjectid');
			var url = "{!! URL::to('subjects/subject-details/" + id + "') !!}";
			$.post(url, function(response) {
				// console.log($slug.val()); // not needed
				$slug.prop('value', response.slug);
				$title.prop('value', response.title);
				$acronym.prop('value', response.acronym);
				$cost.prop('value', response.cost);
				$timeperiod.prop('value', response.timeperiod);
				$description.prop('value', response.description);
				// console.log($slug.val()); // no need
				
				$('input#slug').trigger('change');
				$('input#slug').change();
			});
		});
		// reset on create model show
		$("#show-create").click(function(e){			
			$slug.val('');
			$title.val('');
			$acronym.val('');
			$cost.val('');
			$timeperiod.val('');
			$description.val('');
		});
		// EDIT : send update via ajax
		$("#subjectEdit").click(function(e){
			$('input#slug').trigger('change');
			$('input#slug').change();
			// console.log('val() : ' + $("input#slug").val());
			// console.log('value : ' + document.getElementById("slug").value);
			var $data = {
				_method : 'PUT',
				slug : $slug.val(),
				title : $title.val(),
				acronym : $acronym.val(),
				cost : $cost.val(),
				timeperiod : $timeperiod.val(),
				description : $description.val()
			};
			console.log($data);
		});
		$('input#slug').keyup(function(e) {
			// console.log($(this).val());
			// $(this).trigger('change');
			// $(this).change();
		});
	});
	
	function updateField(id) {
		var $data = {
			_method : 'PUT',
			slug : $("input#slug").val(),
			title : $("input#title").val(),
			acronym : $("input#acronym").val(),
			cost : $("input#cost").val(),
			timeperiod : $("input#timeperiod").val(),
			description : $("input#description").val()
		};
		console.log($data);
	}
</script>
@endsection