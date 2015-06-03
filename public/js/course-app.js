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
	function fetchSubjects() {
		return $.ajax({
			url : '/subjects/all-subjects',
			type : 'POST',
			// dataType : 'JSON',
			success : function(data) {
				json = data;
				// loop through the json and populate the <select> with <option>
				$(json).each(function(index){
					$('<option>' + this.title + '</option>').prop('value', this.id).appendTo($select);
				});
			}
		});
	}
	
	function fetchCourseSubjects() {
		return $.ajax({
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
			if(json == undefined) {
				$request = fetchSubjects();
				$request.success(function() {
					$('#subjectAdd').removeClass('disabled').click(addAction);
				});
			} else {
				$('#subjectAdd').removeClass('disabled').click(addAction);
			}
		});
	});
	
	$("#courseEdit").click(function(e){
		e.preventDefault();
		var url = '/courses/' + $("#courseId").prop('value') + '/edit-ex';
		$.get(url , function(response) {
			$("#formContainer").html(response);
			if(json == undefined) {
				console.log('case 1');
				$request = fetchSubjects();
				$request.success(function() {
					if($subjectsLi == undefined) {
						console.log('case 1:1');
						$srequest = fetchCourseSubjects();
						$srequest.success(function() {	
							$('#subjectAdd').removeClass('disabled').click(addAction);
						});
					} else {
						// this case can never happen
						console.log('case 1:2');
						$('#subjectAdd').removeClass('disabled').click(addAction);
					}
				});
			} else {
				console.log('case 2');
				// redundant
				if($subjectsLi == undefined) {
					console.log('case 2:1');
					$srequest = fetchCourseSubjects();
					$srequest.success(function() {	
						$('#subjectAdd').removeClass('disabled').click(addAction);
					});
				} else {
					console.log('case 2:2');
					$("#subjectList li:last").before($subjectsLi); // append <li> to <ul> before the last element(ie. the ADD button DUH!)
					$('#subjectAdd').removeClass('disabled').click(addAction);
				}
			}
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
	$("#navtabs li a").click(function(e){
		// e.preventDefault();
		var li=$(this).parent();
		$("#navtabs li").removeClass('active');
		li.addClass('active');
	});
		
});
