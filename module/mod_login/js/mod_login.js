/**
 * script for the module: mod_login
 */

/*
 * reset click events
 */
$("input[name='mod_login_reset']").click(function() {
	$("input[name='mod_login_login']").val("");
	$("input[name='mod_login_pwd']").val("");
});

/**
 * valid click events
 */
$("input[name='mod_login_valid']").click(function() {
	var login = $("input[name='mod_login_login']").val();
	var pwd = CryptoJS.MD5($("input[name='mod_login_pwd']").val());
	
	alert("Identifiant: " + login + "\rMot de passe: " + pwd);
});