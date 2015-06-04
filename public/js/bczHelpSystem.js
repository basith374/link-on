jQuery(document).ready(function() {
		
		var msg = "";
		var cName = "";
		var Val = "";
		var tip = "";
		var extra = "";
		
		var preMgs = "";
		var preMCount = 1;
		
		var iconColor = "";
		var TimeId = setTimeout(function(){}, 0);
		
		$(".bcz-help").mouseover(function(){
			Val = $(this).text().toLowerCase();
			tip = $(this).attr("tip");
			extra = $(this).attr("extra");
			cName = $(this).attr("class");
			makeMyTrip();
			checkInput();
			$(".bcz-help-panel-value").text(msg);
			setIconColor();
		});
		
		$(".bcz-help").mouseout(function(){
			$(".bcz-help-panel-value").text("Hi ~ BCZ help System");
			$(".bcz-icon").css({"background" : "#707070" });
			takeMeHome();
		});

		function makeMyTrip(){
			clearTimeout(TimeId);
			$(".bcz-help-panel").css({"left" : "20px" , "opacity" : "1"})
		}
		function takeMeHome(){
			TimeId = setTimeout(function(){ $(".bcz-help-panel").css({"left" : "-4000px"}); }, 800);
			$(".bcz-help-panel").css({"opacity" : "0"})
		}
		function checkInput(){
			findPreWords();
			if(cName.indexOf('--btn-e') > -1){
				msg = preMsg + Val +". "+ extra;	
			}else
			if(cName.indexOf('--btn') > -1){
				msg = preMsg + Val +".";
			}else {
				msg = tip;
			}
		}
	
			function findPreWords(){
				if(preMCount == 1){
					preMsg = "Press this button to ";
				}else if(preMCount == 2){
					preMsg = "This button is to ";
				}else if(preMCount == 3){
					preMsg = "By pressing this you can ";
				}else {
					preMsg = "Click this to ";
					preMCount = 0;
				}
				preMCount++;
			}
			
		function setIconColor(){
			if(cName.indexOf('cl-cust-blue') > -1){
				iconColor = "#3498db";
			}else if(cName.indexOf('cl-cust-green') > -1){
				iconColor = "#2ecc71";
			}else if(cName.indexOf('cl-cust-red') > -1){
				iconColor = "#ed7b6f";
			}else{
				iconColor = "#2ecc71";
			} 
			$(".bcz-icon").css({"background" : iconColor});	
		}	
		
		
		
		/*extras*/
		
		var panelw = $(".bczh-main").css("width") - $(".ad-panel-btns").css("width");
		
		$(".ad-help-panel").css({"width":panelw });
});