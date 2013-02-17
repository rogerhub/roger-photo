/* Support for Roger-Photo */
(function($) {
	$(document).ready(function() {
		$("body").keydown(function(e) {
			try {
				if (e.keyCode == 39) { // right
					$("#nextlinks a")[0].click();
				} else if (e.keyCode == 37) { // left
					$("#prevlinks a")[0].click();
				}
			} catch (e) {}
		});
	});
})(jQuery);
