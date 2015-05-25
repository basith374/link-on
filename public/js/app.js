$(document).ready(function(){
	// CSRF configuration
	$.ajaxSetup({
		headers : {'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')}
	});
	var removeAction = function(){
		var row = $(this).parent().parent();
		row.slideUp('fast', function(){
			row.remove();
		});
	}
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');;
	// make a varialbe for this button
	var subjectAddBtn = $("#subjectAdd");
	// the subjects response will be stored in this array
	var json;
	$.ajax({
		url : '/subjects/all-subjects',
		type : 'POST',
		dataType : 'JSON',
		success : function(data) {
			json = data;
			$(subjectAddBtn).removeClass('disabled');
		}
	});
	$(subjectAddBtn).click(function(e){
		e.preventDefault();
		var li = $('<li class="list-group-item"></li>');
		var div = $('<div></div>').attr('class', 'input-group input-group-sm').appendTo(li); // create input group
		var select = $('<select></select>').attr('class', 'form-control').appendTo(div); // add select to input group div
		var removebtn = $('<a></a>').attr('class', 'subjectRemove input-group-addon btn btn-danger').appendTo(div); // add removebtn to input group div
		// register event handler for remove button
		removebtn.click(removeAction);
		$('<span></span>').attr('class', 'glyphicon glyphicon-remove').appendTo(removebtn); // add cross icon for removebutton
		// loop through the json and populate the <select> with <option>
		$(json.data).each(function(index){
			select.append('<option>' + this.title + '</option>').attr('id', this.id);
		});
		$("#subjectList li:last").before(li.hide()); // append <li> to <ul> before the last element(ie. the ADD button DUH!)
		li.slideDown('fast');
	});
	// register existing subject remove buttons with event handlers
	$(".subjectRemove").click(removeAction);
	$("#courseDelete").click(function(){
		$(this).addClass('disabled');
	});
});
