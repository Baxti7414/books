$(document).ready(function($) {

	$("#slidera3").owlCarousel({
		items: 5,
		loop: true,
		autoplay: false,
		animateOut: 'fadeOut'
	});

	$(window).load(function(){
		$('#slidera3').liCover({
			parent: $("#slidera3"),
			position:'absolute',
			veticalAlign:'middle',
			align:'center'
		})
	})
});