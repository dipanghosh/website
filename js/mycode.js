var reqHeight = $(".imageitem").height();
	$(document).ready(function(){
		$(".longimg").height(reqHeight);
	});
$(document).on('click', '[data-toggle="lightbox"]', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox();
});


