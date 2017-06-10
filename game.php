<?php
	session_start();
	require_once "shop.php";
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
        <div class="box__main">
			<div class="menu__box">
				<div class="usr_box">
					<div class="save">Save</div>
					<div class="logout"><a href="logout.php">Logout</a></div>
					<span class="shop__icon"></span>
				</div>
				<div class="points">Points: 0</div>	
			</div>
				<span class="welcome__text">
						<?php
						if (isset($_SESSION["username"])){
							echo "Hi <span class='nick'>".$_SESSION["username"]."</span>";
						}
						if (empty($_SESSION["username"])){
							echo "Hi Guest";
						}
						?>
						<br>Try to guess My Number</span>
				<input min="0" type="number"></input>
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
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"
			  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
			  crossorigin="anonymous"></script>
	<script src="js_files/game.js">
		points = '<?php $shop = new Shopping; echo $shop->pointsFromBase;?>'
		$('div.points').html(points);
	</script>
    </body>
</html>