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
			
		</div>	
	</div>

@endsection	
	
@section('content')	
<div class="container">
	<div class="row vertical-center-row hb-w-cust">
        <div class="col-lg-12" >
            <div class="row " >
                <div class="col-xs-8 col-xs-offset-2 hb-w-head  sec-2" >
				How to use the website?
				<p>
				Given below are various topics. just click on the article to know more. Thats it Simple and Easy! 
				</p>
				</div>
            </div>
        </div>
		
		<div class="row col-md-12 col-lg-offset-1" id="gridset">
			<div class="col-md-8 " >
			@for($ticker=1;$ticker<=6;$ticker++)
				<div class="home-box col-md-6 " >
					<div class="hIcon">
					
					</div>
					<div class="hbody">
						<div class="hTitle"> COURSE</div>
						<div class="hCont"> This is a damn damn course , Given below are various topics. just click on the article to know more. Thats it Simple and Easy! </div>
					</div>
				</div>
			@endfor
			</div>
			
			<!-- HardCoded Things | Static -->
			<div class="col-md-4" >
				<div class="home-box col-md-12 " >
					<div class="hIcon">
					
					</div>
					<div class="hbody">
						<div class="hTitle"> COURSE</div>
						<div class="hCont"> This is a damn damn course , Given below are various topics. just click on the article to know more. Thats it Simple and Easy! </div>
					</div>
				</div>
				
				<div class="home-box2 col-md-12 " >
					<div class="hIcon">
					
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