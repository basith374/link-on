$(document).ready(function(){
	// CSRF configuration
	$.ajaxSetup({
		headers : {'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')}
	});
	setInterval(function(){
		console.log('sending push status');
		$.post('/user-status');
	}, 10000);
});
