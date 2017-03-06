<?php
	if(isset($_GET['address'])) {
		echo "<h2 class=\"text-center\">Êtes-vous sûr de vouloir supprimer cette adresse ?</h1>";
		echo "<form action=\"deleteAddress.php\" method=\"GET\" class=\"text-center\">
				<input type=\"hidden\" name=\"adresse\" value=\"".$_GET['address']."\" />
				<input class=\"btn btn-default\" type=\"submit\" value=\"Oui\">
			</form>";
	} else {
		echo "Une erreur est survenu. Veuillez réessayer.";
	}
?>