$(document).ready(function($) {

	$("#slidera2").owlCarousel({
		items: 5,
		loop: true,
		autoplay: false,
		animateOut: 'fadeOut'
	});

	$(window).load(function(){
		$('#slidera2').liCover({
			parent: $("#slidera2"),
			position:'absolute',
			veticalAlign:'middle',
			align:'center'
		})
	})
});