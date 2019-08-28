

$(function(){
	$('#modalButtonRInsiden').click(function(){
		$('#modalRInsiden').modal('show')
			.find('#modalContentRInsiden')
			.load($(this).attr('value'));
	});
});

