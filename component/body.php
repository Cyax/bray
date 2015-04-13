<?php
	$moduleTitlePath = "module/mod_title/mod_title.php";
	$moduleMenuPath = "module/mod_menu/mod_menu.php";
	$moduleLoginPath = "module/mod_login/mod_login.php";
?>
		<div>
			<div class="title">
<?php require_once($moduleTitlePath);?>
			</div>
			<div class="menu">
<?php require_once($moduleMenuPath);?>
			</div>
			<div id="content">
			</div>
			<!-- mod_login -->
<?php require_once($moduleLoginPath);?>
		</div>
