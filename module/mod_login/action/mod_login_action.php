<?php
	require_once '../../../database/dbClass.php';
	
	function start() {
 		$conf_ini_array = parse_ini_file("../../../param/conf.ini");
		$mod_login_ini_array = parse_ini_file("../conf.ini");
		
		$login = $_POST['login'];
 		$pwd = $_POST['pwd'];
 		$request = $mod_login_ini_array['request_mod_login_login'];
 		$request = str_replace("%0", $login, $request);
 		$request = str_replace("%1", $pwd, $request);
 		echo($request);
 		
 		$db = new dbClass();
 		echo($db->getRow($request));
 		
	}
	
	start();
?>