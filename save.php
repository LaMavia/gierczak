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
			$pkt = $_SESSION["pointget"];
			$id = $_SESSION["id"];
			$sql = $connect->query("UPDATE daneuzytkownikow SET POINTS = POINTS +'$pkt' WHERE ID = '$id'");
			$sqlq = $connect->query("SELECT POINTS FROM daneuzytkownikow WHERE ID = '$id'");
			$row = $sqlq->fetch_assoc();
			$_SESSION["points"] = $row['POINTS'];
			$_SESSION["pointget"] = 0;
			header('location: game.php');
			$sql->free();
			$sqlq->free();
			$connect->close();
	}
?>