$(function(){
	if ($("body#js_unknown").length == 1) {
		$("body").attr('id', 'js_on');
		$.get('ajax/jsSupport');
	}
});
