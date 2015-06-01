$(document).ready(function() {

	/**
	 * PREDEFINED CLONEABLE ALERT DIV
	 *
	 */
	$alertDiv = $("<div></div>").addClass('alert alert-dismissable').hide();
	$("<a>&times;</a>").attr('href', '#').attr('data-dismiss', 'alert').addClass('close').appendTo($alertDiv);
	$subjectTr = $("<tr></tr>");
	$subjectTr.append($("<td></td>"));
	$subjectTr.append($("<td></td>").append($("<a></a>")));
	$td = $("<td></td>");
	$("<input></input").attr('name', 'subjectId').attr('type', 'hidden').appendTo($td);
	$btnGrp = $("<span></span>").addClass('btn-group btn-group-xs').appendTo($td);
	$edit = $("<a></a>").attr('href', '#').attr('data-toggle', 'modal').attr('data-target', '#edit-modal').addClass('btn btn-primary subject-edit-btn').text('Edit').appendTo($btnGrp);
	$del = $("<a></a>").attr('href', '#').attr('data-toggle', 'modal').attr('data-target', '#delete-modal').addClass('btn btn-danger subject-delete-btn').text('Delete').appendTo($btnGrp);
	$subjectTr.append($td);
	// $("#subjects-table").append($td); // speed up
	
	/**
	 * JUST A METHOD FOR KEEPING THINGS
	 *
	 */
	var subjectId;
	$tr = undefined;
	
	/**
	 * PREDEFINED ACTIONS
	 * DELETE BUTTON ACTION
	 */
	$delAction = function(e) {
		e.preventDefault();
		var id = $(this).parent().parent().find("input").prop('value');
		subjectId = id;
		$tr = $(this).parent().parent().parent();
	}
	/**
	 * EDIT BUTTON ACTION
	 */
	$editAction = function(e) {
		e.preventDefault();
		var id = $(this).parent().parent().find("input").prop('value');
		subjectId = id;
		$tr = $(this).parent().parent().parent();
		$.post('/subjects/subject-details/' + id, function(response) {
			$("input#slug").val(response.slug);
			$("input#title").val(response.title);
			$("input#acronym").val(response.acronym);
			$("input#cost").val(response.cost);
			$("input#timeperiod").val(response.timeperiod);
			$("textarea#description").val(response.description);
		});
	}
	
	/**
	 * EDIT BUTTONS, DELETE BUTTONS AND CREATE BUTTON
	 *
	 */
	$(".subject-edit-btn").click($editAction);
	$(".subject-delete-btn").click($delAction);
	$("#subject-create-btn").click(function(e) {
		e.preventDefault();
		$("input#slug").val('');
		$("input#title").val('');
		$("input#acronym").val('');
		$("input#cost").val('');
		$("input#timeperiod").val('');
		$("textarea#description").val('');
	});
	
	/**
	 * CREATE MODAL CREATE BUTTON
	 *
	 */
	$("#subjectCreate").click(function(e) {
		e.preventDefault();
		$(this).addClass('disabled');
		var slug = $("#create-subject-form #slug").val();
		var titl = $("#create-subject-form #title").val();
		var acro = $("#create-subject-form #acronym").val();
		var cost = $("#create-subject-form #cost").val();
		var time = $("#create-subject-form #timeperiod").val();
		var desc = $("#create-subject-form #description").val();
		
		var data = {
			'slug' : slug,
			'title' : titl,
			'acronym' : acro,
			'cost' : cost,
			'timeperiod' : time,
			'description' : desc
		}
		var request = $.post('/subjects', data, function(response) {
			var div = $alertDiv.clone().addClass('alert-success');
			div.append('Successfully created.');
			$(".top-link").after(div);
			$("#subjectCreate").removeClass('disabled');
			$("#create-modal").modal('hide');
			// IMMEDIATE CHANGE
			// $tr = $("#subjects-table tr:last").clone(); // PROBLEM if no row in the first place
			$tr = $subjectTr.clone(); // fix
			$tr.find("td:nth-child(1)").text(response.slug);
			$tr.find("td:nth-child(2) a").attr('href', '/subjects/' + response.id).text(response.title);
			$tr.find("td:nth-child(3) input").attr('value', response.id);
			$tr.find("td:nth-child(3) .subject-edit-btn").click($editAction);
			$tr.find("td:nth-child(3) .subject-delete-btn").click($delAction);
			$("#subjects-table").append($tr.hide());
			div.slideDown('slow');
			$tr.fadeIn('slow');
			div.delay(5000).fadeOut();
		});
		request.fail(function(response) {
			if(response.status == 422) {
				$errors = $.parseJSON(response.responseText);
				$(".form-group .text").each(function(index) {
					$(this).text('');
				});
				$.each($errors, function(key, value) {
					$("#" + key + "-info").text(value[0]);
				});
				// $("#create-modal").modal('hide');
				$("#subjectCreate").removeClass('disabled');
			}
		});
	});
	
	/**
	 * EDIT MODAL EDIT BUTTON
	 *
	 */
	$("#subjectEdit").click(function(e) {
		e.preventDefault();
		var slug = $("#edit-subject-form #slug").val();
		var titl = $("#edit-subject-form #title").val();
		var acro = $("#edit-subject-form #acronym").val();
		var cost = $("#edit-subject-form #cost").val();
		var time = $("#edit-subject-form #timeperiod").val();
		var desc = $("#edit-subject-form #description").val();

		var data = {
			'_method' : 'PATCH',
			'slug' : slug,
			'title' : titl,
			'acronym' : acro,
			'cost' : cost,
			'timeperiod' : time,
			'description' : desc
		}

		$.post('/subjects/' + subjectId, data, function(response) {
			// IMMEDIATE CHANGE
			$tr.find("td:nth-child(1)").text(response.slug);
			$tr.find("td:nth-child(2) a").text(response.title);
			$("#edit-modal").modal('hide');
			var div = $alertDiv.clone().addClass('alert-info');
			div.append('Successfully edited.');
			$(".top-link").after(div.hide());
			div.slideDown('slow');
			div.delay(5000).fadeOut();
		});
	});
	
	/**
	 * DELETE MODAL BUTTON
	 *
	 */
	$("#subjectDelete").click(function(e) {
		e.preventDefault();
		$.post('/subjects/' + subjectId, {'_method' : 'DELETE'}, function(response) {
			var div = $alertDiv.clone().addClass('alert-info');
			div.append('Successfully deleted.');
			$(".top-link").after(div.hide());
			$("#delete-modal").modal('hide');
			// IMMEDIATE CHANGE
			$tr.fadeOut('slow', function() {
				$(this).remove();
			});
			div.slideDown('slow');
			div.delay(5000).fadeOut();
		});
	});
	
	/**
	 * AUTO SLUG GENERATE
	 *
	 */
	$("input#title").blur(function(){
		$.post('/generate-slug', {'target' : $(this).val()}, function(response) {
			$("input#slug").val(response);
		});
	});
	
	/**
	 * ACTIVATE CREATE BUTTON
	 *
	 */
	$("#create-modal .form-control").keyup(function() {
		$allfilled = true; // lie
		$("#create-modal .form-control").each(function(index) {
			if($(this).val() == '') $allfilled = false;
		});
		if($allfilled) {
			$("#subjectCreate").removeClass('disabled');
		} else {
			$("#subjectCreate").addClass('disabled');
		}
	});
});