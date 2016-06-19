$(document).ready(function() {
	

	$('.button_size').click(function(){

			var fontitem = $('#fonts>li>img'),
				fontsize = $(this).attr('data-size');

			fontitem.removeClass().addClass('size_'+ fontsize +'pt');
			
	});


	// $('#size_24pt').click(function(){

	// 		var lastClass = $('#fonts>li>img').attr('class').split(' ').pop();
	// 		$('#fonts>li>img').removeClass(lastClass);

	// 	$('#fonts>li>img').addClass('size_24pt');

			
	// });

	// $('#size_36pt').click(function(){

	// 	var lastClass = $('#fonts>li>img').attr('class').split(' ').pop();
	// 		$('#fonts>li>img').removeClass(lastClass);

	// 	$('#fonts>li>img').addClass('size_36pt');
	// });

	// $('#size_48pt').click(function(){

	// 	var lastClass = $('#fonts>li>img').attr('class').split(' ').pop();
	// 		$('#fonts>li>img').removeClass(lastClass);


	// 	$('#fonts>li>img').addClass('size_48pt');
		
	// });

	// $('#size_72pt').click(function(){

	// 	var lastClass = $('#fonts>li>img').attr('class').split(' ').pop();
	// 		$('#fonts>li>img').removeClass(lastClass);


	// 	$('#fonts>li>img').addClass('size_72pt');

	// });

});
