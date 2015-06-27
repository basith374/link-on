{{-- /resources/views/home.blade.php --}}

@extends('layouts.master')

@section('title', 'Home')

@section('csslinks')
	<style>
		.fakeNav{
			height: 60px;		
		}
		.navbar-cust{
			margin-top:0px;
		}	
	</style>
	<input type="hidden" value="home" id="smartHead">
@endsection


@section('pre-header')
	

	<div id="hb-red-cust">
		<div class="container">
			<div class="linkOnIcon"><img src="img/LinkOnLogo.png"></div>
			<div class="linkOnMotto">
				<p class="p1">"The Complete Educational Website For Indian Students"</p>
				<p class="p2">All It Takes is 10 Sec</p>
			</div>
		</div>	
	</div>

@endsection	
	
@section('content')	
<div class="container" >
	<div class="row vertical-center-row hb-w-cust">
        <div class="col-lg-12" >
            <div class="row " >
                <div class="col-xs-8 col-xs-offset-2 hb-w-head col-lg-6 col-lg-offset-3  sec-2" >
				How to use the website?
				<p>
				Given below are various topics. just click on the article to know more. Thats it Simple and Easy! 
				</p>
				</div>
            </div>
        </div>
		
		<div class="row col-md-12 col-sm-12" id="gridset">
			<div class="  col-sm-6 col-md-8 " >
			@for($ticker=1;$ticker<=6;$ticker++)
				@if($ticker<5)
				<div class="home-box col-md-6 col-sm-12  " >
					<div class="hIcon">
						<img src="{{'img/courses/'.$ticker.'.png'}}">
					</div>
					<div class="hbody">
						<div class="hTitle"> COURSE</div>
						<div class="hCont"> This is a damn damn course , Given below are various topics. just click on the article to know more. Thats it Simple and Easy! </div>
					</div>
				</div>
				@else
				<div class="home-box col-md-6 col-sm-12 hidden-sm" >
					<div class="hIcon">
						<img src="{{'img/courses/'.$ticker.'.png'}}">
					</div>
					<div class="hbody">
						<div class="hTitle"> COURSE</div>
						<div class="hCont"> This is a damn damn course , Given below are various topics. just click on the article to know more. Thats it Simple and Easy! </div>
					</div>
				</div>
				@endif
			@endfor
			</div>
			
			<!-- HardCoded Things | Static -->
			<div class="col-md-4 col-sm-6" >
				<div class="home-box col-md-12 col-sm-12" >
					<div class="hIcon">
						<img src="img/courses/7.png">
					</div>
					<div class="hbody">
						<div class="hTitle"> COURSE</div>
						<div class="hCont"> This is a damn damn course , Given below are various topics. just click on the article to know more. Thats it Simple and Easy! </div>
					</div>
				</div>
				
				<div class="home-box2 col-md-12 col-sm-12" >
					<div class="hbody">
						<img src="img/courses/CA.png">
					</div>
				</div>
				
				<div class="home-box col-md-6 col-sm-12 visible-sm" >
					<div class="hIcon">
						<img src="img/courses/6.png">
					</div>
					<div class="hbody">
						<div class="hTitle"> COURSE</div>
						<div class="hCont"> This is a damn damn course , Given below are various topics. just click on the article to know more. Thats it Simple and Easy! </div>
					</div>
				</div>
			</div>
		</div>
    </div>
</div>

@endsection