/**
 * 
 */

String.prototype.upperFirstLetter = function() {
    return this.charAt(0).toUpperCase() + this.slice(1);
}

function cssLoad(path) {
	$('head').append( $('<link rel="stylesheet" type="text/css" />').attr('href', path) );
}

function jsLoad(path) {
	$.getScript(path);
}