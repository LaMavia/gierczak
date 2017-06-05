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
					<div class="logout"><a href="logout.php">Logout</a></div> 
					<span class="icon-basket shop__icon"></span>
				</div>
				<div class="points">Points: 0</div>
				
			</div>
				<span class="welcome__text">Try to guess My Number ;)</span>
				<input type="number"></input>
				<div class="guess">Guess</div>
				<div class="hint">Hint</div>
				<div class="shop">
					<div class="shop__box">
						<div>Lorem ipsum</div>
						<div>dolor sit</div>
						<div>amet</div>
					</div>
				</div>
        </form>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="js_files/game.js"></script>
    </body>
</html>