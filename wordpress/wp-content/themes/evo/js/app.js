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
				window.clearTimeout(setCarouselTimeout.timeout);
				if($(e.target).hasClass('next')) {
					moveStrip(1);
				}
				if($(e.target).hasClass('prev')) {
					moveStrip(-1);
				}
			});
		setCarouselTimeout();
	});
	
	// turn the answers to the front page questions the same colour as the questions
	$('.carousel').each(function() {
		var color = $(this).find('span:eq(0)').css('color');
		$(this).find('a.answer').css('color', color)
			.find('span')
			.css('borderLeftColor', color);
	});
	
	// cover for any browsers that don't support placeholder
	$('input').placeholder();
	
	// make OL LI's wrapped in SPAN elements so we can give the numbers red color
	$('ol').each(function() {
		$(this).addClass('spanified')
			.children('li').wrapInner('<span>');
	});
	/*
	// add grayscale effect to bigblock images
	var cloned;
	if(!$.browser.msie) {
		$('.bigblock img').each(function(i) {
			if(i===0) {
				cloned = this;
				grayscale.prepare(this);
			}
		});
	}
	$('.bigblock').hover(function() {
		var $img = $(this).find('img');
		if($.browser.msie) {
			grayscale($img);
		} else {
			$img.data('src',$img.attr('src'))
				.attr('src',grayscale.getCache(cloned).dataURL);
		}		
	}, function() {
		var $img = $(this).find('img');
		if($.browser.msie) {
			grayscale.reset($img);
		} else {
			$img.attr('src',$img.data('src'));
		}
	});*/
	$('.bigblock').hover(function() {
		var $img = $(this).find('img'),
			halfWidth = $img.width() / 2,
			currLeft = parseInt($img.css('left'),10);
		$img.css('left', currLeft-halfWidth);
	}, function() {
		var $img = $(this).find('img'),
			halfWidth = $img.width() / 2,
			currLeft = parseInt($img.css('left'),10);
		$img.css('left', currLeft+halfWidth);	
	});
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

function setCarouselTimeout() {
	arguments.callee.timeout = window.setInterval(function() {
		moveStrip(1);
	}, 4000);
}

// for the Highlight Search Terms plugin
var hlst_areas = ["div.article"];