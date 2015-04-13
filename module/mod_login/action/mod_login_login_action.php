<?php
	$GLOBALS['conf_array'] = parse_ini_file("../../../param/conf.ini");
	$GLOBALS['sql_array'] = parse_ini_file("../../../param/sql.ini");
	$GLOBALS['mod_login_array'] = parse_ini_file("../conf.ini");
	
	require_once('../../../database/dbClass.php');
	
	function start() {
		$login = $_POST['login'];
 		$pwd = $_POST['pwd'];
 		$request = $GLOBALS['mod_login_array']['request_mod_login_login'];
 		$request = str_replace("%0", $login, $request);
 		$request = str_replace("%1", $pwd, $request);
 		
 		$db = new dbClass();
 		
 		header("Content-Type: application/xml");
 		echo($db->getRow($request));
	}
	
	start();
?>