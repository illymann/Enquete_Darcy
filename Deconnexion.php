<?php
	session_start();
	$_SESSION['session'] = NULL;//On vide le tableau de session
	session_destroy(); //On détruit la session
	header('Location:index.php');//On redirige vers la page de connexion
	exit();
?>