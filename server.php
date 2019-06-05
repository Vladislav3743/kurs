<?php
	include("bd.php");
	session_start();
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
				}else return error("Login or password is not pass correct");
			}else return error("Login or password is not pass correct");
			break;
		
		default:
			# code...
			break;
	}

?>