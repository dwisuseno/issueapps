$(function(){
	$('#modalButtonTask').click(function(){
		$('#modalTask').modal('show')
			.find('#modalContentTask')
			.load($(this).attr('href'));
			return false;
	});
});


