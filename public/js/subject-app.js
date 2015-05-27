$(document).ready(function(){
	$("#title").blur(function(e){
		$.post('/generate-slug', {convert : $(this).val()},function(response){
			$("#slug").val(response);
		});
	});
});