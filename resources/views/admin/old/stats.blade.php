@extends('admin.layouts.master')

@section('admin')
<div class="row-space-bottom">
	<div class="well">
		<h3 class="h2"><span class="glyphicon glyphicon-stats"></span> LinkOn Statistics</h3>
	</div>
	<div class="row">
		<div class="col-lg-4">
			<div class="well">
				<h3 class="h3"><span class="glyphicon glyphicon-user"></span> Online users : 99</h3> 
			</div>
		</div>
		<div class="col-lg-4">
			<div class="well">
				<h3 class="h3">Active Members : 76</h3> 
			</div>
		</div>
		<div class="col-lg-4">
			<div class="well">
				<h3 class="h3"><span class="glyphicon glyphicon-time"></span> Site visits : 1035</h3> 
			</div>
		</div>
	</div>
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="h3">Daily peak records</h3>
		</div>
		<div class="panel-body">
			<div>
				<h2 class="h2">Online users</h2>
				<canvas id="myChart1" width="300" height="300"></canvas>
				<canvas id="myChart2" width="300" height="300"></canvas>
				<canvas id="myChart3" width="300" height="300"></canvas>
			</div>
			<div>
				<h2 class="h2">Active members</h2>
				<canvas id="myChart4" width="300" height="300"></canvas>
				<canvas id="myChart5" width="300" height="300"></canvas>
				<canvas id="myChart6" width="300" height="300"></canvas>
			</div>
			<div>
				<h2 class="h2">Site visits</h2>
				<canvas id="myChart7" width="900" height="400"></canvas>
			</div>
		</div>
	</div>
</div>
@stop

@section('jslinks')
<script type="text/javascript" src="{{ asset('/js/Chart.js') }}"></script>
<script type="text/javascript">
	var ctx1 = $("#myChart1").get(0).getContext("2d");
	var ctx2 = $("#myChart2").get(0).getContext("2d");
	var ctx3 = $("#myChart3").get(0).getContext("2d");
	var ctx4 = $("#myChart4").get(0).getContext("2d");
	var ctx5 = $("#myChart5").get(0).getContext("2d");
	var ctx6 = $("#myChart6").get(0).getContext("2d");
	var ctx7 = $("#myChart7").get(0).getContext("2d");
	// var myNewChart = new Chart(ctx);
	
	var data4 = [
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
	
	var data3 = {
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
	
	var data2 = [
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
	
	var data = {
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
	
	var options = {

		///Boolean - Whether grid lines are shown across the chart
		scaleShowGridLines : true,

		//String - Colour of the grid lines
		scaleGridLineColor : "rgba(0,0,0,.05)",

		//Number - Width of the grid lines
		scaleGridLineWidth : 1,

		//Boolean - Whether to show horizontal lines (except X axis)
		scaleShowHorizontalLines: true,

		//Boolean - Whether to show vertical lines (except Y axis)
		scaleShowVerticalLines: true,

		//Boolean - Whether the line is curved between points
		bezierCurve : true,

		//Number - Tension of the bezier curve between points
		bezierCurveTension : 0.4,

		//Boolean - Whether to show a dot for each point
		pointDot : true,

		//Number - Radius of each point dot in pixels
		pointDotRadius : 4,

		//Number - Pixel width of point dot stroke
		pointDotStrokeWidth : 1,

		//Number - amount extra to add to the radius to cater for hit detection outside the drawn point
		pointHitDetectionRadius : 20,

		//Boolean - Whether to show a stroke for datasets
		datasetStroke : true,

		//Number - Pixel width of dataset stroke
		datasetStrokeWidth : 2,

		//Boolean - Whether to fill the dataset with a colour
		datasetFill : true,

		//String - A legend template
		legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].strokeColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"

	};
	
	var myLineChart = new Chart(ctx1).PolarArea(data4, options);
	var myLineChart = new Chart(ctx2).Pie(data2, options);
	var myLineChart = new Chart(ctx3).Doughnut(data2, options);
	var myLineChart = new Chart(ctx4).Line(data, options);
	var myLineChart = new Chart(ctx5).Bar(data, options);
	var myLineChart = new Chart(ctx6).Radar(data3, options);
	var myLineChart = new Chart(ctx7).Bar(data, options);
	
</script
@endsection