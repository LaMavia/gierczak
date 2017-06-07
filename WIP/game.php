<?php
	session_start();
?>
<!DOCTYPE HTML>
<html lang="pl">
    <head>
        <title>Gierczak</title>
		<link href="css-less_files/normalize.css" rel="stylesheet">
        <link href="css-less_files/style3.css" rel="stylesheet">
    </head>
    <body>
<?php
echo "Witaj ".$_SESSION["username"];
?>
        <form class="box__main" action="sprawdz.php" method="post">
			<div class="menu__box">
				<div class="usr_box">
					<div class="save"><a href="save.php">Save</a></div>
					<?php echo '<div class="logout"><a href="logout.php">Logout</a></div>'; ?>
					<?php echo '<span class="usr__name">'.$_SESSION['username'].'</span>'; ?>
				</div>
				<div class="points">Points: 0</div>
				
			</div>
				<input type="number"></input>
				<div class="guess">Guess</div>
				<div class="hint">Hint</div>
				<div class="shop">
					<span class="icon-basket shop__icon"></span>
					<div class="shop__box"></div>
				</div>
						<?php
						//Wynik
						if (isset($_SESSION["points"])) {
						 	if (!isset($_SESSION["pointget"])) {
								$_SESSION["pointget"] = 0;
							}
							$score = $_SESSION["points"]+$_SESSION["pointget"];
							echo $score;
						}
						?>
        </form>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="js_files/game.js"></script>
    </body>
</html>