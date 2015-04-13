<?php
	$mod_menu_array = parse_ini_file("menuConf.ini", true);
	$mod_submenu_array = parse_ini_file("subMenuConf.ini", true);
	echo("<script>cssLoad('module/mod_menu/css/mod_menu.css');</script>");
	echo("<script>$.getScript('module/mod_menu/js/mod_menu.js');</script>");
?>
				<input type="hidden" name="path" value="<?php echo($ini_array['path']); ?>" />
				<input type="hidden" name="componentPath" value="<?php echo($ini_array['componentPath']); ?>" />
				<input type="hidden" name="modulePath" value="<?php echo($ini_array['modulePath']); ?>" />
				<ul class="menu">
<?php 
	foreach ($mod_menu_array as $key => $value) {
		echo("<li>");
		echo($key);
		if(array_key_exists("sys_value", $value)) {
			echo("<input type='hidden' name='menu' value='" . $value['sys_value'] . "' />");
		} else {
			echo("<input type='hidden' name='menu' value='' />");
		}
		echo("</li>");
	}	
?>
				</ul>
<?php
foreach ($mod_submenu_array as $key => $value) {
	foreach ($mod_menu_array as $mykey => $myvalue) {
		if($key == $mykey) {
			echo("<ul class='subMenu " . $myvalue['sys_value'] . "'>");
			foreach ($value as $v) {
				echo("<li>" . $v . "</li>");
			}
			echo("</ul>");
		}
	}
}
?>