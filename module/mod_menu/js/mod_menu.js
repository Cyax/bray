/**
 * 
 */

$(document).ready(function() {
	$.each($("ul.menu>li"), function(i, val) {
		$(val).click(function() {
			menuClicked = $(val).find("input[name=menu]").val();
			console.log(menuClicked + " clicked");
			
			$("div#content").children().remove();
			
			$.ajax({
				url: $("input[name='path']").val() + $("input[name='modulePath']").val() + $(val).find("input[name=menu]").val() + "/" + $(val).find("input[name=menu]").val() + ".php",
			})
			.done(function(data) {
				if ( console && console.log ) {
					$("div#content").append(data);
				}
			})
			.fail(function() {
					$.ajax({
						url: $("input[name='path']").val() + $("input[name='modulePath']").val() + "mod_menu/404.php",
					})
					.done(function(data) {
						if ( console && console.log ) {
							$("div#content").append(data);
						}
					})
				
			});
		})
	});
});