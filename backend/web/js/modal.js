$(function() {
	
	
	$('#modalButtonAddChart').click(function () {
//		alert('sdasdasd');
		$('#modalAddChart').modal('show')
			.find('#modalContentAddChart')
			.load($(this).attr('value'));
	});
	
});