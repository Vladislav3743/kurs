<?php
	session_start();

	include("bd.php");
	switch ($_POST['command']) {
		case 'login':
			$login = $_POST['login'];
			$password = $_POST['password'];
			if(!empty($login) && !empty($password) && is_string($login) && is_string($password)){
				$result = mysql_query("SELECT * FROM user WHERE login='$login'",$db);
				$row = mysql_fetch_array($result);
				if(!empty($row['password']) && $row['password'] == $password){
					$_SESSION['id'] = mysql_insert_id();
					echo json_encode("Успешно!");
					exit();
				}else exit(json_encode("Login or password is not pass correct")); 
			}else exit(json_encode("Login or password is not pass correct"));
		break;
		case 'register':
			$login = $_POST['login'];
			$password = $_POST['password'];
			if(!empty($login) && !empty($password) && is_string($login) && is_string($password)){
				$result = mysql_query("SELECT * FROM user WHERE login='$login'",$db);
				$row = mysql_fetch_array($result);
				if(empty($row['login'])){
					$result = mysql_query("INSERT INTO user (login, password) VALUES ('$login','$password')");
					echo json_encode("Успешно");
					exit();
				}else exit(json_encode("Login or password is not pass correct"));
			}else exit(json_encode("Login or password is not pass correct"));
		break;
	}

?>