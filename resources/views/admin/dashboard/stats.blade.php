<div class="row-space-bottom">
	<div class="well">
		<h3 class="h2"><span class="glyphicon glyphicon-stats"></span> LinkOn Statistics</h3>
	</div>
	<div class="row">
		<div class="col-md-4 col-lg-4">
			<div class="well">
				<h3 class="h3"><span class="glyphicon glyphicon-user"></span> Online users : {{ $online }}</h3> 
			</div>
		</div>
		<div class="col-md-4 col-lg-4">
			<div class="well">
				<h3 class="h3">Active Members : {{ $active }}</h3> 
			</div>
		</div>
		<div class="col-md-4 col-lg-4">
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
					<div class="col-md-4 col-lg-4">
						<canvas class="stats-chart" style="width:100%;height:300px;"></canvas>
					</div>
					<div class="col-md-4 col-lg-4">
						<canvas class="stats-chart" style="width:100%;height:300px;"></canvas>
					</div>
					<div class="col-md-4 col-lg-4">
						<canvas class="stats-chart" style="width:100%;height:300px;"></canvas>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2 class="h2">Active members</h2>
				</div>
				<div class="panel-body">
					<div class="col-md-4 col-lg-4">
						<canvas class="stats-chart" style="width:100%;height:300px;"></canvas>
					</div>
					<div class="col-md-8 col-lg-8">
						<canvas class="stats-chart" style="width:100%;height:300px;"></canvas>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2 class="h2">Site visits</h2>					
				</div>
				<div class="panel-body">
					<div class="col-md-12 col-lg-12">
						<canvas class="stats-chart" style="width:100%;height:300px;"></canvas>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
