<?php
	session_start();
?>
<!DOCTYPE HTML>
<html lang="pl">
    <head>
        <title>Gierczak</title>
        <link href="css-less_files/style3.css" rel="stylesheet">
    </head>
    <body>
<?php
echo "Witaj ".$_SESSION["username"];
?>
        <form class="box__main" action="sprawdz.php" method="post">
			<input type="number"></input>
        </form>
		<div id="save"><a href="save.php">Save</a></div>


		<?php
	//hint
	if(isset($_SESSION["message"])) {
		echo '<div id="hint">'.$_SESSION["message"]."</div>"; 
	}	
	echo '<div id="wyloguj"><a href="logout.php">Logout</a></div>';
	//your score
	if (isset($_SESSION["points"])) {
		if (!isset($_SESSION["pointget"])) {
			$_SESSION["pointget"] = 0;
		}
		$score = $_SESSION["points"]+$_SESSION["pointget"];
		echo $score;
	}
?>
	<script src="game.js"></script>
    </body>
</html>