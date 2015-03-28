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
				url: $("input#componentPath").val() + $(val).find("input[name=menu]").val() + ".php",
			})
			.done(function(data) {
				if ( console && console.log ) {
					$("div#content").append(data);
					eval("init" + menuClicked.upperFirstLetter() + "()");
				}
			})
			.fail(function() {
					$.ajax({
						url: $("input#componentPath").val() + "404.php",
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