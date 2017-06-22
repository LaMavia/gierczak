<?php

	session_start();
	/*if(!isset($_SESSION['loggined'])&&($_SESSION['loggined']==true)) {
		header('location: index.php');
		exit();
	}*/
	require_once "dbconnect.php";
	$connect= @new mysqli($host, $db_user, $db_pass, $db_name);
	if($connect->connect_errno != 0){
		die("There was an error");
	}
	else
	{
		$pkt = $_COOKIE['points'];
		$range = $_COOKIE['range'];
		$pps = $_COOKIE['pps'];
		$multi = $_COOKIE['multi'];
		$json = file_get_contents("json_files/scores.json");
		$obj = json_decode($json, true);
		$id = $_SESSION['id'];
		$sql = $connect->query("UPDATE users SET POINTS = '$pkt', PPS= '$pps' , MULTI = '$multi' , RANGEMAX = '$range' WHERE ID = '$id'");
		$sqlq = $connect->query("SELECT POINTS FROM users WHERE ID = '$id'");
		$row = $sqlq->fetch_assoc();
		$_SESSION["points"] = $row['POINTS'];
		$_SESSION["range"] = $row['RANGEMAX'];
		$_SESSION["pps"] = $row['PPS'];
		$_SESSION["multi"] = $row['MULTI'];
		header('location: game.php');
		$sqlq->free();
		$connect->close();
	}
?>