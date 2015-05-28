$(document).ready(function(){
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
	var deleteUrl;
	
	// delete action, show delete modal
	$(".subject-delete-btn").click(function(e){
		$(this).addClass('disabled');
		$('#subjectDelete').removeClass('disabled');
		var $subjectId = $(this).attr('subjectid');
		deleteUrl = "subjects/" + $subjectId;
		row = $(this).parent().parent().parent();
	});
	
	// delete modal action
	$("#subjectDelete").click(function(e){
		e.preventDefault(); // stop anchor tag from loading like link.
		$(this).addClass('disabled');
		$("#delete-modal").modal('hide');
		$.post(deleteUrl, {'_method' : 'DELETE'}, function(response){
			row.fadeOut('slow', function() {
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
	
	// edit button action
	$(".subject-edit-btn").click(function(e){
		var id = $(this).attr('subjectid');
		var url = "subjects/subject-details/" + id;
		$.post(url, function(response) {
			$("input#slug").val(response.slug);
			$("input#title").val(response.title);
			$("input#acronym").val(response.acronym);
			$("input#cost").val(response.cost);
			$("input#timeperiod").val(response.timeperiod);
			$("textarea#description").val(response.description);
		});
	});
	
	// reset on create model show
	$("#show-create").click(function(e){			
		$("input#slug").val('');
		$("input#title").val('');
		$("input#acronym").val('');
		$("input#cost").val('');
		$("input#timeperiod").val('');
		$("textarea#description").val('');
	});
	
	$("#mass-error").mouseover(function(){
		setTimeout(function(){
			$("#mass-error").slideUp('slow', function(){
				$(this).remove();
			});
		}, 3000);
	});
});
