<div class="row-space-bottom">
	<div class="well">
		<h3 class="h2"><span class="glyphicon glyphicon-stats"></span> LinkOn Statistics</h3>
	</div>
	<div class="row">
		<div class="col-lg-4">
			<div class="well">
				<h3 class="h3"><span class="glyphicon glyphicon-user"></span> Online users : {{ $online }}</h3> 
			</div>
		</div>
		<div class="col-lg-4">
			<div class="well">
				<h3 class="h3">Active Members : {{ $active }}</h3> 
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
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2 class="h2">Online users</h2>
				</div>
				<div class="panel-body">
					<canvas class="stats-chart" width="290" height="290"></canvas>
					<canvas class="stats-chart" width="290" height="290"></canvas>
					<canvas class="stats-chart" width="290" height="290"></canvas>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2 class="h2">Active members</h2>
				</div>
				<div class="panel-body">
					<canvas class="stats-chart" width="290" height="290"></canvas>
					<canvas class="stats-chart" width="580" height="290"></canvas>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2 class="h2">Site visits</h2>					
				</div>
				<div class="panel-body">
					<canvas class="stats-chart" width="870" height="300"></canvas>
				</div>
			</div>
		</div>
	</div>
</div>
