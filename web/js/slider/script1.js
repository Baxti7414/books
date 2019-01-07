$(document).ready(function($) {

	$("#slidera1").owlCarousel({
		items: 5,
		loop: true,
		autoplay: false,
		animateOut: 'fadeOut'
	});

	$(window).load(function(){
		$('#slidera1').liCover({
			parent: $("#slidera1"),
			position:'absolute',
			veticalAlign:'middle',
			align:'center'
		})
	})
});