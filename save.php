<?php

	session_start();
	if(!isset($_SESSION['loggined'])&&($_SESSION['loggined']==true)) {
		header('location: index.php');
		exit();
	}
	require_once "dbconnect.php";
	$connect= @new mysqli($host, $db_user, $db_pass, $db_name);
	if($connect->connect_errno != 0) {
		echo "Error: ".connect_errno;
	} else {
			$json = file_get_contents("json_files/scores.json");
			$obj = json_decode($json, true);
			$points = $_SESSION['scores'];
			$pps = $_SESSION[0]["upgrades"][0]["pps"];
			$id = $_SESSION["nick"];
			$sql = $connect->query("UPDATE daneuzytkownikow SET POINTS = '$points' WHERE ID = '$id'");
			$sqlq = $connect->query("SELECT POINTS FROM daneuzytkownikow WHERE ID = '$id'");
			$row = $sqlq->fetch_assoc();
			$_SESSION["points"] = $row['POINTS'];
			header('location: game.php');
			$sqlq->free();
			$connect->close();
	}
?>