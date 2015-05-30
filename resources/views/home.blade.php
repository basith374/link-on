{{-- /resources/views/home.blade.php --}}
@extends('layouts.master')

@section('title', 'Home')

@section('content')


	<div id="hb-red-cust">
	
	@if(Auth::user())
		<div class="alert alert-info">You're user</div>
	@endif
	
		<div class="container">
			<div class="row col-lg-offset-1" id="gridset">
				@for($ticker=1;$ticker<=8;$ticker++)
					<div class="box-cust" id="gbox">
						<a href="{{ route('courses.index') }}" class="pawe">
							<div class="boxpanel-cust">
								<div class="boxhead-cust" id="gh">
								Courses 
								</div>
								<div class="boxbody-cust">
									<img src="{{asset('/img/home/grid/stripes.png') }}" class="img-gridS-cust" id="gimgS">
									<img src="{{asset('/img/home/grid/g'.$ticker.'.png') }}" class="img-grid-cust" id="gimg">
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
	
<div class="container">
	<div class="row vertical-center-row hb-w-cust">
        <div class="col-lg-12">
            <div class="row ">
                <div class="col-xs-8 col-xs-offset-2 hb-w-head" >
				How It Works
				<p>
				We've rethought the learning process and built a proven system to get you the skills and knowledge you need to accomplish your goals.
				</p>
				</div>
            </div>
        </div>
		
		<div class="col-lg-12">
            <div class="row ">
                <div class="col-xs-10 col-xs-offset-1  hb-w-cont" >
					<div class="col-lg-12" id="gridset-w">
						<div class=" col-xs-4 hd-w-grid" >
							<div class="hb-w-grid-head">
								<div class="hb-w-icon">
									<img src="{{asset('/img/home/h-w-get/1.png') }}" draggable="false">
								</div>
							</div>
							<div class="hb-w-grid-cont">
								<h5 class="h5">
									Get Started
								</h5>
								<p>
									We're here to help you get started. Whether you are looking for a new career, want to learn to code for fun, or want to keep your skills cutting edge for your job, we will help you start down the right path.
								</p>
							</div>
						</div>
						<div class=" col-xs-4 hd-w-grid">
							<div class="hb-w-grid-head">
								<div class="hb-w-icon" style=" background:#5dceeb;">
									<img src="{{asset('/img/home/h-w-get/2.png') }}" draggable="false">
								</div>
							</div>
							<div class="hb-w-grid-cont">
								<h5 class="h5">
									Learn
								</h5>
								<p>
									Learn by actually building something yourself! By watching our course videos and coding along in Workspaces, our browser-based code editor, you can see the results of your work in real-time.
								</p>
							</div>
						</div>
						<div class=" col-xs-4 hd-w-grid">
							<div class="hb-w-grid-head">
								<div class="hb-w-icon" style="background:#ebba5d;">
									<img src="{{asset('/img/home/h-w-get/3.png') }}" draggable="false">
								</div>
							</div>
							<div class="hb-w-grid-cont">
								<h5 class="h5">
									Get Hired
								</h5>
								<p>
									Take advantage of our robust community of students, alumni and teachers who can review your work, problem-solve and offer support.
								</p>
							</div>
						</div>
					</div>	
				</div>
            </div>
        </div>
    </div>
</div>

<div class="hb-prefooter">
	<div class="container">
		<div class="col-lg-offset-1">
			<div class="pf-d-div" style="margin:100px 0px 0px -550px; opacity:0.4" id="pf-div-1">
				<div  style="width:50%; height:20px; border-radius:10px; background:#677889;  margin:30px 0px 30px 50px;" ></div>
				
				<div  style="width:80%; height:10px; border-radius:5px; background:#51677c;  margin:10px 0px 10px 50px;" ></div>
				<div  style="width:70%; height:10px; border-radius:5px; background:#51677c;  margin:10px 0px 10px 50px;" ></div>
				<div  style="width:77%; height:10px; border-radius:5px; background:#51677c;  margin:10px 0px 10px 50px;" ></div>
				<div  style="width:60%; height:10px; border-radius:5px; background:#51677c;  margin:30px 0px 10px 50px;" ></div>
				<div  style="width:50%; height:10px; border-radius:5px; background:#51677c;  margin:10px 0px 10px 50px;" ></div>
				<div  style="width:46%; height:10px; border-radius:5px; background:#51677c;  margin:10px 0px 10px 50px;" ></div>
				<div  style="width:56%; height:10px; border-radius:5px; background:#51677c;  margin:20px 0px 10px 50px;" ></div>
				<div  style="width:65%; height:10px; border-radius:5px; background:#51677c;  margin:10px 0px 10px 50px;" ></div>
			</div>
			
			<div class="pf-cont"  id="pf-div-2">
				<div class="pf-cont-head">What is LINKON</div>
				<p>
					Linkon Education is basically a platform for students. Its is a 100% advertisement free website were
					students find all about education . The market we are looking forward isIndia only. It must be very mobile friendly
					and more over a students friendly website too.
				</p>
				
				<p>
					This is basically a platform for students. Its is a 100% advertisement free website were
					students find all about education . The market we are looking forward isIndia only. It must be very mobile friendly
					and more over a students friendly website too.
				</p>
				
				
			</div>
			
			<div class="pf-d-div" style="transform:scale(0.7); margin:-400px 0px 0px 1080px; opacity:0.3"  id="pf-div-3">
				<div  style="width:50%; height:20px; border-radius:10px; background:#677889;  margin:30px 0px 30px 50px;" ></div>
				
				<div  style="width:80%; height:10px; border-radius:5px; background:#51677c;  margin:10px 0px 10px 50px;" ></div>
				<div  style="width:70%; height:10px; border-radius:5px; background:#51677c;  margin:10px 0px 10px 50px;" ></div>
				<div  style="width:77%; height:10px; border-radius:5px; background:#51677c;  margin:10px 0px 10px 50px;" ></div>
				<div  style="width:60%; height:10px; border-radius:5px; background:#51677c;  margin:30px 0px 10px 50px;" ></div>
				<div  style="width:50%; height:10px; border-radius:5px; background:#51677c;  margin:10px 0px 10px 50px;" ></div>
				<div  style="width:46%; height:10px; border-radius:5px; background:#51677c;  margin:10px 0px 10px 50px;" ></div>
				<div  style="width:56%; height:10px; border-radius:5px; background:#51677c;  margin:20px 0px 10px 50px;" ></div>
				<div  style="width:65%; height:10px; border-radius:5px; background:#51677c;  margin:10px 0px 10px 50px;" ></div>
			</div>
		</div>
	</div>	
</div>
@endsection