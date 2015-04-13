/**
 * Script for module Menu
 */

$(document).ready(function() {
	
	$("ul.subMenu").hide();
	
	mod_menu_autoset_subMenu();
	
	$.each($("ul.menu>li"), function(i, val) {
		$(val).click(function() {
			$("ul.subMenu").hide();
			menuClicked = $(val).find("input[name=menu]").val();
			console.log(menuClicked + " clicked");
			
			if($("ul." + menuClicked).length>0) {
				$("ul.subMenu").hide();
				$("ul." + menuClicked).show();
			} else {
				$("div#content").children().remove();
				
				$.ajax({
					url: $("input[name='path']").val() + $("input[name='modulePath']").val() + $(val).find("input[name=menu]").val() + "/" + $(val).find("input[name=menu]").val() + ".php",
				})
				.done(function(data){mod_menu_ajax_done(data);})
				.fail(function(){mod_menu_ajax_fail();});
			}
		})
	});
});

function mod_menu_autoset_subMenu() {
	$.each($("ul.subMenu"), function(i, val) {
		var className = $("ul.subMenu").attr('class').replace("subMenu ",""); 
		
		$("ul." + className).css("left", $("input[value='" + className + "']").parent().offset().left);
		$("ul." + className).css("top", $("input[value='" + className + "']").parent().offset().top+4);
	});
}

function mod_menu_ajax_done(data) {
	if ( console && console.log ) {
		$("div#content").append(data);
	}
}

function mod_menu_ajax_fail() {
	$.ajax({
		url: $("input[name='path']").val() + $("input[name='modulePath']").val() + "mod_menu/404.php",
	})
	.done(function(data) {
		if ( console && console.log ) {
			$("div#content").append(data);
		}
	})
}

