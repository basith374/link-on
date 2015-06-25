{{-- /resources/views/home.blade.php --}}

@extends('layouts.master')

@section('title', 'Home')

@section('csslinks')
	<style>
		.fakeNav{
			height: 0px;		
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
        <div class="col-lg-12">
            <div class="row ">
                <div class="col-xs-8 col-xs-offset-2 hb-w-head" >
				How to use the website?
				<p>
				Given below are various topics. just click on the article to know more. Thats it Simple and Easy! 
				</p>
				</div>
            </div>
        </div>
		
		<div class="row col-lg-offset-1" id="gridset">
			@for($ticker=1;$ticker<=8;$ticker++)
				<div class="box-cust" id="gbox">
					<a href="{{ route('courses.index') }}" class="grid-link">
						<div class="boxpanel-cust">
							<div class="boxhead-cust" id="gh">
							Courses 
							</div>
							<div class="boxbody-cust">
								
								<div class="img-gridS-cust" id="gimgS"></div>
								<img src="{{ asset('/img/home/grid/g'.$ticker.'.png') }}" class="img-grid-cust" id="gimg">
								<div class="boxcontent-cust" id="gcont">
									Panel content, there are supposed to be a ton of content in here but unfortunately this shit is under development.
									<span class="badge backt">Awesome</span>
								</div>
							</div>
						</div>
					</a>
				</div>
			@endfor
		</div>
    </div>
</div>

@endsection