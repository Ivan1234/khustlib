$(document).ready(function () {

	if (window.scrollY > 200) {
		$('#go_top').addClass('visible');
	} else {
		$('#go_top').removeClass('visible');
	}
	$('.some-numeber span').counterUp({
        delay: 10,
        time: 2000
    });
    if ($(".quotes blockquote").length > 1) {
		$(".quotes").owlCarousel({
			items: 1,
			loop: true,
			dots: true
		});
	}

	window.onscroll = function () {
		if (window.scrollY > 200) {
			$('#go_top').addClass('visible');
		} else {
			$('#go_top').removeClass('visible');
		}
	};
	$('#go_top').click(function () {
		$('html, body').animate({
			scrollTop: 0
		}, 500);
	})
});