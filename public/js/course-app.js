$(document).ready(function(){
	
	/*
	 * GLOBAL VARS
	 *
	 */
	
	// the subjects response will be stored in this array
	var json;
	// console.log(window.location.pathname);
	var id = $("#courseId").prop('value');
	var url = "/courses/" + id + "/subjects";
	
	var parent=$("#courseDetails");
	var cName = $("#courseDetails").attr("class");
	var Color = "";
	
	
	$subjectsLi = undefined;
	
	
	/*
	 * EVENT HANDLER(SAVED)
	 *
	 */
	
	var removeAction = function(){
		var row = $(this).parent().parent();
		row.slideUp('fast', function(){
			row.remove();
		});
	}
	
	var addAction = function(e){
		e.preventDefault();
		var li = $li.clone();
		$(li).find('a').click(removeAction); // add remove action
		$("#subjectList li:last").before(li.hide()); // append <li> to <ul> before the last element(ie. the ADD button DUH!)
		li.slideDown('fast');
	}
	
	var autoSlugAction = function() {
		var target = $(this).val();
		$.post('/generate-slug', {'target' : target}, function(response){
			$("#slug-field").val(response);
		});
	}
	
	/*
	 * Addable <li>
	 *
	 */
	
	$li = $('<li></li>').attr('class', 'list-group-item');
	$div = $('<div></div>').attr('class', 'input-group input-group-sm').appendTo($li); // create input group
	$select = $('<select></select>').attr('class', 'form-control').attr('name', 'subjects[]').appendTo($div); // add select to input group div
	$removebtn = $('<a></a>').attr('class', 'subjectRemove input-group-addon btn btn-danger').appendTo($div); // add removebtn to input group div
	$('<span></span>').attr('class', 'glyphicon glyphicon-remove').appendTo($removebtn); // add cross icon for removebutton
	
	
	/*
	 * FUNCTIONS
	 *
	 */
	$.ajax({
		url : '/subjects/all-subjects',
		type : 'POST',
		// dataType : 'JSON',
		success : function(data) {
			json = data;
			// loop through the json and populate the <select> with <option>
			$(json).each(function(index) {
				$('<option>' + this.title + '</option>').prop('value', this.id).appendTo($select);
			});
			$('#subjectAdd').removeClass('disabled').click(addAction); // for static pages(create)
			fetchCourseSubjects(); // for static pages(edit)
		}
	});
	
	function fetchCourseSubjects() {
		$.ajax({
			url : url,
			type : 'POST',
			success : function(data) {
				$(data).each(function(index){					
					$subjectsLi = $li.clone();
					$subjectsLi.find('a').click(removeAction); // add remove action
					var select = $subjectsLi.find('select');
					// loop through the json and populate the <select> with <option>
					var title = this.title;
					$(json).each(function(index) {
						var option = $('<option>' + this.title + '</option>').prop('value', this.id).appendTo(select);
						if(title == this.title) {
							option.attr('selected', 'selected');
						}
					});
					$("#subjectList li:last").before($subjectsLi); // append <li> to <ul> before the last element(ie. the ADD button DUH!)
				});
			}
		});
	}
	
	/*
	 * EVENT LISTENERS(DIRECT)
	 *
	 */
	
	// register existing subject remove buttons with event handlers
	$(".subjectRemove").click(removeAction);
	$("#courseDelete").click(function(){
		$(this).addClass('disabled');
	});
	
	
	/*
	 * Tab buttons
	 *
	 */
	
	// COURSE CREATE AND COURSE EDIT
	
	$("#courseCreate").click(function(){
		$.get('/courses/create-ex', function(response) {
			$("#formContainer").html(response);
			$('#subjectAdd').removeClass('disabled').click(addAction);
		});
	});
	
	$("#courseEdit").click(function(e){
		e.preventDefault();
		var url = '/courses/' + $("#courseId").prop('value') + '/edit-ex';
		$.get(url , function(response) {
			$("#formContainer").html(response);
			fetchCourseSubjects();
			$('#subjectAdd').removeClass('disabled').click(addAction);
		});
	});
	
	$("#courseDetails").click(function(e){
		e.preventDefault();
		var url = '/courses/' + $("#courseId").prop('value') + '/details';
		$.get(url , function(response) {
			$("#formContainer").html(response);
		});
	});
	
	// add active class to clicked tab button
	
	setTab();
	
	$(".ad-panel-btns > a").click(function(e){
		if(!($(this).attr("tab") == "false")){
		e.preventDefault();
		parent=$(this);
		cName = $(this).attr("class");
		
		setTab();
		}
	});
		
	function setTab(){
		resetColor();
		$(".ad-panel-btns a").removeClass('active-cust');
		parent.addClass('active-cust');
		findColor();
	}	
	function findColor(){
		if(cName.indexOf('cl-cust-blue') > -1){
			Color = "#3498db";
		}else if(cName.indexOf('cl-cust-green') > -1){
			Color = "#2ecc71";
		}else if(cName.indexOf('cl-cust-red') > -1){
			Color = "#ed7b6f";
		}else if(cName.indexOf('cl-cust-yellow') > -1){
			Color = "#ebba5d";
		}else{
			Color = "#2ecc71";
		} 
		$(".active-cust").css({"background" : Color});	
		$(".tab-line-cust").css({"background" : Color});	
	}	
	
	
	function resetColor(){
			Color = "#7f8c8d";
		$(".active-cust").css({"background" : Color});	
	}	
});
