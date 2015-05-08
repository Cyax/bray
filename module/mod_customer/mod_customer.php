<?php
	$GLOBALS['ini_array'] = parse_ini_file("../../param/conf.ini");
	$GLOBALS['customer_array'] = parse_ini_file("conf.ini");
	echo("<script>cssLoad('module/mod_customer/css/mod_customer.css');</script>");
	echo("<script>jsLoad('module/mod_customer/js/mod_customer.js');</script>");
?>
			<div id="customer" class="customer">
			<input type="hidden" name="mod_customer_param" value="<?php echo($_POST['param']); ?>" />
			<input type="hidden" name="mod_customer_add_target" value="<?php echo($GLOBALS['customer_array']['ajax_mod_customer_add_target']); ?>" />
			
				<?php
				for ($i=0; $i < $GLOBALS['customer_array']['item_count']; $i++) {
				?>
				<div class="customerLine">
					<div class="customerLabel"><?php echo($GLOBALS['customer_array']['item_' . $i . '_label']);?>&nbsp;:</div>
					<div class="customerInput"><input type="text" name="item_<?php echo($i);?>_input" /><?php if(!$GLOBALS['customer_array']['item_' . $i . '_nullable']){echo("*");}?></div>
					<div id="item_<?php echo($i);?>_check">
						<img id="item_<?php echo($i);?>_icon_ok" class='icon12' src='<?php echo($GLOBALS['ini_array']['path']); echo($GLOBALS['ini_array']['iconPath']); echo($GLOBALS['ini_array']['validIcon']);?>' alt='OK' />
						<img id="item_<?php echo($i);?>_icon_ko" class='icon12' src='<?php echo($GLOBALS['ini_array']['path']); echo($GLOBALS['ini_array']['iconPath']); echo($GLOBALS['ini_array']['errorIcon']);?>' alt='KO' />
					</div>
					<input type="hidden" name="item_<?php echo($i); ?>_sys_value" value="<?php echo($GLOBALS['customer_array']['item_' . $i . '_sys_value']);?>" />
					<input type="hidden" name="item_<?php echo($i); ?>_regex" value="<?php echo($GLOBALS['customer_array']['item_' . $i . '_regex']);?>" />
					<input type="hidden" name="item_<?php echo($i); ?>_nullable" value="<?php echo($GLOBALS['customer_array']['item_' . $i . '_nullable']?'true':'false');?>" />
				</div>
				<?php
				}
				?>
				<p>
					<input type="button" name="customerSubmit" value="Valider" />
					<input type="button" name="customerCancel" value="Annuler" />
				</p>
			</div>
			