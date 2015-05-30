$(document).ready(function(){
	var subjectId;
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
	$(".subject-delete-btn").click(function(e){
		e.preventDefault();
		var id = $(this).parent().parent().find("input").prop('value');
		subjectId = id;
	});
	$("#subject-create-btn").click(function(){		
		$("input#slug").val('');
		$("input#title").val('');
		$("input#acronym").val('');
		$("input#cost").val('');
		$("input#timeperiod").val('');
		$("textarea#description").val('');
	});
	$("#subjectCreate").click(function(){
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
			'time' : time,
			'description' : desc
		}
		var request = $.post('/subjects', data, function(response){
			var div = $("<div></div>").addClass('alert alert-success alert-dismissable');
			$("<a>&times;</a>").attr('href','#').attr('data-dismiss','alert').addClass('close').appendTo(div);
			div.append('Successfully created.');
			$(".top-link").after(div);
			console.log(response);
		});
		request.fail(function(response){
			// console.log(response.responseText);
			console.log('ajax request failed');
		});
	});
	$("#subjectEdit").click(function(){
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
			var div = $("<div></div>").addClass('alert alert-info alert-dismissable');
			$("<a>&times;</a>").attr('href','#').attr('data-dismiss','alert').addClass('close').appendTo(div);
			div.append('Successfully edited.');
			$(".top-link").after(div);
		});
	});
	$("#subjectDelete").click(function(){
		$.post('/subjects/' + subjectId, {'_method' : 'DELETE'}, function(response){
			var div = $("<div></div>").addClass('alert alert-info alert-dismissable');
			$("<a>&times;</a>").attr('href','#').attr('data-dismiss','alert').addClass('close').appendTo(div);
			div.append('Successfully deleted.');
			$(".top-link").after(div);
		});
	});
	$("input#title").blur(function(){
		$.post('/generate-slug', {'target' : $(this).val()}, function(response){
			$("input#slug").val(response);
		});
	});
});