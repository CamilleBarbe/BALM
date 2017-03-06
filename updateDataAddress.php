<?php
	if(isset($_GET['numero']) && isset($_GET['rue']) && isset($_GET['ville']) && isset($_GET['cp']) && isset($_GET['adresse'])) {
		$numAdresse = $_GET['adresse'];
		$numero = $_GET['numero'];
		$rue = $_GET['rue'];
		$complement = $_GET['complement'];
		$ville = $_GET['ville'];
		$cp = $_GET['cp'];

		$mysqli = new mysqli("localhost", "root", "", "BD_BALM");

		if (mysqli_connect_errno()) {
			echo "Echec lors de la connexion à MySQL : (" . $mysqli_connect_errno . ") " . $mysqli_connect_error;
		}

		$queryUpdate = "UPDATE Adresse SET numero=".$numero.", rue='".$rue."', complement='".$complement."', ville='".$ville."', cp='".$cp."' 
			WHERE num_Adresse='".$numAdresse."'";

		if ($mysqli->query($queryUpdate)) {
			header("Location:account.php");
			exit();
		}
	} else {
		header("Location:index.php");
		exit();
	}
?>