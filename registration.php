<?php
	session_start();
	if (isset($_POST['password'])) {
		$register = true;
		//Sprawdzana Poprawnosc Nickname
		$nickname = $_POST['nickname'];
		if (strlen($nickname)<3 || strlen($nickname)>20) {
			$register = false;
			$_SESSION["err_nick"] = "Nickname powinien zawierac od 3 do 20 znakow. ";
		}
		if (ctype_alnum($nickname)==false) {
			$register = false;
			$_SESSION["err_nick"]= "Nickname powinien skladac sie z liter i cyfr (bez polskich znakow). ";
		}
		//Prawdzanie emaila
		$email = $_POST['email'];
		$rEmail = filter_var($email, FILTER_SANITIZE_EMAIL);
		if (filter_var($rEmail, FILTER_VALIDATE_EMAIL)==false || ($rEmail != $email)) {
			$register = false;
			$_SESSION["err_email"] = "Podaj poprawny adres email. ";
		}
		//Sprawdzanie hasla
		$password = $_POST['password'];
		$repass = $_POST['repassword'];
		if(strlen($password)<8 || strlen($password)>20) {
			$register = false;
			$_SESSION["err_pass"]= "Haslo powinno zawierac od 8 do 20 znakow. ";
		}
		if($password!=$repass) {
			$register = false;
			$_SESSION["err_pass"] = "Hasla nie sa identyczne. ";
		}
		$pass_hash = password_hash($password, PASSWORD_DEFAULT);
		//akceptacja regulaminu
		if(!isset($_POST['regulamin'])) {
			$regster = false;
			$_SESSION["err_regulamin"] = "Potwierdz akceptacje regulaminu. ";
		}
		//Recaptcha
		$captchasecret = "6Le3dyEUAAAAAAd7nO_fgCVBI6j3Bh6AeWk2gyiH";
		$check = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$captchasecret.'&response='.$_POST['g-recaptcha-response']);
		$answer = json_decode($check);
		if ($answer->success==false) {
			$register = false;
			$_SESSION['err_captcha'] = "Potwierdz ze nie jestes robotem. ";
		}
		require_once "dbconnect.php";
		mysqli_report(MYSQLI_REPORT_STRICT);
		try {
			$connect = new mysqli($host, $db_user, $db_pass, $db_name);
			if ($connect->connect_errno!=0) {
				throw new Exception(mysqli_connect_errno());
			}else {
				//czy email juz istnieje
				$result = $connect->query("SELECT ID FROM daneuzytkownikow WHERE EMAIL = '$email'");
				if (!$result) {
					throw new Exception($connect->error);
				}
				$emailCount = $result->num_rows;
				if ($emailCount > 0) {
					$register = false;
					$_SESSION["err_email"] = "Konto z podanym adresem e-mail juz istnieje. ";
				}
				//czy nick juz istnieje
				$result = $connect->query("SELECT ID FROM daneuzytkownikow WHERE USERNAME = '$nickname'");
				if (!$result) {
					throw new Exception($connect->error);
				}
				$usernameCount = $result->num_rows;
				if ($usernameCount > 0) {
					$register = false;
					$_SESSION["err_nick"] = "Konto z podanym nickiem juz istnieje. ";
				}
				//Udana rejestracja
				if ($register == true) {
					$ester_egg="ester_egg";
					$pointsstart="0";
					$ap="0";
					$less = "0";
					if($connect->query("INSERT INTO daneuzytkownikow VALUES (NULL, '$nickname', '$pass_hash', '$ester_egg','$email', '$pointsstart', '$ap','$less')")) {
						$_SESSION["successregister"] = true;
						header('location: welcome.php');
					}else {
						throw new Exception($connect->error);
					}
				}
				$connect->close();
			}
		} catch(Exception $err) {
			echo "Blad serwera, przepraszamy za niedogodnosci";
			echo '<br>Info Develop'.$err; 
		}
	}
?>

<!DOCTYPE HTML>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title> Rejestracja </title>
        
        <link href="style2.css" rel="stylesheet">
        <link href="css/fontello.css" rel="stylesheet">
		
    </head>
    
    <body>
        <form method="post">
			<div class="error__output">
				<?php
					if(isset($_SESSION["err_nick"])) {
						echo $_SESSION["err_nick"];
						unset($_SESSION["err_nick"]);
					}
				?>
				<?php
					if(isset($_SESSION["err_email"])) {
						echo $_SESSION["err_email"];
						unset($_SESSION["err_email"]);
					}
				?>
				<?php
					if(isset($_SESSION["err_pass"])) {
						echo $_SESSION["err_pass"];
						unset($_SESSION["err_pass"]);
					}
				?>
				<?php
					if(isset($_SESSION["err_captcha"])) {
						echo $_SESSION["err_captcha"];
						unset($_SESSION["err_captcha"]);
					}
				?>
				<?php
					if(isset($_SESSION["err_regulamin"])) {
						echo $_SESSION["err_regulamin"];
						unset($_SESSION["err_regulamin"]);
					}
				?>
				</div>
<!--               nick box-->
               <div class="box" id="n">
               <span class="nick">What's your nickname?</span>
                <input  type="text" name="nickname" placeholder="Nazwa Użytkownika">
                   <a href="#email" class="next next_mod icon-right-open"></a>
				   <div class="clear"></div>
				</div>
<!--				e-mail box-->
               <div class="box" id="email">
               <span class="email">What's your e-mail?</span>
                <input  type="text" name="email" placeholder="E-mail" >
				<div class="nav__holder">
                  <a href="#n" class="back icon-left-open"></a>
                  <a href="#pass" class="next icon-right-open"></a>
				  <div class="clear"></div>
				</div>
				</div>
<!--               password box-->
               <div class="box" id="pass">
                   <span class="pass">What's your password?</span>
                <input  type="password"  name="password" placeholder="Hasło">
                <input  type="password"  name="repassword" placeholder="Powtórz Hasło">
                   <div class="nav__holder">
                  	<a href="#email" class="back icon-left-open"></a>
                  	<a href="#check" class="next icon-right-open"></a>
				 	<div class="clear"></div>
				</div>
                </div>
                <!--Checking part -->
				<div class="box" id="check">
				<span class="check">It's only formality</span>
				<div class="check">
                    <div class="regul">
				    <input type="checkbox" name="regulamin"><span>Akceptuję Regulamin</span>
				    </div>
				    <div class="g-recaptcha captcha-mod" data-sitekey="6Le3dyEUAAAAAOn-qg0Dwc8omngvtdPO7w_hDT1f"></div>
				</div> 
                <input type="submit" value="Zarejestruj" class="button-mod">
                <a href="#n" class="back back_mod icon-left-open"></a>
				</div>
				</div>
        </form>
        <div id="loader" class="">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="jquery-scripts.js"></script>
        <script>
            $('#loader').addClass('loading');
            $(window).load(function(){
               $('div#loader').fadeOut(500);
                
            });
        </script>
    </body>

</html>