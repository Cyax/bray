/**
 * script for the module: mod_login
 */

/**
 * Initialisation
 */
$().ready(function() {
	/**
	 * Hide fields
	 */
	$("input[name='mod_login_disconnect']").hide();
	$("input[name='mod_login_change_pwd']").hide();
	$("div.mod_login_newpwd_field").hide();
	$("input[name='mod_login_chpwd_valid']").hide();
	$("input[name='mod_login_chpwd_cancel']").hide();
	
	/**
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
	
	/**
	 * Disconnect click events
	 */
	$("input[name='mod_login_disconnect']").click(function() {
		mod_login_disconnect();
	});
	
	/**
	 * Change pwd click events
	 */
	$("input[name='mod_login_change_pwd']").click(function() {
		mod_login_show_newpwd_fields();
	});
	
	/**
	 * Valid change pwd click events
	 */
	$("input[name='mod_login_chpwd_valid']").click(function() {
		mod_login_chpwd_valid();
	});
	
	/**
	 * Cancel change pwd click events
	 */
	$("input[name='mod_login_chpwd_cancel']").click(function() {
		mod_login_chpwd_cancel();
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
		method: "POST",
		url: $("input[name='mod_login_login_target']").val(),
		dataType : 'xml',
		data: { login: ""+login+"", pwd: ""+pwd+"" }
	})
	.done(function(data) {
		if( $(data).find("result").find("count").text() == 1) {
			mod_login_validation_show();
		} else {
			alert("Utilisateur non trouvé");
		}
	})
	.fail(function( jqXHR, textStatus ) {
		  alert( "La requête à échoué: " + textStatus );
	});
}

function mod_login_validation_show() {
	$("input[name='mod_login_login']").prop("disabled", true);
	$("input[name='mod_login_pwd']").prop("disabled", true);
	$("input[name='mod_login_valid']").prop("disabled", true);
	$("input[name='mod_login_reset']").prop("disabled", true);
	$("input[name='mod_login_valid']").hide();
	$("input[name='mod_login_reset']").hide();
	$("input[name='mod_login_disconnect']").show();
	$("input[name='mod_login_change_pwd']").show();
	$("input[name='mod_login_logged']").val("true");
}

function mod_login_disconnect() {
	$("input[name='mod_login_login']").prop("disabled", false);
	$("input[name='mod_login_pwd']").prop("disabled", false);
	$("input[name='mod_login_login']").val("");
	$("input[name='mod_login_pwd']").val("");
	$("input[name='mod_login_chpwd_pwd1']").val("");
	$("input[name='mod_login_chpwd_pwd2']").val("");
	$("input[name='mod_login_valid']").prop("disabled", false);
	$("input[name='mod_login_reset']").prop("disabled", false);
	$("input[name='mod_login_valid']").show();
	$("input[name='mod_login_reset']").show();
	$("input[name='mod_login_disconnect']").hide();
	$("input[name='mod_login_change_pwd']").hide();
	$("input[name='mod_login_logged']").val("false");
}

function mod_login_show_newpwd_fields() {
	$("div.mod_login_newpwd_field").show();
	$("input[name='mod_login_chpwd_valid']").show();
	$("input[name='mod_login_chpwd_cancel']").show();
	
	$("div.mod_login_login_field").hide();
}

function mod_login_chpwd_valid() {
	var login = $("input[name='mod_login_login']").val();
	var pwd = CryptoJS.MD5($("input[name='mod_login_pwd']").val());
	var newPwd1 = $("input[name='mod_login_chpwd_pwd1']").val();
	var newPwd2 = $("input[name='mod_login_chpwd_pwd2']").val();
	var newPwd = CryptoJS.MD5($("input[name='mod_login_chpwd_pwd1']").val());
	
	console.log("newPwd1: " + newPwd1 + " \rnewPwd2: " + newPwd2);
	
	if(newPwd1 != newPwd2) {
		console.log("newPwd1: " + newPwd1 + " \rnewPwd2: " + newPwd2);
		alert("Les mots de passes ne correspondent pas.");
	} else {
		$.ajax({
			method: "POST",
			url: $("input[name='mod_login_pwd_target']").val(),
			dataType : 'xml',
			data: { newPwd: ""+newPwd+"",login: ""+login+"", pwd: ""+pwd+"" }
		})
		.done(function(data) {
			mod_login_chpwd_cancel();
		})
		.fail(function( jqXHR, textStatus ) {
			  alert( "La requête à échoué: " + textStatus );
		});
	}
}

function mod_login_chpwd_cancel() {
	$("div.mod_login_newpwd_field").hide();
	$("input[name='mod_login_chpwd_valid']").hide();
	$("input[name='mod_login_chpwd_cancel']").hide();
	
	$("div.mod_login_login_field").show();
	
	$("input[name='mod_login_chpwd_pwd1']").val("");
	$("input[name='mod_login_chpwd_pwd2']").val("");
}