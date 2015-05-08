<?php
	require_once 'database/dbClass.php';

	$GLOBALS['ini_array'] = parse_ini_file("param/conf.ini");
	$GLOBALS['sql_array'] = parse_ini_file("param/sql.ini");
?>
<!doctype html>
<html lang="fr">
	<head>
<?php include('component/head.php');?>
	</head>
	<body>
<?php include('component/body.php');?>
	</body>
</html>
