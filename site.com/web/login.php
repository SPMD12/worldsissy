<?php include ('../templates/header.html');?>
  <!DOCTYPE html>
  <html>

  <head>
    <title>Мир SISSY девочек</title>
  </head>

  <body>
    <div class="wrapperLogin">
      <?php $data = $_POST; // возвращение данных
 	if (isset($data['do_login']) ) // проверка кнопки
 	{
 		$errors = array();
 		$user = R::findOne ('users', 'login = ?', array($data['login'])); // Поиск пользователя
 		if ($user)
 		{
 			if (password_verify($data['password_log'], $user -> password)) // вроде бы проверка пароля
 			{
 				$_SESSION['logged_user'] = $user; // авторизация пользователя вроде бы.
 				echo '<div style = "color: green;">Вы авторизованны! На <a href ="http://www.worldsissy.com/
 				">главную страницу</a></div><hr>';
 			} 
 			else
 			{
 				$errors[] = 'Пароль введён неверно';
 			}
 		} 
 		else
 		{
 			$errors[] = 'Пользователь с таким логином не найден'; 
 		}

 		if (!empty($errors))
 		{
 			echo '<div style = "color: red;">'.array_shift($errors).'</div><hr>';
 		}
 	}
?>
    </div>
    <!--Подключение стилей css-->
    <link rel="stylesheet" href="../css/style.css">
    <div class="formAutoWrapper">
      <form action="login.php" method="POST">
        <!-- Форма авторизации -->
        <div class="formTable">
          <p>
            <input type="text" name="login" value="<?php echo @$data['login'];?>" placeholder="Введите логин">
            <br>
            <input type="password" name="password_log" value="<?php echo @$data['password'];?>" placeholder="Введите пароль">
          </p>
          <div class="formButton">

            <button type="submit" name="do_login">Войти
            </button>
          </div>
      </form>
      </div>
    </div>
  </body>

  </html>