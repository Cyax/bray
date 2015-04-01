/**
 * script for the module: mod_login
 */

/**
 * Initialisation
 */
$().ready(function() {
	/*
	 * Hide field
	 */
	$("input[name='mod_login_disconnect']").hide();
	$("input[name='mod_login_change_pwd']").hide();
	$("#mod_login_connected_label").hide();
	$("#mod_login_connected_name").hide();
	
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
		mod_login_validation();
	});

	/**
	 * Enter key on mod_login_login event
	 */
	$("input[name='mod_login_login']").keypress(function(e) {
		if(e.which == 13) {
			mod_login_validation();
		}
	});

	/**
	 * Enter key on mod_login_pwd event
	 */
	$("input[name='mod_login_pwd']").keypress(function(e) {
		if(e.which == 13) {
			mod_login_validation();
		}
	});
});

/**
 * Validation function
 */
function mod_login_validation() {
	var login = $("input[name='mod_login_login']").val();
	var pwd = CryptoJS.MD5($("input[name='mod_login_pwd']").val());
	
	console.log("Identifiant: " + login + " \rMot de passe: " + pwd);
	
	$.ajax({
		url: $("input[name='mod_login_ajax_target']").val(),
		data: "login=" + login + "&pwd=" + pwd + "",
		method: 'POST'
	})
	.done(function(data) {
		mod_login_validation_Ok();
	})
	.fail(function() {
		alert("KO");
	});
	
	
}

function mod_login_validation_Ok() {
	$("input[name='mod_login_login']").prop("disabled", true);
	$("input[name='mod_login_pwd']").prop("disabled", true);
	$("input[name='mod_login_valid']").prop("disabled", true);
	$("input[name='mod_login_reset']").prop("disabled", true);
	$("input[name='mod_login_valid']").hide();
	$("input[name='mod_login_reset']").hide();
	$("input[name='mod_login_disconnect']").show();
	$("input[name='mod_login_change_pwd']").show();
	$("#mod_login_connected_label").show();
	$("#mod_login_connected_name").show();
}

function mod_login_validation_Ko() {
	
}
