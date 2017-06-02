<?php
	session_start();

	include ('db.php');

	if (isset($_POST['submit']))
	{
		$login = trim($_POST['login']);
		$password = ($_POST['password']);

		if ($login && $password)
		{

			$result = mysqli_query($link, "SELECT * FROM users WHERE login = '$login' AND password = '$password'");

			if (mysqli_num_rows($result) > 0)
			{

				$row = mysqli_fetch_array($result);

				$_SESSION['auth'] = [
									 'id' => $user['id'],
									 'login' => $user['login']
							 ];

				$_SESSION['auth_admin'] = "yes_auth";
				$_SESSION['login'] = $row["login"];
				$_SESSION['id'] = $row["id"];
				header ("location: content.php");
			} else
			{
				$msgerror = "Неверный логин или пароль";
			}
		} else
		{
			$msgerror = "Заполните поля";
		}

	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Вход</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="assets/css/uikit.css">
	 <link rel="stylesheet" type="text/css" href="assets/css/login.css">
	<link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">
</head>
<body>
	<div class="uk-vertical-align uk-text-center uk-height-1-1">
		 <div class="uk-vertical-align-middle" style="width: 350px;">

		 	<img class="uk-margin-bottom" width="140" height="120" src="assets/images/login.png" alt="">

<?php
if (isset($msgerror)) echo '<p id="form-error" align="center">'.$msgerror.'</p>';

	if(isset($_SESSION['message']))
		{
		echo $_SESSION['message'];
		unset($_SESSION['message']);
		}

    if(isset($_SESSION['answer']))
		{
		echo $_SESSION['answer'];
		unset($_SESSION['answer']);
		}
?>
			<form name="form_login" method="post">

				<li>
				<input type="text" name="login" placeholder="Логин"/>
				</li>

				<li>
				  <input type="text" name="password" placeholder="Пароль"/>
				</li>

			    <p align="center" ><input type="submit" id="submit_form" name="submit" value="Вход"/></p>
			    <p align="center" ><a href="index.php">Главная страница</a></p>

			</form>

		</div>
	</div>
</body>
</html>
