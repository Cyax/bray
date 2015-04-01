<?php
	echo("<script>cssLoad('module/mod_login/css/mod_login.css');</script>");
	echo("<script>$.getScript('module/mod_login/js/mod_login.js');</script>");
	echo("<script>$.getScript('module/mod_login/js/md5.js');</script>");
?>
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
				</div>
			</div>