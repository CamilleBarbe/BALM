<?php
	session_start();

	if(isset($_SESSION['identifiant']) && isset($_GET['album'])) {
		$tab = array();
		$found = false;

		for($i = 0; $i < count($_SESSION['identifiant']); $i++) {
			if($found) {
				if($_SESSION['identifiant'][$i] != $_GET['album']) {
					$tab[$i-1] = $_SESSION['identifiant'][$i];
				}
			} else {
				if($_SESSION['identifiant'][$i] != $_GET['album']) {
					$tab[$i] = $_SESSION['identifiant'][$i];
				} else {
					$found = true;
				}
			}
		}

		$_SESSION['identifiant'] = $tab;

		header("Location:cart.php");
		exit();
	} else{
		header("Location:index.php");
		exit();
	}
?>