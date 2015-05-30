jQuery(document).ready(function() {
		
		var msg = "";
		var cName = "";
		var Val = "";
		var tip = "";
		var extra = "";
		
		var preMgs = "";
		var preMCount = 1;
		
		var iconColor = "";
		
		$(".bcz-help").mouseover(function(){
			
			Val = $(this).text().toLowerCase();
			tip = $(this).attr("tip");
			extra = $(this).attr("extra");
			cName = $(this).attr("class");
			
			checkInput();

			$(".bcz-help-panel-value").text(msg);
			setIconColor();
			
		});
		
		$(".bcz-help").mouseout(function(){
			
			$(".bcz-help-panel-value").text("Hi ~ BCZ help System");
			$(".bcz-icon").css({"background" : "#707070" });
		});


		
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
			}else{
				iconColor = "#ed7b6f";
			} 
			$(".bcz-icon").css({"background" : iconColor});	
		}	
});