<?php
	session_start();

	if(isset($_POST['email']) && isset($_POST['pass'])) {
		$mail = $_POST['email'];
		$password = $_POST['pass'];

		$mysqli = new mysqli("localhost", "root", "", "BD_BALM");

		if (mysqli_connect_errno()) {
			echo "Echec lors de la connexion à MySQL : (" . $mysqli_connect_errno . ") " . $mysqli_connect_error;
		}

		$query = "SELECT mail, password FROM CLIENT WHERE mail='".$mail."' && password='".md5($password)."'";
		if ($reponse = $mysqli->query($query)) {
			if($reponse->num_rows != 0) {
				$query2 = "SELECT nom_Client FROM CLIENT WHERE mail='".$mail."'";

				if ($reponse2 = $mysqli->query($query2)) {
				    if($row = $reponse2->fetch_assoc()) {
						$_SESSION['nom'] = $row["nom_Client"];
						$_SESSION['mail'] = $mail;
						$_SESSION['pass'] = $password;
						$_SESSION[''] = $_SESSION['identifiant'] = array();

						header('Location: index.php');
						exit();
				    } else{
						header('Location: login.php');
						exit();
				    }
				    $reponse2->close();
				}
			} else{
				header('Location: login.php');
				exit();
			}
		
			$reponse->close();
		}

		$mysqli->close();
	} else {
		header('Location: login.php');
		exit();
	}
?>
