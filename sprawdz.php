<?php
	//start sesji
	session_start();
	$guess = $_POST['guess'];
	//Zgadywanie liczby
	if(!isset($_SESSION["guessed"])) {
		$_SESSION["guessed"] = rand(0,10);
	}
	if ($guess > $_SESSION["guessed"]) {
		$_SESSION["message"] = $guess." Jest za duze !";
		header('location: game.php');
	} 	else if ($guess < $_SESSION["guessed"]) {
		$_SESSION["message"] = $guess." Jest za male !";
		header('location: game.php');
	} 	else {
		$_SESSION["message"] = "Udalo sie";
		$_SESSION["guessed"] = rand(0,10);
		$_SESSION["pointget"]++;
		header('location: game.php');
	}
?>