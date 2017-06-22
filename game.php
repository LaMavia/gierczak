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
					<a target="_blank" href="save.php"><div class="save">Save</div></a>
					<div class="logout"><a href="logout.php">Logout</a></div>
					<span class="shop__icon">^</span>
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
				<div class="media">
					<div class="media__button">+</div>
					<div class="media__container">
						<div class="media__container__box">
							<span class="media__container__box_mainText">Share on</span>
							<div class="media__container__box__medias">
								<div class="media__container__box__medias_fb">Fb</div>
								<div class="media__container__box__medias_tw">Tw</div>
							</div>
						</div>
					</div>
				</div>
				<div class="dev__build">DevBuild</div>
				<div class="shortcuts">
					<span class="shortcuts__shop">"S"-Shop</span>
					<span class="shortcuts__media">"M"-Media</span>
				</div>
        </div>
		<!-- W tym miejscu jak umiesz to przechwyc wartosc z tego inputa -->
		<form>
			<input type="hidden" value=<?php echo $_SESSION['points']?>>
			<input type="hidden" value=<?php echo $_SESSION['pps']?>>
			<input type="hidden" value=<?php echo $_SESSION['multi']?>>
			<input type="hidden" value=<?php echo $_SESSION['range']?>>
		</form>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"
			  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
			  crossorigin="anonymous">
	</script>
	<script src="js_files/js.cookie.js"></script>
	<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId            : 'your-app-id',
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v2.9'
    });
    FB.AppEvents.logPageView();
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

	<script src="js_files/game.js">
		points = '<?php $shop = new Shopping; echo $shop->pointsFromBase;?>'
		$('div.points').html(points);
	</script>
    </body>
</html>