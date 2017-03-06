<?php
	if(isset($_GET['mail'])) {
		$mail = $_GET['mail'];

		$mysqli = new mysqli("localhost", "root", "", "BD_BALM");

		if (mysqli_connect_errno()) {
			echo "Echec lors de la connexion à MySQL : (" . $mysqli_connect_errno . ") " . $mysqli_connect_error;
		}

		@$query = "SELECT * FROM CLIENT WHERE mail='".$mail."'";

		if ($rep = $mysqli->query($query)) {
			if($rep->num_rows != 0) {
				if($row = $rep->fetch_assoc()) {
					echo "
						<h3 class=\"sidebar-title\">Changement de vos coordonnées</h3>
						<form action=\"updateDataPerso.php\" method=\"GET\">
						<div class=\"form-group col-md-6\">
							<input type=\"text\" class=\"form-control\" name=\"nom\" id=\"nom\" value=\"".$row['nom_Client']."\" placeholder=\"Nom\" required=\"required\" />
						</div>
						<div class=\"form-group col-md-6\">
				            <input type=\"text\" class=\"form-control\" name=\"prenom\" id=\"prenom\" value=\"".$row['prenom_Client']."\" placeholder=\"Prénom\" required=\"required\" />
			            </div>
			            <div class=\"form-group col-md-6\">
				            <input type=\"mail\" class=\"form-control\" name=\"mail\" id=\"mail\" value=\"".$row['mail']."\" placeholder=\"Email\" required=\"required\" />
			            </div>
			            <div class=\"form-group col-md-6\">
				            <input type=\"text\" class=\"form-control\" name=\"tel\" id=\"tel\" value=\"".$row['tel']."\" placeholder=\"Numéro de téléphone\" required=\"required\" />
			            </div>
			            <input type=\"submit\" class=\"pull-right\" value=\"Mettre à jour\"/>

			            </form>
					";

				}
			} else {
				echo "Une erreur est survenue. Veuillez réessayer.";
			}
		}
	} else {
		header("Location:index.php");
		exit();
	}
?>