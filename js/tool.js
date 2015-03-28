/**
 * 
 */

String.prototype.upperFirstLetter = function() {
    return this.charAt(0).toUpperCase() + this.slice(1);
}

function checkRegex(elt, eltIcon, regex) {
	if($(elt).val().match(regex)) {
		$("span#" + eltIcon).children().remove();
		$("span#" + eltIcon).append("<img class='icon12' src='" + $("input#validIcon").val() + "' alt='OK' />");
	} else {
		$("span#" + eltIcon).children().remove();
		$("span#" + eltIcon).append("<img class='icon12' src='" + $("input#errorIcon").val() + "' alt='KO' />");
	}
}