$(document). ready(function(){

	$('#myform').submit(function(){

		event.preventDefault();
		var data = $(this).serialize();
		var name = $('#name').val();
		var comments = $('#comments').val();

		$.ajax({
			url: $(this).attr('action'),
			type: $(this).attr('method'),
			dataType: "JSON",
			data: {FORM_RESULT: data},
			success: function(data)
			{
				var text = '<div class="comment_box_app"><div class="name">' + data['name'] + '</div><div class="data">' + data['date'] + '</div><div class="comment_text">' + data['comments'] + '</div></div>';
				$('.comment_box').prepend(text);
				var name = $('#name').val('');
				var comments = $('#comments').val('');

			}
		})

	})



})