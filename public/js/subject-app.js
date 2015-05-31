$(document).ready(function(){
	$alertDiv = $("<div></div>").addClass('alert alert-dismissable').hide();
	$("<a>&times;</a>").attr('href', '#').attr('data-dismiss', 'alert').addClass('close').appendTo($alertDiv);
	// $subjectTr = $("<tr></tr>");
	// $subjectTr.append($("<td><td>").text('hello'));
	// $subjectTr.append($("<td><td>").append($("<a></a>").text('hello')));
	// $td = $("<td><td>").appendTo($subjectTr);
	// $("<input></input").attr('name', 'subjectId').attr('type', 'hidden').appendTo($td);
	// $btnGrp = $("<span></span>").addClass('btn-group btn-group-xs').appendTo($td);
	// $edit = $("<a></a>").attr('href', '#').attr('data-toggle', 'modal').attr('data-target', '#edit-modal').addClass('btn btn-primary subject-edit-btn').text('Edit').appendTo($btnGrp);
	// $del = $("<a></a>").attr('href', '#').attr('data-toggle', 'modal').attr('data-target', '#delete-modal').addClass('btn btn-danger subject-delete-btn').text('Delete').appendTo($btnGrp);
	// $("#subjects-table").append($td); // speed up
	var subjectId;
	$tr = undefined;
	$delAction = function(e){
		e.preventDefault();
		var id = $(this).parent().parent().find("input").prop('value');
		subjectId = id;
		$tr = $(this).parent().parent().parent();
	}
	$(".subject-edit-btn").click(function(e){
		e.preventDefault();
		var id = $(this).parent().parent().find("input").prop('value');
		subjectId = id;
		$.post('/subjects/subject-details/' + id, function(response){
			$("input#slug").val(response.slug);
			$("input#title").val(response.title);
			$("input#acronym").val(response.acronym);
			$("input#cost").val(response.cost);
			$("input#timeperiod").val(response.timeperiod);
			$("textarea#description").val(response.description);
		});
	});
	$(".subject-delete-btn").click($delAction);
	$("#subject-create-btn").click(function(e){
		e.preventDefault();
		$("input#slug").val('');
		$("input#title").val('');
		$("input#acronym").val('');
		$("input#cost").val('');
		$("input#timeperiod").val('');
		$("textarea#description").val('');
	});
	$("#subjectCreate").click(function(e){
		e.preventDefault();
		$(this).addClass('disabled');
		var slug = $("#slug").val();
		var titl = $("#title").val();
		var acro = $("#acronym").val();
		var cost = $("#cost").val();
		var time = $("#timeperiod").val();
		var desc = $("#description").val();
		
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
			$tr = $("#subjects-table tr:last").clone();
			// $tr = $subjectTr.clone(); // TODO : fix it
			$tr.find("td:nth-child(1)").text(response.slug);
			$tr.find("td:nth-child(2) a").attr('href', '/subjects/' + response.id).text(response.title);
			$tr.find("td:nth-child(3) input").attr('value', response.id);
			$tr.find("td:nth-child(3) .subject-delete-btn").click($delAction);
			$("#subjects-table").append($tr.hide());
			div.slideDown('slow');
			$tr.fadeIn('slow');
		});
		request.fail(function(response){
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
	$("#subjectEdit").click(function(e){
		e.preventDefault();
		var slug = $("input#slug").val();
		var titl = $("input#title").val();
		var acro = $("input#acronym").val();
		var cost = $("input#cost").val();
		var time = $("input#timeperiod").val();
		var desc = $("textarea#description").val();
		
		var data = {
			'_method' : 'PATCH',
			'slug' : slug,
			'title' : titl,
			'acronym' : acro,
			'cost' : cost,
			'time' : time,
			'description' : desc
		}
		$.post('/subjects/' + subjectId, data, function(response){
			var div = $alertDiv.clone().addClass('alert-info');
			div.append('Successfully edited.');
			div.slideDown('slow');
			$(".top-link").after(div);
		});
	});
	$("#subjectDelete").click(function(e){
		e.preventDefault();
		$.post('/subjects/' + subjectId, {'_method' : 'DELETE'}, function(response){
			var div = $alertDiv.clone().addClass('alert-info');
			div.append('Successfully deleted.');
			$(".top-link").after(div);
			$("#delete-modal").modal('hide');
			$tr.fadeOut('slow', function(){
				$(this).remove();
			});
			div.slideDown('slow');
		});
	});
	$("input#title").blur(function(){
		$.post('/generate-slug', {'target' : $(this).val()}, function(response){
			$("input#slug").val(response);
		});
	});
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