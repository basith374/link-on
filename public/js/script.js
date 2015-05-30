jQuery(document).ready(function() {

	var gridVar = 1;
	var wordTicker = 1;
	var maxWord = 1;

	var hg2_start = true;	
	var hg3_start = true;

	var hg3_btn = true;
	
	var smartHead = false;
	var pathname = window.location.href; // Returns path only
	
	if(pathname.length < 2){
		smartHead = true;		
	}else if(pathname.indexOf('home') > -1){
		smartHead = true;
	}else{
		smartHead = false;
	}
	//console.log(smartHead);
	
	/*Smart head*/
	if(!smartHead){
		$('.navbar-cust').css({"height":"80px" , "paddingTop" : "13px"});
		$('.fakeNav').css({"height":"80px"});
	}
	
	$("#gridset > div").mouseover(function(){
		jQuery(this).find("#gimg").css( { marginTop : -200 });
		jQuery(this).find("#gimg").css( { opacity : 0 });
		jQuery(this).find("#gimgS").css( { opacity : 0 });
		jQuery(this).find("#gcont").css( { marginTop : -155 });
		jQuery(this).find("#gcont").css( { opacity : 1 });
		jQuery(this).find("#gh").css({"background-color": "#edc26d","color":"#505050" });
		jQuery(this).css( { "transform" : "scale(1.05)" });
	});
	
	$("#gridset > div").mouseout(function(){
		jQuery(this).find("#gimg").css( { marginTop : -140 });
		jQuery(this).find("#gimg").css( { opacity : 1 });
		jQuery(this).find("#gimgS").css( { opacity : 1 });
		jQuery(this).find("#gcont").css( { marginTop : -50 });
		jQuery(this).find("#gcont").css( { opacity : 0 });
		jQuery(this).find("#gh").css({"background-color": "#e9edef","color":"#505050" });
		jQuery(this).css( { "transform" : "scale(1)" });
	});
	
	
	/* intro transition effect */
	/*
	/* make scale of the div 0.9 and opacity 0
	
	interval = setInterval(setGridBox,100);
	
	function setGridBox(){
			$("#gridset :nth-child(" + gridVar + ")").css( { "transform" : "scale(1)" });
			$("#gridset :nth-child(" + gridVar + ")").css( { "opacity" : "1" });
			
			if(gridVar==8){
				clearInterval(interval);
				gridVar=0;
			}
			gridVar++;
	}
	
	*/
	
	
	
	function setGridBox(){
			$("#gridset-w :nth-child(" + gridVar + ")").css( { "transform" : "scale(1)" });
			$("#gridset-w :nth-child(" + gridVar + ")").css( { "opacity" : "1" });
			
			if(gridVar==3){
				clearInterval(interval);
				gridVar=0;
			}
			gridVar++;
	}
	
	
	
	
	function homeGridTwo(){
		
		var mrgLeft = 0;
		var iconW = 0;
		
		iconW = 120;
		mrgLeft = ($(".hb-w-grid-head").width() - iconW)/2;
		
		$(".hb-w-icon").css({"marginLeft": mrgLeft });
	}
	
	
	function homeGridThree(){
		$("#pf-div-1").css({ "marginLeft" : "-250px" , "opacity": ".4"})
		$("#pf-div-2").css({ "marginLeft" : " 200px" , "opacity": "1"})
		$("#pf-div-3").css({ "marginLeft" : " 780px" , "opacity": ".3"})

		//$(".pf-cont-w :nth-child(1)").css({"color": " rgba(255,255,255,0.85)"});
		
			maxWord = $(".pf-cont-word > p").children().length;		
			interval2 = setInterval(hmThreeWord,300);
		
	}
		function hmThreeWord(){
			
			$(".pf-cont-word > p :nth-child(" + wordTicker + ")").css({"color" : " rgba(255,255,255,0.85)"});
			
			if(wordTicker==maxWord){
				clearInterval(interval2);
				wordTicker=0;
				
				interval3 = setInterval(setHG3btn,500);
				
			}
			wordTicker++;
		}
	
		function setHG3btn(){
			
			if(wordTicker==2){
				clearInterval(interval3);
				wordTicker=0;
				if(hg3_btn){
					$(".hg3-up-btn-cust").css({"marginTop" : "20px" , "opacity" : "1"});
					hg3_btn = false;
				}
			}
			wordTicker++;
		}
		
		
		$(".hg3-up-btn-cust").click(function(){
			$("html, body").animate({ scrollTop: 0 }, "slow");
			return false;
		});
		
	/*OnScroll */
	
	window.onscroll = function() {
			
			/*- header */
			
		if(smartHead){
			if (window.pageYOffset >= 10){
				$('.navbar-cust').css({"height":"80px" , "paddingTop" : "13px"});
			}else{
				$('.navbar-cust').css({"height":"120px" , "paddingTop" : "33px"});
			}
			
			if (window.pageYOffset >= 655){
				$('.navbar-cust').css({"background":"#fff" , "box-shadow": "0px 0px 2px rgba(0,0,0,.4)" });
				$('.icon-cust').css({"color": "rgba(52,73,94,0.7)"});
				
				$(".icon-cust ").mouseover(function() {
				  $(this).css({"color": "rgba(52,73,94,1)"});
				});
				
				$(".icon-cust ").mouseout(function() {
				  $(this).css({"color": "rgba(52,73,94,0.7)"});
				});
				
				$(".nav-a-cust > li > a").css({"background":"#fff" ,"color": "rgba(52,73,94,0.6)"});
				
				
				$(".nav-a-cust > li > a").mouseover(function() {
				  $(this).css({"background":"#fff" ,"color": "rgba(52,73,94,0.8)"});
				});
				
				$(".nav-a-cust > li > a").mouseout(function() {
				  $(this).css({"background":"#fff" ,"color": "rgba(52,73,94,0.6)"});
				});
				
			}else{
				$('.navbar-cust').css({"background":"#373737" , "box-shadow": "0px 0px 0px rgba(0,0,0,.4)"})
				$('.icon-cust').css({"color": "rgba(255,255,255,0.8)"});
				
				$(".icon-cust ").mouseover(function() {
				  $(this).css({"color": "rgba(255,255,255,1)"});
				});
				
				$(".icon-cust ").mouseout(function() {
				  $(this).css({"color": "rgba(255,255,255,0.8)"});
				});
				
				
				$(".nav-a-cust > li > a").css({"background":"#373737" ,"color": "rgba(255,255,255,0.6)"});
				
				$(".nav-a-cust > li > a").mouseover(function() {
				  $(this).css({"background":"#373737" ,"color": "rgba(255,255,255,0.8)"});
				});
				
				$(".nav-a-cust > li > a").mouseout(function() {
				  $(this).css({"background":"#373737" ,"color": "rgba(255,255,255,0.6)"});
				});
			}
		}
			/*hb-w-grid*/
			
			if (window.pageYOffset >= 340){
				if(hg2_start){
					homeGridTwo();
					interval = setInterval(setGridBox,200);
					hg2_start = false;
				}
			}
			
			if (window.pageYOffset >= 780){
				if(hg3_start){
					hg3_start = false;
					homeGridThree();
				}
			}
		}
		
	
});




		
		 