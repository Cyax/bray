/**
 * 
 */

var customerValidationTab = new Array("firstName", "lastName", "phone", "email");
var firstNameRegex = /^[a-zA-Z0-9_-\s]{3,30}$/;
var lastNameRegex = /^[a-zA-Z0-9_-\s]{3,30}$/;
var phoneRegex = /^[0-9-()+]{10,20}$/;
var emailRegex = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+.[A-Za-z]{2,4}$/;

function initCustomer() {
	console.log("Customer: initCustomer");
    //Init
	$("input#inputCustomerId").prop("disabled", true);
	$("input#customerSubmit").prop("disabled", true);
    
	//Inputs Events
	$("input").keyup(function() {
		customerValidation();
	});
	
	//Other Events
    $("input#customerSubmit").click(function() {
    	console.log("Customer: Submit");
    });

    $("#customerCancel").click(function() {
    	console.log("Customer: Cancel");
    });
}

function customerValidation(){
	var result = true;
	for( var i=0; i < customerValidationTab.length; i++) {
		checkRegex("input#inputCustomer" + customerValidationTab[i].upperFirstLetter(), "customer" + customerValidationTab[i].upperFirstLetter() + "Check", eval(customerValidationTab[i] + "Regex"));
		
		if(result) {
			try {
				result = $("input#inputCustomer" + customerValidationTab[i].upperFirstLetter()).val().match(eval(customerValidationTab[i] + "Regex")).length != null;
			} catch(err) {
				result = false;
			}
		}
	}
	
	$("input#customerSubmit").prop("disabled", !result);
}
