<?php
	session_start();

	if(isset($_GET['album'])) {
		$id_Album = $_GET['album'];
		$_SESSION['identifiant'][] = $id_Album;
		
		header("Location:cart.php");
		exit();
	} else{
		header("Location:index.php");
		exit();
	}
?>