$(document).ready(function(){
	
	var removeAction = function(){
		var row = $(this).parent().parent();
		row.slideUp('fast', function(){
			row.remove();
		});
	}
	// make a varialbe for this button
	var addBtn = $("#subjectAdd");
	// the subjects response will be stored in this array
	var json;
	$.ajax({
		url : '/subjects/all-subjects',
		type : 'POST',
		// dataType : 'JSON',
		success : function(data) {
			json = data;
			$(addBtn).removeClass('disabled');
			fetchSubjects();
		}
	});
	// console.log(window.location.pathname);
	var id = $("#courseId").prop('value');
	var url = "/courses/" + id + "/subjects";
	console.log(url);
	function fetchSubjects() {
		$.ajax({
			url : url,
			type : 'POST',
			success : function(data) {
				$(data).each(function(index){
					var li = $('<li></li>').attr('class', 'list-group-item');
					var div = $('<div></div>').attr('class', 'input-group input-group-sm').appendTo(li); // create input group
					var select = $('<select></select>').attr('class', 'form-control').attr('name', 'subjects[]').appendTo(div); // add select to input group div
					var removebtn = $('<a></a>').attr('class', 'subjectRemove input-group-addon btn btn-danger').appendTo(div); // add removebtn to input group div
					// register event handler for remove button
					removebtn.click(removeAction);
					$('<span></span>').attr('class', 'glyphicon glyphicon-remove').appendTo(removebtn); // add cross icon for removebutton
					// loop through the json and populate the <select> with <option>
					var title = this.title;
					$(json).each(function(index) {
						var option = $('<option>' + this.title + '</option>').prop('value', this.id).appendTo(select);
						if(title == this.title) {
							option.attr('selected', 'selected');
						}
					});
					$("#subjectList li:last").before(li); // append <li> to <ul> before the last element(ie. the ADD button DUH!)
				});
			}
		});
	}
	$(addBtn).click(function(e){
		e.preventDefault();
		var li = $('<li></li>').attr('class', 'list-group-item');
		var div = $('<div></div>').attr('class', 'input-group input-group-sm').appendTo(li); // create input group
		var select = $('<select></select>').attr('class', 'form-control').attr('name', 'subjects[]').appendTo(div); // add select to input group div
		var removebtn = $('<a></a>').attr('class', 'subjectRemove input-group-addon btn btn-danger').appendTo(div); // add removebtn to input group div
		// register event handler for remove button
		removebtn.click(removeAction);
		$('<span></span>').attr('class', 'glyphicon glyphicon-remove').appendTo(removebtn); // add cross icon for removebutton
		// loop through the json and populate the <select> with <option>
		$(json).each(function(index){
			$('<option>' + this.title + '</option>').prop('value', this.id).appendTo(select);
		});
		$("#subjectList li:last").before(li.hide()); // append <li> to <ul> before the last element(ie. the ADD button DUH!)
		li.slideDown('fast');
	});
	// register existing subject remove buttons with event handlers
	$(".subjectRemove").click(removeAction);
	$("#courseDelete").click(function(){
		$(this).addClass('disabled');
	});
	$("#title-field").blur(function(){
		var target = $(this).val();
		$.post('/generate-slug', {'target' : target}, function(response){
			$("#slug-field").val(response);
		});
	});
});
