<?php
	session_start();
?>
<!DOCTYPE HTML>
<html lang="pl">
    <head>
        <title>Gierczak</title>
		<link href="css-less_files/normalize.css" rel="stylesheet">
        <link href="css-less_files/style3.css" rel="stylesheet">
		<link href="css/fontello.css" rel="stylesheet">
    </head>
    <body>
<?php
echo "Witaj ".$_SESSION["username"];
?>
        <div class="box__main">
			<div class="menu__box">
				<div class="usr_box">
					<div class="save"><a href="save.php">Save</a></div>
					<div class="logout"><a href="logout.php">Logout</a></div> 
					<span class="shop__icon"></span>
				</div>
				<div class="points">Points: 0</div>
				
			</div>
				<span class="welcome__text">Try to guess My Number</span>
				<input type="number"></input>
				<div class="guess">Guess</div>
				<div class="hint">Hint</div>
				<div class="shop">
					<div class="shop__box">
						<div class="shop__item" data-item="range">Range: 1-90</div>
						<div class="shop__item" data-item="pps">Points/sec: 0</div>
					</div>
				</div>
				<div class="dev__build">DevBuild</div>
        </div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="js_files/game.js"></script>
    </body>
</html>