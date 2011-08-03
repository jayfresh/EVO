$(document).ready(function() {
	$('#menu-count-0 > ul').hoverIntent(function() {
		$(this).find('ul.sub-menu').show();
	}, function() {
		$(this).find('ul.sub-menu').hide();
	});
});