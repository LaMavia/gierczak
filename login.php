<?php
	//startujemy sesje
	session_start();
	//sprawdzamy czy uzytkownik jest juz zalogowany
	if(!isset($_POST['login']) || (!isset($_POST['password']))) {
		header('location: index.php');
		exit();
	}
	require_once "dbconnect.php";
	//pobieramy dane wejsciowe do bazy danych
	try {
		$connection = new mysqli($host, $db_user, $db_pass, $db_name);
		//sprawdzamy polaczenie do bazy
		if ($connection->connect_errno!=0) {
		//wypisujemy blad przy nieudanym polaczeniu
			throw new Exception(mysqli_connect_errno());
		} else {   
			//Wyciagamy zmienne z pol logowania
			$login = $_POST['login'];
			$password = $_POST['password'];
			//zabespieczanie przed SQL injection
			$login = htmlentities($login,ENT_QUOTES,"UTF-8");
			//piszemy i sprawdzamy poprawnosc zapytania i dodatkowo zabezpieczamy skrypt
			if($result=@$connection->query(sprintf("SELECT * FROM users WHERE USERNAME='%s'",
			mysqli_real_escape_string($connection,$login)))) {
				$usersCount = $result->num_rows;
				//sprawdzamy poprawnosc danych logowania do strony
				if($usersCount>0) {
					//przechwycenie danych z tabeli w bazie danych
					$row = $result->fetch_assoc();
					if (password_verify($password,$row['PASSWORD'])) {
						$_SESSION["loggined"] = true;
						$_SESSION["id"] = $row['ID'];
						$_SESSION["username"] = $row['USERNAME'];
						$_SESSION["email"] = $row['EMAIL'];
						$_SESSION["points"] = $row['POINTS'];
						$_SESSION["pps"] = $row['PPS'];
						$_SESSION["multi"] = $row['MULTI'];
						//czyscimy zapytanie
						unset($_SESSION["niezalogowano"]);
						$result->close();
						//przekierowywujemy urzytkownika
						header('location: game.php');
					} else {
						$_SESSION["niezalogowano"] = '<div id="niezalmess" style="color:red">Nieprawidłowy login lub hasło!</div>';
						header('Location: index.php');
					}
				} else {
					$_SESSION["niezalogowano"] = '<div id="niezalmess" style="color:red">Nieprawidłowy login lub hasło!</div>';
					header('Location: index.php');
				}
			} else {
				throw new Exception;
			}
			//zamykamy polaczenie do bazy danych   
			$connection->close();
		}
	} catch (Exception $err) {
		echo "Blad serwera, przepraszamy za niedogodnosci !";
		echo '<br>Info Develop'.$err; 
	}
?>