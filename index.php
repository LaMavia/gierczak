<?php
	session_start();
	if(isset($_SESSION["loggined"])&&($_SESSION["loggined"]==true)) {
		header('location: game.php');
		exit();
	}
?>

<!DOCTYPE HTML>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title> Gierczak </title>
        
        
        <link href="style.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Inknut+Antiqua" rel="stylesheet"> 
    </head>
    
    <body>
       <div class="reg__box">
            <div class="reg__link">
		        <a href="registration.php">Zarejestruj Się</a>
            </div>
            <div class="reg__after icon-up-open"></div>
        </div>
        <form action="login.php" method="post">
           <div class="login">
               <span>Login to your account</span>
                <input id="log" type="text" name="login" placeholder="Login">
                <input id="log" type="password" name="password" placeholder="Haslo">
                <input class="ent" type="submit" value="Zaloguj">
            </div>
        </form>
        <div class="error">
<?php
        if(isset($_SESSION["niezalogowano"])){
			echo '<div class="errnolog>'.$_SESSION["niezalogowano"].'</div></div>';
        }
?>
   </div>
   <script src="scripts.js"></script>
    </body>

</html>