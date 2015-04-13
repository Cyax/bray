/**
 * 
 */

var customerValidationTab = new Array("firstName", "lastName", "phone1", "phone2", "email");
var firstNameRegex = /^[a-zA-Z0-9_-\s]{3,30}$/;
var lastNameRegex = /^[a-zA-Z0-9_-\s]{3,30}$/;
var phone1Regex = /^[0-9-()+]{10,20}$/;
var phone2Regex = /^[0-9-()+]{10,20}$/;
var emailRegex = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+.[A-Za-z]{2,4}$/;

function initModCustomer() {
    //Init
	$("input[name=customerSubmit]").prop("disabled", true);
    
	//Inputs Events
	$("input").keyup(function() {
		customerValidation();
	});
	
	//Other Events
    $("input[name=customerSubmit]").click(function() {
    	console.log("Customer: Submit");
    });

    $("input[name=customerCancel]").click(function() {
    	console.log("Customer: Cancel");
    });
    
    customerValidation();
}

function customerValidation(){
	var result = true;
	for(var i=0; i < customerValidationTab.length; i++) {
		checkRegex("input[name=inputCustomer" + customerValidationTab[i].upperFirstLetter() + "]", "customer" + customerValidationTab[i].upperFirstLetter() + "Check", eval(customerValidationTab[i] + "Regex"));
		
		if(result) {
			try {
				result = $("input[name=inputCustomer" + customerValidationTab[i].upperFirstLetter() + "]").val().match(eval(customerValidationTab[i] + "Regex")).length != null;
			} catch(err) {
				result = false;
			}
		}
	}
	
	$("input[name=customerSubmit]").prop("disabled", !result);
}

$().ready(function() {
	initModCustomer();
});
