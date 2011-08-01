$(document).ready(function(){

	//Switch the "Open" and "Close" state per click then slide up/down (depending on open/close state)
	$("a.trigger").click(function(){
		$("body").toggleClass("grid");
	});
	$("a.trigger").click(function(){
		$(".jbasewrap").toggleClass("grid");
	});

});

function func() {
	// do nothing
}