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
		
		//Usuń komentarze jeśli będzie działać
			/*if (isset($_POST["userID"])){
            $nick = $_POST["userID"] or $_REQUEST["userID"];
            $enNick = json_encode($nick);
            echo $enNick;
			}
			
			if(isset($_POST["userPoints"])){
			$points = $_POST["userPoints"] or $_REQUEST["userPoints"];
			$enPoints =	json_encode($points);
			echo $enPoints;
			}

			if(isset($_POST["userUpgrades"])){
			$upgrades = $_POST["userUpgrades"] or $_REQUEST["userUpgrades"];
			$enUpgrades = json_encode($upgrades);
			echo $enUpgrades;
			}*/
			$c = $_COOKIE;
			if(isset($c["nick"]) && isset($c["points"])&&isset($c["upgrades"])){
			$nick = $_COOKIE["nick"];
			$points = $_COOKIE["points"];
			$upgrades = $_COOKIE["upgrades"];

			echo $nick.$points.$upgrades;
			}



			if($_COOKIE) {
			  print_r($_COOKIE);     //print all cookie
			}
			else
			{
			   echo "COOKIE is not set";    
			}



		
		/*$json = file_get_contents("json_files/scores.json");
		$obj = json_decode($json, true);
		$sql = $connect->query("UPDATE users SET POINTS = '$enPoints' WHERE USERNAME = '$enNick'");
		$sqlq = $connect->query("SELECT POINTS FROM users WHERE USERNAME = '$enNick'");
		 $row = $sqlq->fetch_assoc();
		 $_SESSION["points"] = $row['POINTS'];
		//header('location: game.php');
		$sqlq->free();
		$connect->close();*/
	}
?>



<html>
	<head>
		<script src="https://code.jquery.com/jquery-3.2.1.min.js"
			  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
			  crossorigin="anonymous">
	</script>

<script>
	$.ajax({
		url: "game.php",
		type: "GET",
		data:{
			"userID":userID,
			"useerPoints":userPoints,
			"userUpgrades":userUpgrades
		},
		success: function (resp){
			console.log(resp);
		},
		error: function(ress){
			console.log(ress);
		}
	})
</script>
	</head>
	<body></body>
</html>
<?php 
die();
?>