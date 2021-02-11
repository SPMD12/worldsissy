<?php require "./db.php";?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="wrapperReg">
<?php $data = $_POST; // возвращение данных
 	if ( isset($data['do_signup']) ) // проверка кнопки
 	{
 		//Здесь регистрация
 		$errors = array();
 		if (trim($data['login']) == '') // Проверка логина на пустоту
 		{
 			$errors[] = 'Введите логин';
 		}
 		if (trim($data['email']) == '') // Проверка Email на пустоту
 		{
 			$errors[] = 'Введите email';
 		}
 		if ($data['password'] == '') // Проверка пароля на пустоту
 		{
 			$errors[] = 'Введите пароль';
 		}
 		if ($data['password_2'] != $data ['password']) // Проверка на совпадение password_2 с password.
 		{
 			$errors[] = 'Повторный пароль введён неверно';
 		}
 		if (R::count('users', "login = ?", array ($data['login'])) > 0) // Проверка логина на существование
 		{
 			$errors[] = 'Пользователь с таким логином уже существует';
 		}
 		if (R::count('users', "email = ?", array ($data['email'])) > 0)// Проверка Emil на существование
 		{
 			$errors[] = 'Пользователь с таким E-mail уже существует';
 		}

 		if (empty($errors))
 		{
 			// Регистрация пользователя в базе данных
 			$user = R::dispense('users'); 
 			$user -> login = $data['login'];
 			$user -> email = $data['email'];
 			$user -> password = password_hash($data ['password'], PASSWORD_DEFAULT); //Шифрование пароля
 			R::store($user);
 			echo '<div style = "color: green;">Вы успешно зарегистрировались! <a href ="./login.php">Теперь вы можете авторизироваться</a></div><hr>'; // вывод надписи
 		} else
 		{
 			echo '<div style = "color: red;">'.array_shift($errors).'
 			</div><hr>';
 		}
 	}
?>
</div>
			<!--Подключение стилей css-->
	<link rel="stylesheet" href="../css/style.css">
<div class="regFormWrapper">
 	<form action="signup.php" method="POST"> <!-- Форма регистрации -->
 		<div class="formTableReg">
 		<p>
 			<!-- Форма логина -->
 			<input type="text" name="login" value="<?php echo @$data['login'];?>" placeholder="Введите логин"><br>
 			<!-- Форма Email -->
 			<input type="email" name="email" value="<?php echo @$data['email'];?>" placeholder="Введите е-mail"><br>
 			<!-- Форма пароля -->
 			<input type="password" name="password" value="<?php echo @$data['password'];?>" placeholder="Введите пароль"><br>
 			<!-- Форма повторного пароля -->
 			<input type="password" name="password_2" value="<?php echo @$data['password_2'];?>" placeholder="Введите пароль">
 		</p>

 		<div class="regFormBut">
 			<!-- Кнопка регистрации -->
 			<button type="submit" name="do_signup"> Зарегистрироваться 
 			</button>
 		</div>
 		</div>
 	</form>
</div>
</body>
</html>

 	