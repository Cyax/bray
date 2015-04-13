<?php
	echo("<script>cssLoad('module/mod_menu/css/mod_menu.css');</script>");
	echo("<script>$.getScript('module/mod_menu/js/mod_menu.js');</script>");
?>
				<input type="hidden" name="path" value="<?php echo($ini_array['path']); ?>" />
				<input type="hidden" name="componentPath" value="<?php echo($ini_array['componentPath']); ?>" />
				<input type="hidden" name="modulePath" value="<?php echo($ini_array['modulePath']); ?>" />

				<ul class="menu">
					<li>
						<input type="hidden" name="menu" value="welcome" />
						Accueil
					</li>
					<li>
						<input type="hidden" name="menu" value="mod_customer" />
						Client
					</li>
					<li>
						<input type="hidden" name="menu" value="calendar" />
						Calendrier
					</li>
					<li>
						<input type="hidden" name="menu" value="statistic" />
						Statistique
					</li>
					<li>
						<input type="hidden" name="menu" value="alert" />
						Alerte ()
					</li>
					<li>
						<input type="hidden" name="menu" value="configuration" />
						Configuration
					</li>
				</ul>
