$(document).ready(function() {
	
	$li = $('<li></li>').attr('class', 'list-group-item roles-list');
	$div = $('<div></div>').attr('class', 'input-group input-group-sm').appendTo($li); // create input group
	$select = $('<select></select>').attr('class', 'form-control').attr('name', 'roles[]').appendTo($div); // add select to input group div
	$removebtn = $('<a></a>').attr('class', 'roleRemove input-group-addon btn btn-danger').appendTo($div); // add removebtn to input group div
	$('<span></span>').attr('class', 'glyphicon glyphicon-remove').appendTo($removebtn); // add cross icon for removebutton

	$.ajax({
		url : '/roles/all-roles',
		type : 'POST',
		dataType : 'JSON',
		success : function(data) {			
			// loop through the json and populate the <select> with <option>
			$(data).each(function(index) {
				$('<option></option>').text(this.title).prop('value', this.id).appendTo($select);
			});
		}
	});
	
	
	var roleRemoveAction = function(){
		var row = $(this).parent().parent();
		row.slideUp('fast', function(){
			row.remove();
		});
	}
	
	var roleAddAction = function(e) {
		e.preventDefault();
		var li = $li.clone();
		$(li).find('a').click(roleRemoveAction); // add remove action
		$("#rolesList li:last").before(li.hide()); // append <li> to <ul> before the last element(ie. the ADD button DUH!)
		li.slideDown('fast');
	}

	var delBtnAction = function(e) {
		e.preventDefault();
		$userId = $(this).parent().find('input[type="hidden"]').prop('value'); // save the user id
		$tr = $(this).parent().parent().parent().parent().parent(); // save the table row
	}
	
	var delModalAction = function(e) {
		e.preventDefault();
		$.post('/admin/users/' + $userId, {'_method' : 'DELETE'}, function(response) {
			// console.log('received response : ' + response);
			var div = $alertDiv.clone().addClass('alert-info');
			div.append('Successfully deleted.');
			$("#delete-modal").modal('hide');
			// IMMEDIATE CHANGE
			$tr.fadeOut('slow', function() {
				$(this).remove();
			});
			/* show success message */
			// $("#myTabContent").prepend(div.hide());
			// div.slideDown('slow');
			// div.delay(5000).fadeOut();
		}).fail(function(error) {
			// $("#delete-modal .modal-body").html(error.responseText).modal('show');
		});
	}
	
	
	/**
	 * EDIT BUTTON ACTION
	 */
	var editBtnAction = function(e) {
		e.preventDefault();
		$userId = $(this).parent().parent().find('input[type="hidden"]').prop('value'); // save the user id
		$tr = $(this).parent().parent().parent().parent().parent(); // save the table row
		$.post('/admin/users/' + $userId + '/user-details', function(response) {
			$("#rolesList .roles-list").remove(); // remove any previous fields
			$("#name-field").val(response.name);
			$("#email-field").val(response.email);
			$.each(response.roles, function(key, value) {
				// console.log(value.title);
				var li = $li.clone();
				var option = li.find('option[value="' + value.id + '"]');
				$(option).attr('selected', '');
				$("#rolesList li:last").before(li);
			});
			// $("#roles-field").val(response.roles);
		});
	}
	
	/**
	 * EDIT MODAL EDIT BUTTON
	 */
	var editModalAction = function(e) {
		e.preventDefault();
		var name = $("#name-field").val();
		var mail = $("#email-field").val();
		var pass = $("#password-field").val();
		var pasr = $("#rpassword-field").val();

		var data = {
			'_method' : 'PATCH',
			'name' : name,
			'email' : mail,
			'password' : pass,
			'password_confirmation' : pasr,
		}

		$.post('/admin/users/' + $userId, data, function(response) {
			// IMMEDIATE CHANGE
			$tr.find("td:first").text(response.email);
			$("#edit-modal").modal('hide');
			var div = $alertDiv.clone().addClass('alert-info');
			div.append('Successfully edited.');
			$("#myTabContent").prepend(div.hide());
			div.slideDown('slow');
			div.delay(5000).fadeOut();
		}).fail(function(response) {
			// $("#edit-modal .modal-body").html(error.responseText);
			console.log(response.responseText);
			if(response.status == 422) {
				$.each(response.responseJSON, function(key, value) {
					$("#" + key + "-info").text(value);
				});
			}
		});
	}
	
	/* Sample cloneable ALERT DIV */
	$alertDiv = $("<div></div>").addClass('alert alert-dismissable').hide();
	$("<a>&times;</a>").attr('href', '#').attr('data-dismiss', 'alert').addClass('close').appendTo($alertDiv);
	// $(window).bind('popstate', function() {
		// $.ajax({url : location.pathname, success : function(data) {
			// var page = location.pathname.substr(location.pathname.lastIndexOf('/') + 1);
			// var tab = '#' + page + 'Tab';
			// $('#myTab a[href="' + tab + '"]').tab('show');
		// }});
	// });

    /**
     * Go back action
     */
	window.addEventListener("popstate", function(e) {
		var page = location.pathname.substr(location.pathname.lastIndexOf('/') + 1);
		var divid = '#' + page + 'Tab';
		var activeTab = $('#myTab a[href="' + divid + '"]');
		if(activeTab.length) {
			activeTab.tab('show');
		} else {
			$('.nav-tabs a:first').tab('show');
		}
	});

    /**
     * Load tab contents via ajax
     */
	$(document).on('show.bs.tab', '#myTab a[data-toggle="tab"]', function(e) {
		var tab = e.target;

		// extract (substring) url from div id. eg. dashboard from #dashboardTab
		// var href = $(tab).attr('href');
		var href = $(this).attr('href');
		var divid = href.substr(1, href.indexOf('Tab')-1);
		var url = '/admin/' + divid;
		
		$request = $.get(url).success(function(data) {
            //console.log($(data).find("#" + divid + "Tab").html());
			$("#" + divid + "Tab").html($(data).find("#" + divid + "Tab").html());
			$('[data-toggle="popover"]').popover();
			$("[data-toggle='tooltip']").tooltip();
			// add 'user' page specific settings
			if(divid == 'users') {
				$("#users-table a").click(function() {
					$(this).tooltip('hide');
				});
			}
		});
		if(url != window.location) {
			window.history.pushState({path : url}, '', url);
		}
	});

    /**
     * Tab change handler
     */
	$(document).on('shown.bs.tab', '#myTab a[data-toggle="tab"]', function(e) {
		var target = $(this).attr('href');
		var divid = target.substr(1, target.indexOf('Tab')-1);
		var url = '/admin/' + divid;

		// draw charts for 'stats' page
		$request.success(function() {
			// console.log('request completed');
			if(divid == 'stats') {
				drawCharts();
			} else if(divid == 'users') {
				$("#userDelete").click(delModalAction);
				$('a[data-target="#delete-modal"]').click(delBtnAction);
				$('a[data-target="#edit-modal"]').click(editBtnAction);
				$("#userEdit").click(editModalAction);
				
				$('#roleAdd').removeClass('disabled').click(roleAddAction); // for static pages(create)
				// fetchCourseSubjects(); // for static pages(edit)
			}
		}).fail(function(response) {
            //$("#" + divid + "Tab").html(response.responseText); // debug
        });
	});
	
	// add active marker according to page url
	var currentTab = location.pathname.substr(location.pathname.lastIndexOf('/') + 1);
	$('#myTab a[href="#' + currentTab + 'Tab"]').tab('show');
	// if(currentTab == 'stats') {
		// drawCharts();
	// }
	
	// console.log(location.pathname.substr(location.pathname.lastIndexOf('/') + 1)); // important, get tab name by url
	
	
	function drawCharts() {
		var data = [
			{
				value: 300,
				color:"#F7464A",
				highlight: "#FF5A5E",
				label: "Red"
			},
			{
				value: 50,
				color: "#46BFBD",
				highlight: "#5AD3D1",
				label: "Green"
			},
			{
				value: 100,
				color: "#FDB45C",
				highlight: "#FFC870",
				label: "Yellow"
			}
		];
		var data1 = {
			labels: ["January", "February", "March", "April", "May", "June", "July"],
			datasets: [
				{
					label: "My First dataset",
					fillColor: "rgba(220,220,220,0.2)",
					strokeColor: "rgba(220,220,220,1)",
					pointColor: "rgba(220,220,220,1)",
					pointStrokeColor: "#fff",
					pointHighlightFill: "#fff",
					pointHighlightStroke: "rgba(220,220,220,1)",
					data: [65, 59, 80, 81, 56, 55, 40]
				},
				{
					label: "My Second dataset",
					fillColor: "rgba(151,187,205,0.2)",
					strokeColor: "rgba(151,187,205,1)",
					pointColor: "rgba(151,187,205,1)",
					pointStrokeColor: "#fff",
					pointHighlightFill: "#fff",
					pointHighlightStroke: "rgba(151,187,205,1)",
					data: [28, 48, 40, 19, 86, 27, 90]
				}
			]
		};
		var data2 = {
			labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
			datasets: [
				{
					label: "My First dataset",
					fillColor: "rgba(220,220,220,0.2)",
					strokeColor: "rgba(220,220,220,1)",
					pointColor: "rgba(220,220,220,1)",
					pointStrokeColor: "#fff",
					pointHighlightFill: "#fff",
					pointHighlightStroke: "rgba(220,220,220,1)",
					data: [65, 59, 90, 81, 56, 55, 40]
				},
				{
					label: "My Second dataset",
					fillColor: "rgba(151,187,205,0.2)",
					strokeColor: "rgba(151,187,205,1)",
					pointColor: "rgba(151,187,205,1)",
					pointStrokeColor: "#fff",
					pointHighlightFill: "#fff",
					pointHighlightStroke: "rgba(151,187,205,1)",
					data: [28, 48, 40, 19, 96, 27, 100]
				}
			]
		};
		var data3 = [
			{
				value: 300,
				color:"#F7464A",
				highlight: "#FF5A5E",
				label: "Red"
			},
			{
				value: 50,
				color: "#46BFBD",
				highlight: "#5AD3D1",
				label: "Green"
			},
			{
				value: 100,
				color: "#FDB45C",
				highlight: "#FFC870",
				label: "Yellow"
			},
			{
				value: 40,
				color: "#949FB1",
				highlight: "#A8B3C5",
				label: "Grey"
			},
			{
				value: 120,
				color: "#4D5360",
				highlight: "#616774",
				label: "Dark Grey"
			}
		];
		
		$ctx = {};
		
		$(".stats-chart").each(function(index) {
			// console.log('chart index : ' + index);
			$ctx[index] = this.getContext("2d");
		});
		// console.log('no.of charts : ' + $(ctx).size());
		// console.log(ctx);
		
		// setTimeout(function() {
			var options = { animationEasing : "easeOutBounce", animateRotate : true };
			
			// For a pie chart
			var myPieChart = new Chart($ctx[0]).Pie(data, options);

			// And for a doughnut chart
			var myDoughnutChart = new Chart($ctx[1]).Doughnut(data, options);
			
			var myPolarChart = new Chart($ctx[2]).PolarArea(data3);
			
			var myRadarChart = new Chart($ctx[3]).Radar(data2);
			
			var myLineChart = new Chart($ctx[4]).Line(data1);
			
			var myBarChart = new Chart($ctx[5]).Bar(data1);
		// }, 500);
		// for(var i=0;i<2;i++) {
			// console.log(ctx[i]);
		// }
	}
	
});