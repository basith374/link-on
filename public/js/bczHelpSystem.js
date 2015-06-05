jQuery(document).ready(function() {
		
		var msg = "";
		var cName = "";
		var Val = "";
		var tip = "";
		var extra = "";
		var console = false;
		var backspace = true;
		var controller = "BCZ";
		var flush = false; 

		var preMgs = "";
		var preMCount = 1;
		
		var iconColor = "";
		var TimeId = setTimeout(function(){}, 0);
		
		var lastStrlen = 0;
		var strlen = 0;
		
		var command = "";
		var result = "";
		$(".bcz-help").mouseover(function(){
			if(!console){
				Val = $(this).text().toLowerCase();
				tip = $(this).attr("tip");
				extra = $(this).attr("extra");
				cName = $(this).attr("class");
				makeMyTrip();
				checkInput();
				$(".bcz-help-panel-value").text(msg);
				setIconColor();
			}
		});
		
		$(".bcz-help").mouseout(function(){
			if(!console){
				$(".bcz-help-panel-value").text("Hi ~ BCZ help System");
				$(".bcz-icon").css({"background" : "#707070" });
				if(!console)takeMeHome();
			}
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
		
		/*Console*/
		$("#bcz-cons-btn").click(function(){
			$('#bcz-cons').val(controller + " >> ");
			lastStrlen=$("#bcz-cons").val().length;
			console = true;
			makeMyTrip();
			$(".bcz-cons").css({ "width" : "600px"});
			$("#bcz-cons").focus();
			TimeId = setTimeout(function(){$(".bcz-cons").css({"height" : "300px"}); }, 400);
			$(".bcz-help-panel-value").text("Type commands in the console");
			$(".consPrefixDiv > span").css({"opacity" : "1"});
		});
		$(".cons-close").click(function(){
			console = false;
			takeMeHome();
			$(".bcz-cons").css({ "height" : "0px"});
			$(".consPrefixDiv > span").css({"opacity" : "0"});
			TimeId = setTimeout(function(){$(".bcz-cons").css({"width" : "0px"}); }, 400);
		});
		
		$("#bcz-cons").keydown(function(e){
			if(e.keyCode == 13){
				text = $("#bcz-cons").val();
				addConsPrefix();
				runCommand();
				lastStrlen=$("#bcz-cons").val().length;
				flusher();
				return false;
			}
			stringCheck();
			if(e.keyCode == 8) {
				return backspace;
			}
		});
		
		function addConsPrefix(){
			$('#bcz-cons').val(text + "\n" + controller + " >> ");
		}
		
		function stringCheck(){
			
			strlen=$("#bcz-cons").val().length;
			
			if(strlen <= lastStrlen){ 
				backspace = false;
			}else{
				backspace = true;	
			}
		}
		function flusher(){
			if(flush){
				controller = "BCZ"
				$('#bcz-cons').val(controller + ' >> ');
				lastStrlen=$("#bcz-cons").val().length;
				flush = false;
			}
		}
		function runCommand(){
			getCommand();
			executeCommand();
			displayResult();
		}
		
		function getCommand(){
			command = text.substr(lastStrlen);
		}
		function executeCommand(){
			if(command.indexOf("flush") != -1){
				flush = true;
			}else{
				result = "It is not a command";
			}
		}
		
		function displayResult(){
			text = $("#bcz-cons").val();
			$('#bcz-cons').val(text +  result + "\n" + controller + " >> ") ;
			result = "";
		}
		/*extras*/
		
		var panelw = $(".bczh-main").css("width") - $(".ad-panel-btns").css("width");
		
		$(".ad-help-panel").css({"width":panelw });
});