<?php
	if(isset($_GET['adresse'])) {
		$adresse = $_GET['adresse'];
		$mysqli = new mysqli("localhost", "root", "", "BD_BALM");

		if (mysqli_connect_errno()) {
			echo "Echec lors de la connexion à MySQL : (" . $mysqli_connect_errno . ") " . $mysqli_connect_error;
		}

		$query = "DELETE FROM Adresse WHERE num_Adresse='".$adresse."'";

		if ($mysqli->query($query)) {
			header("Location:account.php");
			exit();
		}
	}
?>