<?php
	session_start();
	include("bd.php");
	switch ($_POST['command']) {
		case 'login':
			$login = $_POST['login'];
			$password = $_POST['password'];
			if(!empty($login) && !empty($password)){
				$result = mysql_query("SELECT * FROM user WHERE login='$login'", $db);
				if(!empty($result)){
					$res = mysql_fetch_array($result);
					if($res['password'] == $password){
						$_SESSION['id'] = $res['id'];
						header("Location: /main.php");
						exit();
					}
				}else  exit("Login or password is not pass correct");
			}else  exit("Login or password is not pass correct");
			break;
		case 'register':
			$login = $_POST['login'];
			$password = $_POST['password'];
			if(!empty($login) && !empty($password) && is_string($login) && is_string($password)){
				$result = mysql_query("SELECT login FROM user WHERE login='$login'",$db);
				$row = mysql_fetch_array($result);
				if(empty($row['login'])){
					$result = mysql_query("INSERT INTO user (login, password) VALUES ('$login','$password')");
					echo("Успешно");
				}else exit("Login or password is not pass correct");
			}else exit("Login or password is not pass correct");
	}

?>