jQuery(document).ready(function() {
		
    var msg = "";
    var cName = "";
    var Val = "";
    var tip = "";
    var extra = "";
    var prompt = false;
    var backspace = true;
    var controller = "BCZ";
    var flush = false;

    var preMgs = "";
    var preMCount = 1;

    var iconColor = "";
    var TimeId = setTimeout(function(){}, 0);

    var lastStrlen = 0;
    var strlen = 0;

    var commands = [];
    var result = "";

    var helpText = "Commands you can type : \n" +
        "logoff \t\t  Terminates your session\n" +
        "finger \t\t  Prints online users\n" +
        "online \t\t  Prints total online users\n" +
        "whoami \t  Prints your details\n" +
        "routes \t\t  Prints route names\n" +
        "flush  \t\t  Clear the screen";

    /**
     * The command parser
     */
    var CommandParser = (function() {
        var parse = function(str, lookForQuotes) {
            var args = [];
            var readingPart = false;
            var part = '';
            for(var i=0; i<str.length; i++){
                if(str.charAt(i) === ' ' && !readingPart) {
                    //args.push(part); // original
                    if(part != '') args.push(part); // avoid whitespaces as arguments
                    part = '';
                } else {
                    if(str.charAt(i) === '\"' && lookForQuotes) {
                        readingPart = !readingPart;
                    } else {
                        part += str.charAt(i);
                    }
                }
            }
            args.push(part);
            return args;
        }
        return {
            parse: parse
        }
    })();

    $(".bcz-help").mouseover(function(){
        if(!prompt){
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
        if(!prompt){
            $(".bcz-help-panel-value").text("Hi ~ BCZ help System");
            $(".bcz-icon").css({"background" : "#707070" });
            if(!prompt)takeMeHome();
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
        prompt = true;
        makeMyTrip();
        $(".bcz-cons").css({ "width" : "600px"});
        $("#bcz-cons").focus();
        TimeId = setTimeout(function(){$(".bcz-cons").css({"height" : "300px"}); }, 400);
        $(".bcz-help-panel-value").text("Type commands in the console");
        $(".consPrefixDiv > span").css({"opacity" : "1"});
    });
    $(".cons-close").click(function(){
        prompt = false;
        takeMeHome();
        $(".bcz-cons").css({ "height" : "0px"});
        $(".consPrefixDiv > span").css({"opacity" : "0"});
        TimeId = setTimeout(function(){$(".bcz-cons").css({"width" : "0px"}); }, 400);
    });

    $("#bcz-cons").keydown(function(e){
        if(e.keyCode == 13){
            text = $("#bcz-cons").val();
            //addConsPrefix();
            runCommand();
            lastStrlen=$("#bcz-cons").val().length;
            return false;
        }
        stringCheck();
        if(e.keyCode == 8) {
            return backspace;
        }
    });

    function addConsPrefix(){
        //$('#bcz-cons').val(text + "\n" + controller + " >> "); // original
        $('#bcz-cons').val(text + "\n");
    }

    function stringCheck(){

        strlen=$("#bcz-cons").val().length;

        if(strlen <= lastStrlen){
            backspace = false;
        }else{
            backspace = true;
        }
    }

    function runCommand(){
        getCommand();
        executeCommand();
        displayResult();
    }

    function getCommand(){
        commands = CommandParser.parse(text.substr(lastStrlen));
        console.log(commands); // debug
    }

    function executeCommand() {
        var ci = 0; // command index
        var command = commands[ci];
        if (command === 'logoff') {
            result = "\nCommand not yet implemented";
        } else if (command === 'finger') {
            result = "\nCommand not yet implemented";
        } else if (command === 'online') {
            result = "\nCommand not yet implemented";
        } else if (command === 'whoami') {
            result = "\nCommand not yet implemented";
        } else if (command === 'routes') {
            getRoutes();
        } else if (command === 'flush') {
            flushIt();
        } else if (command === 'help') {
            result = '\n' + helpText;
        } else if (command === '') {
            // do nothing
        } else {
            result = "\nUnknown command";
        }
    }

    function displayResult(printable){
        text = $("#bcz-cons").val();
        //if(printable == null) console.log('ouch');
        //else console.log('okay');
        $('#bcz-cons').val(text + result + "\n" + controller + " >> ") ;
        result = "";
    }

    /**
     * APP FUNCTIONS
     */

    function flushIt(){
        $('#bcz-cons').val(controller + ' >> ');
        lastStrlen=$("#bcz-cons").val().length;
    }

    function getRoutes() {
        $.ajax({
            url: '/get-routes',
            type: 'GET',
            dataType: 'JSON',
            success: function (response) {
                //console.log(response);
                var routes = "";
                $.each(response, function(key, value) {
                    if(value != null) routes += "\n" + value;
                });
                result = routes;
                displayResult();
            },
            fail: function(response) {
                alert('Command failed');
            }
        });
    }

    /*extras*/

    var panelw = $(".bczh-main").css("width") - $(".ad-panel-btns").css("width");

    $(".ad-help-panel").css({"width":panelw });
});