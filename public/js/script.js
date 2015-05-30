jQuery(document).ready(function() {

	var gridVar = 1;
	
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
				gridVar=1;
			}
			gridVar++;
	}
	
	*/
	
	function setGridBox(){
		$("#gridset-w :nth-child(" + gridVar + ")").css( { "transform" : "scale(1)" });
		$("#gridset-w :nth-child(" + gridVar + ")").css( { "opacity" : "1" });
		
		if(gridVar==3){
			clearInterval(interval);
			gridVar=1;
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
		$("#pf-div-1").css({ "marginLeft" : "-250px" , "opacity": ".4"});
		$("#pf-div-2").css({ "marginLeft" : " 200px" , "opacity": "1"});
		$("#pf-div-3").css({ "marginLeft" : " 780px" , "opacity": ".3"});
	}
	
	
	
	/*OnScroll */
	
	window.onscroll = function() {
		/*- header */
		
		if (window.pageYOffset >= 10){
			$('.navbar-cust').css({"height":"80px" , "paddingTop" : "13px"});
		}else{
			$('.navbar-cust').css({"height":"120px" , "paddingTop" : "33px"});
		}
		
		if (window.pageYOffset >= 650){
			$('.navbar-cust').css({"background":"#ed7b6f" });
			$(".nav-a-cust > li > a").css({"background":"#ed7b6f" });
			
			$(".nav-a-cust > li > a").hover(function() {
			  $(this).css({"background":"#ed7b6f" });
			});
		}else{
			$('.navbar-cust').css({"background":"#373737" })
			$(".nav-a-cust > li > a").css({"background":"#373737" });
			
			$(".nav-a-cust > li > a").hover(function() {
			  $(this).css({"background":"#373737" });
			});
		}
	
		/*hb-w-grid*/
		
		if (window.pageYOffset >= 340){
			homeGridTwo();
			interval = setInterval(setGridBox,200);
		}
		
		if (window.pageYOffset >= 780){
			homeGridThree();
		}
	}
});




		
		 