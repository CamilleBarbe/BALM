<?php
	session_start();

	if(isset($_POST['pass1']) && isset($_POST['pass2'])) {
		$pass1 = md5($_POST['pass1']);
		$pass2 = md5($_POST['pass2']);

		if($pass1 == $pass2) {
			$mysqli = new mysqli("localhost", "root", "", "BD_BALM");

			if (mysqli_connect_errno()) {
				echo "Echec lors de la connexion à MySQL : (" . $mysqli_connect_errno . ") " . $mysqli_connect_error;
			}

			$queryUpdate = "UPDATE Client SET password='".$pass1."' WHERE mail='".$_SESSION['mail']."'";

			if ($mysqli->query($queryUpdate)) {
				header("Location:account.php");
				exit();
			} else {
				header("Location:cart.php");
				exit();
			}	
		}		
	} else {
		header("Location:index.php");
		exit();
	}
?>