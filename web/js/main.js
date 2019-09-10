$(function(){
	$('#modalButtonTask').click(function(){
		$('#modalTask').modal('show')
			.find('#modalContentTask')
			.load($(this).attr('href'));
			return false;
	});
});

$(function(){
	$('#modalButtonViewTask').click(function(){
		$('#modalViewTask').modal('show')
			.find('#modalContentViewTask')
			.load($(this).attr('href'));
			return false;
	});
});


