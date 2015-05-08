/**
 * 
 */

$().ready(function() {
	initModCustomer();
});

function initModCustomer() {
    //Init
	$("input[name=customerSubmit]").prop("disabled", true);
	$("img.icon12").hide();
    
	//Inputs Events
	$("input[name$='input']").keyup(function(event) {
		customerFieldValidation(event.currentTarget.name);
		customerFormValidation();
	});
	
	//Other Events
    $("input[name=customerSubmit]").click(function() {
    	console.log("Customer: Submit");
    	customerAddCustomer();
    });

    $("input[name=customerCancel]").click(function() {
    	console.log("Customer: Cancel");
    });
}

function customerFieldValidation(eltName) {
	if($("input[name=" + eltName + "]").val() == "") {
		$("input[name=" + eltName + "]").parent().parent().find("img[alt=KO]").hide();
		$("input[name=" + eltName + "]").parent().parent().find("img[alt=OK]").hide();
	} else if($("input[name=" + eltName + "]").val().match($("input[name=" + eltName + "]").parent().parent().find("input[name$=regex]").val())) {
		$("input[name=" + eltName + "]").parent().parent().find("img[alt=KO]").hide();
		$("input[name=" + eltName + "]").parent().parent().find("img[alt=OK]").show();
	} else {
		$("input[name=" + eltName + "]").parent().parent().find("img[alt=OK]").hide();
		$("input[name=" + eltName + "]").parent().parent().find("img[alt=KO]").show();
	}
	
}

function customerFormValidation() {
	var boolTest = true;
	
	$.each($("div[id$=check]"), function( key, value ) {
		if($("input[name=item_" + key + "_nullable").val()!="true") {
			boolTest &= $(value).find("img.icon12:visible").attr("alt") == "OK";
		}
	});
	$("input[name=customerSubmit]").prop("disabled", !boolTest);
}

function customerAddCustomer() {
	var login = $("input[name='mod_login_login']").val();
	var pwd = CryptoJS.MD5($("input[name='mod_login_pwd']").val());
	
	var data = "({login: '" + login + "', pwd: '" + pwd + "', ";
	var dataLength = $("div.customerLine").length -1;
	var dataObject;
	
	for(var i = 0; i <= dataLength; i++) {
		var sysName = $("input[name=item_" + i + "_sys_value]").val().trim();
		var value = $("input[name=item_" + i + "_input]").val().trim();
		var elt = sysName + ":'" + value + "'";
		
		data += elt;
		
		if(i != dataLength) {data += ",";}

	}
	data += "})";
	
	dataObject = eval(data);
	
	$.ajax({
		method: "POST",
		url: $("input[name='mod_customer_add_target']").val(),
		dataType : 'xml',
		data: eval(data)
	})
	.done(function(data) {
		alert("Done");
	})
	.fail(function( jqXHR, textStatus ) {
		alert( "La requête à échoué: " + textStatus );
	});
}