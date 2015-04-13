<?php
	$ini_array = parse_ini_file("../../param/conf.ini");
	echo("<script>cssLoad('module/mod_customer/css/mod_customer.css');</script>");
	echo("<script>$.getScript('module/mod_customer/js/mod_customer.js');</script>");
?>

		<form>
			<div id="customer" class="customer">
				<input type="hidden" id="validIcon" name="validIcon" value="<?php echo($ini_array['path']); echo($ini_array['iconPath']); echo($ini_array['validIcon']);?>" />
				<input type="hidden" id="errorIcon" name="errorIcon" value="<?php echo($ini_array['path']); echo($ini_array['iconPath']); echo($ini_array['errorIcon']);?>" />
				<p>
					<input type="hidden" name="inputCustomerId" />
				</p>
				<p>
					<span>Nom:</span>
					<input type="text" name="inputCustomerFirstName" />
					<span id="customerFirstNameCheck"></span>
				</p>
				<p>
					<span>Prénom:</span>
					<input type="text" name="inputCustomerLastName" />
					<span id="customerLastNameCheck"></span>
				</p>
				<p>
					<span>Numéro de téléphone 1:</span>
					<input type="text" name="inputCustomerPhone1" />
					<span id="customerPhone1Check"></span>
				</p>
				<p>
					<span>Numéro de téléphone 2:</span>
					<input type="text" name="inputCustomerPhone2" />
					<span id="customerPhone2Check"></span>
				</p>
				<p>
					<span>Adresse e-mail:</span>
					<input type="text" name="inputCustomerEmail" />
					<span id="customerEmailCheck"></span>
				</p>
				<p>
					<input type="button" name="customerSubmit" value="Valider" />
					<input type="button" name="customerCancel" value="Annuler" />
				</p>
			</div>
		</form>
