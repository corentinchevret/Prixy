<?php 
session_start();	

	//Suppression des variables de session et de la session
	//var_dump($_SESSION);
	$_SESSION = array();	
	session_destroy();	

	//var_dump($_SESSION['pseudonyme']);
	//var_dump($_COOKIE);

	// Suppression des cookies de connexion automatique
	/*setCookie('pseudo', false, (time() - 3600), '/');
	setcookie('pass_hache', false, (time() - 3600), '/');
	setcookie(session_name(), '', time() - 42000);
	//unset($_COOKIE['pseudo']);*/
	//unset($_COOKIE['pass_hache']);	
	setcookie('PHPSESSID', false, (time() - 3600), '/');
	unset($_COOKIE['PHPSESSID']);
	header('location: index.php');
	exit;
?>
