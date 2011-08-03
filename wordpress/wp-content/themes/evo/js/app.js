$(document).ready(function() {
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
});