$(document).ready(function(){
	
	var removeAction = function(){
		var row = $(this).parent().parent();
		row.slideUp('fast', function(){
			row.remove();
			// loop through every select fields an update their index
			$("#subjectList li select").each(function(i){
				$(this).prop('name', 'subjects[' + i + ']');
				// console.log($(this).prop('name').match(/\[(.*?)\]/)[1]);
			});
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
			// console.log(data);
			$(addBtn).removeClass('disabled');
		}
	});
	$(addBtn).click(function(e){
		e.preventDefault();
		var lindex = $("#subjectList li").eq(-2).find("select").prop('name').match(/\[(.*?)\]/)[1]; // last index
		var li = $('<li></li>').attr('class', 'list-group-item');
		var div = $('<div></div>').attr('class', 'input-group input-group-sm').appendTo(li); // create input group
		var select = $('<select></select>').attr('class', 'form-control').attr('name', 'subject[' + ++lindex + ']').appendTo(div); // add select to input group div
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
	$("#testBtn").click(function(){
		console.log($("#subjectList li").eq(-2).find("select").prop('name').match(/\[(.*?)\]/)[1]);
	});
});
