<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
	<title>Авторизация</title>
</head>
<body>
	<h1>Добро пожаловать!</h1>
	<h2>Что вы хотите сделать?</h2>
	<form>
		<h2>Для авторизации заполните данные ниже</h2>
		<label>Ваш логин</label>
		<input type="text" id="login"><br>
		<label>Ваш пароль</label>
		<input type="password" id="password"><br>
		<label id="button">ОТПРАВИТЬ</label>
	</form>
	<a href="/register.php">Регистрация</a>
	<script type="text/javascript">
		$('#button').on('click', (e) =>{
			if(!isEmpty($('#login').val()) && !isEmpty($('#password').val())){
				$.ajax({
					url: '/server.php',
					type: 'POST',
					dataType: 'json',
					data:{
						command: 'register',
						login: $('#login').val(),
						password: $('#password').val()
					},
					success: data=>{
						alert("Успешно!");
					}
				})
			}else return alert("Забыли что-то ввести!");
		})
		function isEmpty(obj){for(var key in obj) return false; return true}
	</script>
</body>
</html>