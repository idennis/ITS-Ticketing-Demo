// Event listener and handler for form submissions across system

// Functionality 1:
// -- Ctrl+Enter and Cmd+Enter to submit form
// Keycode for ENTER = 13, Keycode for Cmd = metaKey

$(document).ready(function(){
	// Live listener for keyboard events
	$("#report-issue").keydown(function(e) {

		if((e.keyCode == 13 && (e.metaKey||e.ctrlKey) )){
			e.preventDefault();
			$(this).submit();
		}
	});

  $("#add-comment-form").keydown(function(e) {

		if((e.keyCode == 13 && (e.metaKey||e.ctrlKey) )){
			e.preventDefault();
			$(this).submit();
		}
	});
});
