<?php
	session_start();

	if(isset($_GET['nom']) && isset($_GET['prenom']) && isset($_GET['mail']) && isset($_GET['tel'])) {
		$nom = $_GET['nom'];
		$prenom = $_GET['prenom'];
		$mail = $_GET['mail'];
		$tel = $_GET['tel'];

		$mysqli = new mysqli("localhost", "root", "", "BD_BALM");

		if (mysqli_connect_errno()) {
			echo "Echec lors de la connexion à MySQL : (" . $mysqli_connect_errno . ") " . $mysqli_connect_error;
		}

		$query = "UPDATE Client SET nom_Client='".$nom."', prenom_Client='".$prenom."', mail='".$mail."', tel='".$tel."' 
			WHERE mail='".$_SESSION['mail']."'";
		
		if($mysqli->query($query)) {
			$_SESSION['nom'] = $nom;
			$_SESSION['mail'] = $mail;

			header("Location:account.php");
			exit();
		}
	} else {
		header("Location:index.php");
		exit();
	}
?>