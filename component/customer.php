<?php
	$ini_array = parse_ini_file("../param/conf.ini");
?>

		<form>
			<div id="customer" class="customer">
				<input type="hidden" id="validIcon" name="validIcon" value="<?php echo($ini_array['path']); echo($ini_array['iconPath']); echo($ini_array['validIcon']);?>" />
				<input type="hidden" id="errorIcon" name="errorIcon" value="<?php echo($ini_array['path']); echo($ini_array['iconPath']); echo($ini_array['errorIcon']);?>" />
				<p>
					<span>Identifiant:</span>
					<input id="inputCustomerId" type="text" name="inputCustomerId" />
					<span id="customerIdCheck"></span>
				</p>
				<p>
					<span>Nom:</span>
					<input id="inputCustomerFirstName" type="text" name="inputCustomerFirstName" />
					<span id="customerFirstNameCheck"></span>
				</p>
				<p>
					<span>Prenom:</span>
					<input id="inputCustomerLastName" type="text" name="inputCustomerLastName" />
					<span id="customerLastNameCheck"></span>
				</p>
				<p>
					<span>Numéro de téléphone 1:</span>
					<input id="inputCustomerPhone" type="text" name="inputCustomerPhone" />
					<span id="customerPhoneCheck"></span>
				</p>
				<p>
					<span>Numéro de téléphone 2:</span>
					<input id="inputCustomerPhone2" type="text" name="inputCustomerPhone2" />
					<span id="customerPhone2Check"></span>
				</p>
				<p>
					<span>Adresse e-mail:</span>
					<input id="inputCustomerEmail" type="text" name="inputCustomerEmail" />
					<span id="customerEmailCheck"></span>
				</p>
				<p>
					<input type="button" id="customerSubmit" name="customerSubmit" value="Valider" />
					<input type="button" id="customerCancel" name="customerCancel" value="Annuler" />
				</p>
			</div>
		</form>
