/**
 * Script for module Menu
 */

$(document).ready(function() {
	
	$("ul.subMenu").hide();
	
	$.each($("ul.menu>li"), function(i, val) {
		$(val).click(function() {
			$("ul.subMenu").hide();
			menuClicked = $(val).find("input[name=menu]").val();
			console.log(menuClicked + " clicked");
			
			if($("ul." + menuClicked).length>0) {
				$("ul.subMenu").hide();
				mod_menu_show_subMenu(menuClicked);
			} else {
				$("div#content").children().remove();
				
				$.ajax({
					method: "POST",
					url: $("input[name='path']").val() + $("input[name='modulePath']").val() + $(val).find("input[name=menu]").val() + "/" + $(val).find("input[name=menu]").val() + ".php",
				})
				.done(function(data){mod_menu_ajax_done(data);})
				.fail(function(){mod_menu_ajax_fail();});
			}
		})
	});
});

function mod_menu_show_subMenu(elt) {
	$("ul." + menuClicked).show();
	$("ul." + elt).css("left", $("input[value='" + elt + "']").parent().offset().left);
	$("ul." + elt).css("top", $("input[value='" + elt + "']").parent().offset().top + 5);
	
	$.each($("ul." + elt + ">li"), function(i, val) {
		$(val).click(function() {
			menuClicked = $(val).find("input[name=menu]").val();
			console.log(menuClicked + " clicked");
			$("ul.subMenu").hide();
			$("div#content").children().remove();
			
			$.ajax({
				method: "POST",
				url: $("input[name='path']").val() + $("input[name='modulePath']").val() + $(val).find("input[name=menu]").val() + "/" + $(val).find("input[name=menu]").val() + ".php",
				data: { param: ""+$(val).find("input[name=paramMenu]").val()+""}
			})
			.done(function(data){mod_menu_ajax_done(data);})
			.fail(function(){mod_menu_ajax_fail();});
		});
	});
}

function mod_menu_ajax_done(data) {
	if ( console && console.log ) {
		$("div#content").children().remove();
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

