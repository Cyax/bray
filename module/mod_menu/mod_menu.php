<?php
	$mod_menu_array = parse_ini_file("conf.ini", true);
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
	foreach ($mod_menu_array as $key => $value) {
		if(array_key_exists("sys_value", $value) &&
				array_key_exists("item_0_sys_value", $value) &&
				array_key_exists("item_0_name", $value)) {
			echo("<ul class='subMenu " . $value['sys_value'] . "'>");
			
			$i = 0;
			while(array_key_exists("item_" . $i . "_sys_value", $value) &&
					array_key_exists("item_" . $i . "_name", $value)) {
				echo("<li>");
				echo($value["item_" . $i . "_name"]);
				echo("<input type='hidden' name='menu' value='" . $value['sys_value'] . "' />");
				echo("<input type='hidden' name='paramMenu' value='" . $value["item_" . $i . "_sys_value"] . "' />");
				echo("</li>");
				
				$i++;
			}
			
			echo("</ul>");
		}
	}
?>