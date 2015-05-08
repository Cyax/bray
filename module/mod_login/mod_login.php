<?php
	$GLOBALS['mod_login_ini_array'] = parse_ini_file("module/mod_login/conf.ini");
	echo("<script>cssLoad('module/mod_login/css/mod_login.css');</script>");
	echo("<script>$.getScript('module/mod_login/js/mod_login.js');</script>");
	echo("<script>$.getScript('module/mod_login/js/md5.js');</script>");
?>
			<input type="hidden" name="mod_login_logged" value="false" />
			<input type="hidden" name="mod_login_login_target" value="<?php echo($GLOBALS['mod_login_ini_array']['ajax_mod_login_login_target']); ?>" />
			<input type="hidden" name="mod_login_pwd_target" value="<?php echo($GLOBALS['mod_login_ini_array']['ajax_mod_login_pwd_target']); ?>" />
			<div class="mod_login">
				<div class="mod_login_field mod_login_login_field">
					<div class="mod_login_label">
						Identifiant:
					</div>
					<div class="mod_login_input">
						<input type="text" name="mod_login_login" value="" />
					</div>
				</div>
				<div class="mod_login_field mod_login_login_field">
					<div class="mod_login_label">
						Mot de passe:
					</div>
					<div class="mod_login_input">
						<input type="password" name="mod_login_pwd" value="" />
					</div>
				</div>
				<div class="mod_login_field mod_login_login_field">
					<input type="button" name="mod_login_valid" value="Ok" />
					<input type="button" name="mod_login_reset" value="Réinitialiser" />
				</div>
				<div class="mod_login_field mod_login_login_field">
					<input type="button" name="mod_login_disconnect" value="Se déconnecter" />
					<input type="button" name="mod_login_change_pwd" value="Changer de mot de passe" />
				</div>
				<div class="mod_login_field mod_login_newpwd_field">
					<div class="mod_login_label">
						Nouv passe:
					</div>
					<div class="mod_login_input">
						<input type="password" name="mod_login_chpwd_pwd1" value="" />
					</div>
				</div>
				<div class="mod_login_field mod_login_newpwd_field">
					<div class="mod_login_label">
						Nouv passe:
					</div>
					<div class="mod_login_input">
						<input type="password" name="mod_login_chpwd_pwd2" value="" />
					</div>
				</div>
				<div class="mod_login_field">
					<input type="button" name="mod_login_chpwd_valid" value="Ok" />
					<input type="button" name="mod_login_chpwd_cancel" value="Annuler" />
				</div>
			</div>
