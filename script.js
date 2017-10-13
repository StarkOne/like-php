$(document).ready(function(){
	$('.like').on('click', function(){
		let link = $(this);
		let id = link.data('id');
		$.ajax({
			url: 'like.php',
			type: 'POST',
			data: {id:id},
			dataType: "json",
			success: function(rez){
				if(!rez.error){
					$('.counter',link).html(rez.count);
				} else {
					alert(rez.message);
				}
			}
		});
	});
});