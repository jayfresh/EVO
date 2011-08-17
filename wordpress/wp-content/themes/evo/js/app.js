$(document).ready(function() {
	// set up the 'information for' sub-menu
	$('#menu-count-0 > ul')
		.find('ul.sub-menu li a')
		.each(function() {
			$(this).text($(this).text().replace(/information for.../i,""));
		})
		.end().hoverIntent(function() {
			$(this).find('ul.sub-menu').show();
		}, function() {
			$(this).find('ul.sub-menu').hide();
		});

	// sort the carousel out
	$('.carouselWrapper').each(function() {
		var $strip = $(this).children('.strip'),
			$blocks = $strip.children('.carousel');
		$strip.css({
				'width': $blocks.length*$(this).width(),
				'left': 0
			})
			.click(function(e) {
				if($(e.target).hasClass('next')) {
					moveStrip(1);
				}
				if($(e.target).hasClass('prev')) {
					moveStrip(-1);
				}
			});
	});
	
	// cover for any browsers that don't support placeholder
	$('input').placeholder();
});

function moveStrip(direction) {
	var $strip = $('.carouselWrapper .strip'),
		$blocks = $strip.children('.carousel'),
		stripLeft = parseInt($strip.css('left'),10),
		blockWidth = $blocks.eq(0).width(),
		stripPos = stripLeft / blockWidth,
		blockCount = $blocks.length,
		toPos = (stripPos-direction) % blockCount;
		if(toPos>0) {
			toPos -= blockCount;
		}
	$strip.stop(true, true).animate({
		'left': toPos*blockWidth
	}, 'slow');
}

var hlst_areas = ["div.article"];