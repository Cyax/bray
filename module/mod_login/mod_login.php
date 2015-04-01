<?php
	$mod_login_ini_array = parse_ini_file("module/mod_login/conf.ini");
	echo("<script>cssLoad('module/mod_login/css/mod_login.css');</script>");
	echo("<script>$.getScript('module/mod_login/js/mod_login.js');</script>");
	echo("<script>$.getScript('module/mod_login/js/md5.js');</script>");
?>
			<input type="hidden" name="mod_login_ajax_target" value="<?php echo($mod_login_ini_array['ajax_target']); ?>" />
			<div class="mod_login">
				<div class="mod_login_field">
					<div class="mod_login_label">
						Identifiant:
					</div>
					<div class="mod_login_input">
						<input type="text" name="mod_login_login" value="" />
					</div>
				</div>
				<div class="mod_login_field">
					<div class="mod_login_label">
						Mot de passe:
					</div>
					<div class="mod_login_input">
						<input type="password" name="mod_login_pwd" value="" />
					</div>
				</div>
				<div class="mod_login_field">
					<input type="button" name="mod_login_valid" value="Ok" />
					<input type="button" name="mod_login_reset" value="Réinitialiser" />
					<span id="mod_login_connected_label">Connecté en tant que: </span>
					<span id="mod_login_connected_name"></span>
					
				</div>
				<div class="mod_login_field">
					<input type="button" name="mod_login_disconnect" value="Se déconnecter" />
					<input type="button" name="mod_login_change_pwd" value="Changer de mot de passe" />
				</div>
			</div>