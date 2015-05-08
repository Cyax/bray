<?php
	$GLOBALS['conf_array'] = parse_ini_file("../../../param/conf.ini");
	$GLOBALS['sql_array'] = parse_ini_file("../../../param/sql.ini");
	$GLOBALS['customer_array'] = parse_ini_file("../conf.ini");
	
	require_once('../../../database/dbClass.php');
	require_once '../class/customerClass.php';
	
	function start() {
		$login = $_POST['login'];
 		$pwd = $_POST['pwd'];
		$dataArray = [];
		
		for ($i=0; $i < $GLOBALS['customer_array']['item_count']; $i++) {
			array_push($dataArray, $_POST[$GLOBALS['customer_array']['item_' . $i . '_sys_value']]);
		}
 		
		$customer = new customerClass($login, $pwd, $dataArray); 
		
		if($customer->controlCustomer()) {
			$customer->addToBdd();
		}
		
	}
	
	start();
?>