<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<title>LinkOn - @yield('title')</title>

	<link href="{{ asset('/css/app.css') }}" type="text/css" rel="stylesheet">
	<link href="{{ asset('/css/custom.css') }}" type="text/css" rel="stylesheet"/>
	<link href="{{ asset('/css/customNew.css') }}" type="text/css" rel="stylesheet"/>
	<link href="{{ asset('/css/responsive.css') }}" type="text/css" rel="stylesheet"/>
	@yield('csslinks')

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>

	{{-- Help Panel --}}

	<div class="ad-help-panel untouchable bcz-help-panel">
		<div style="">
			<div class="bcz-icon">BCZ</div> 
			<div class="bcz-help-panel-value">Hi - BCZ Help system</div>
			<span class="btn cl-cust-blue clr-color-blue pull-right cons-close" style="margin-left:10px;">X</span>
		</div>
		<div class="bcz-cons">
			<textarea  id="bcz-cons"></textarea>
		</div>
	</div>

	@yield('pre-header')
	
	<div id="head-section">
		<div class="main-nav">
			<div class="navbar-cust">
				<div class="container-fluid"style="height:100%;">
					<div class="container" style="height:100%;  ">
						<div class="col-md-12" style="height:100%; ">
						
							<div class="col-md-6 col-md-offset-3" id="searchBar">
								<div class="searchSet">
									<input type="text" class="searchBar" placeholder="Search Your Course Now"></input>
									<div class="searchBtn">
										<span class="searchIcon"></span>
									</div>
								</div>
							</div>
							
							<div class="col-md-6 col-md-offset-3 nav-buttons" style="height:100%; ">
								<ul class="nav-a-cust " >
									<li class="nav-active"><a  href="{{ asset('home') }}"><img src="img/logohalf.png"  style="width:50px; height:auto;"></a></li>
									<li><a href="">EXAMS</a></li>
									<li><a href="{{ route('courses.index') }}">COURSES</a></li>
									<li><a href="{{ route('blogs.index') }}">FUNZONE</a></li>
									@if(Auth::user())

										<li class="dropdown">
											<a data-toggle="dropdown" href="{{ url('/admin/dashboard') }}">Admin Console <span class="caret"></span></a>
											<ul class="dropdown-menu">
												<li><a href="{{ url('/admin/dashboard') }}">Admin Console</a></li>
												<li><a href="{{ url('/admin/profile/' . Auth::user()->id) }}">Profile</a></li>
												<li><a href="{{ url('/admin/logout') }}">Logout</a></li>
											</ul>
										</li>
									@endif
								</ul>
							</div>	
							
						</div>	
					</div>	
				</div>
			</div>
			@yield('adminTools')
		</div>
		
			
			
		<div class="fakeNav"></div>
		@yield('fakeAdminHead')
	</div>
	<div id="mid-section">
		@yield('content')
	</div>
	<div id="footer-push"></div>
	<footer class="only_footer footer-cust" id="foot-section">
		<div class="container">
			<div class="row">
				<div class="col-md-2 visible-md visible-lg">
					<ul class="footer_links">
						<li><a href="#">Services</a></li>
						<li><a href="#">Community</a></li>
						<li><a href="#">Contact</a></li>
						<li><a href="#">Sitemap</a></li>
					</ul>
				</div>
				<div class="col-md-2 visible-md visible-lg">
					<ul class="footer_links">
						<li><a href="#">Careers</a></li>
						<li><a href="#">Donate</a></li>
						<li><a href="#">Contribute</a></li>
						<li><a href="#">Partners</a></li>
					</ul>
				</div>
				<div class="col-md-4">
					<div class="logospace untouchable">
						<span>
							<div class=" pf-icon-cust" >LinkOn</div>
							&copy; 2015 LinkOn education
						</span>
					</div>
				</div>
				<div class="col-md-2 visible-md visible-lg">
					<ul class="footer_links">
						<li><a href="#">Sponsors</a></li>
						<li><a href="#">Terms Of Service</a></li>
						<li><a href="#">Legal notices</a></li>
						<li><a href="#">About</a></li>
					</ul>
				</div>
				<div class="col-md-2 visible-md visible-lg">
					<ul class="footer_links">
						<li><a href="#">Support</a></li>
						<li><a href="#">Help</a></li>
						<li><a href="#">Navigate</a></li>
						<li><a href="#">Privacy Policy</a></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>

	<!-- Scripts -->
	<!--
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
	-->
	<script src="{{ asset('/js/jquery-2.1.4.js') }}"></script>
	<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('/js/app.js') }}"></script>
	<script src="{{ asset('/js/script.js') }}"></script>
	<script src="{{ asset('/js/bczHelpSystem.js') }}"></script>
	@yield('jslinks')
</body>
</html>
