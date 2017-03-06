<?php
	if(isset($_GET['address'])) {
		$address = $_GET['address'];

		$mysqli = new mysqli("localhost", "root", "", "BD_BALM");

		if (mysqli_connect_errno()) {
			echo "Echec lors de la connexion à MySQL : (" . $mysqli_connect_errno . ") " . $mysqli_connect_error;
		}

		@$query = "SELECT numero, rue, complement, ville, cp FROM Adresse WHERE num_Adresse='".$address."'";

		if ($rep = $mysqli->query($query)) {
			if($rep->num_rows != 0) {
				if($row = $rep->fetch_assoc()) {
					echo "
						<h3 class=\"sidebar-title\">Changement d'adresse</h3>
						<form action=\"updateDataAddress.php\" method=\"GET\">
							<div class=\"form-group col-md-6\">
								<input type=\"text\" class=\"form-control\" name=\"numero\" id=\"numero\" value=\"".$row['numero']."\" placeholder=\"Numéro\" required=\"required\" />
							</div>
							<div class=\"form-group col-md-6\">
				            	<input type=\"text\" class=\"form-control\" name=\"rue\" id=\"rue\" value=\"".$row['rue']."\" placeholder=\"Rue\" required=\"required\" />
				            </div>
				            <div class=\"form-group col-md-6\">
				            	<input type=\"mail\" class=\"form-control\" name=\"complement\" id=\"complement\" value=\"".$row['complement']."\" placeholder=\"Complément\" required=\"required\" />
				            </div>
				            <div class=\"form-group col-md-6\">
				            	<input type=\"text\" class=\"form-control\" name=\"ville\" id=\"ville\" value=\"".$row['ville']."\" placeholder=\"Ville\" required=\"required\" />
				            </div>
				            <div class=\"form-group col-md-6\">
				            	<input type=\"text\" class=\"form-control\" name=\"cp\" id=\"cp\" value=\"".$row['cp']."\" placeholder=\"Code postal\" required=\"required\" />
				            </div>
				            <input type=\"hidden\" name=\"adresse\" id=\"adresse\" value=\"".$address."\" />
				            <input type=\"submit\" class=\"pull-right\" value=\"Mettre à jour\"/>
			            </form>
					";
				}
			} else {
				echo "Problème avec la base de données.";
			}
		}
	} else {
		echo "Une erreur est survenue. Veuillez réessayer.";
	}
?>