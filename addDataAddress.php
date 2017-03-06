<?php
	if(isset($_GET['numero']) && isset($_GET['rue']) && isset($_GET['ville']) && isset($_GET['cp']) && isset($_GET['mail'])) {
		$mail = $_GET['mail'];
		$numero = $_GET['numero'];
		$rue = $_GET['rue'];
		$complement = $_GET['complement'];
		$ville = $_GET['ville'];
		$cp = $_GET['cp'];

		$mysqli = new mysqli("localhost", "root", "", "BD_BALM");

		if (mysqli_connect_errno()) {
			echo "Echec lors de la connexion à MySQL : (" . $mysqli_connect_errno . ") " . $mysqli_connect_error;
		}

		$queryNumClient = "SELECT num_Client FROM Client WHERE mail='".$mail."'";

		if ($rep = $mysqli->query($queryNumClient)) {
			if($rep->num_rows != 0) {
				if($row = $rep->fetch_assoc()) {
					$queryInsert = "INSERT INTO Adresse(numero, rue, complement, cp, ville, id_Client) 
						VALUES(".$numero.", '".$rue."', '".$complement."', '".$cp."', '".$ville."', ".$row['num_Client'].")";

					if($mysqli->query($queryInsert)) {
						$_SESSION['nom'] = $nom;
						$_SESSION['mail'] = $mail;

						header("Location:account.php");
						exit();
					}
				}
			}
		}
	} else {
		header("Location:index.php");
		exit();
	}
?>