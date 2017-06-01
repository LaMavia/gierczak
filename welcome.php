<?php
	session_start();
	if(isset($_SESSION["successregister"])) {
		header('location: index.php');
		exit();
	} else {
		unset($_SESSION["successregister"]);
	}
	if(isset($_SESSION["fr_nick"])) unset($_SESSION["fr_nick"]);
	if(isset($_SESSION["fr_email"])) unset($_SESSION["fr_email"]);
	if(isset($_SESSION["fr_regulamin"])) unset($_SESSION["fr_regulamin"]);
	
	if(isset($_SESSION["err_nick"])) unset($_SESSION["err_nick"]);
	if(isset($_SESSION["err_pass"])) unset($_SESSION["err_pass"]);
	if(isset($_SESSION["err_email"])) unset($_SESSION["err_email"]);
	if(isset($_SESSION["err_regulamin"])) unset($_SESSION["err_regulamin"]);
	if(isset($_SESSION["err_captcha"])) unset($_SESSION["err_captcha"]);
	
?>

<!DOCTYPE HTML>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title> Gierczak </title>
        
        <link href="css-less_files/style3.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Inknut+Antiqua" rel="stylesheet"> 
    </head>
    
    <body>
		Dziekujemy za rejestracje w serwisie! Mozesz juz zalogowac sie na swoje konto!<br><br>
		<a href="index.php">Zaloguj sie na swoje konto !</a>
    </body>

</html>