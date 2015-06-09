$(document).ready(function() {
	
	// $(window).bind('popstate', function() {
		// $.ajax({url : location.pathname, success : function(data) {
			// var page = location.pathname.substr(location.pathname.lastIndexOf('/') + 1);
			// var tab = '#' + page + 'Tab';
			// $('#myTab a[href="' + tab + '"]').tab('show');
		// }});
	// });
	
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
	
	// load tab contents via ajax
	$(document).on('show.bs.tab', '#myTab a[data-toggle="tab"]', function(e) {
		var tab = e.target;
		
		// extract (substring) url from div id. eg. dashboard from #dashboardTab
		// var href = $(tab).attr('href');
		var href = $(this).attr('href');
		var divid = href.substr(1, href.indexOf('Tab')-1);
		var url = '/admin/' + divid;
		
		$request = $.get(url).success(function(data) {
			$("#" + divid + "Tab").html(data);
			$('[data-toggle="popover"]').popover();
			// add 'user' page specific settings
			if(divid == 'users') {
				$("[data-toggle='tooltip']").tooltip();
				$("#users-table a").click(function() {
					$(this).tooltip('hide');
				});
			}
		});
		if(url != window.location) {
			window.history.pushState({path : url}, '', url);
		}
	});
	
	// tab change handler, (currently no use)
	$(document).on('shown.bs.tab', '#myTab a[data-toggle="tab"]', function(e) {
		var target = $(this).attr('href');
		var divid = target.substr(1, target.indexOf('Tab')-1);
		var url = '/admin/' + divid;

		// draw charts for 'stats' page
		$request.success(function() {
			// console.log('request completed');
			if(divid == 'stats') {
				drawCharts();
			}
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