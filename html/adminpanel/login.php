<?php
	session_start();
	// define(name, true)
	include("phpfiles/db_connect.php");

	if ($_POST["submit_enter"])
		{
			$login = $_POST["input_login"];
			$pass = $_POST["input_pass"];

	if ($login && $pass)
		{
		// $pass = md5 ($pass);
		// $pass = strrev($pass);
		// $pass = strtolower("mb.04fjil!43".$pass."qj23,jjdp9");

		$result = mysqli_query($link, "SELECT * FROM reg_admin WHERE login = '$login' AND pass = '$pass'");

	if (mysqli_num_rows($result) > 0)
	{
		$row = mysqli_fetch_array($result);
		$_SESSION['auth_admin'] = 'yes_auth';
		header("Location: index.php");
	}else
	{
		$msgerror = "Неверный Логин и (или) Пароль.";
	}
	}else
	{
		$msgerror = "Заполните все поля!";
	}

	}
?>
<!doctype html>
<html lang="en-us">
<head>
	<meta charset="utf-8">
	
	<title>3D-Gallery | Login</title>
	
	<meta name="description" content="">
	<meta name="author" content="revaxarts.com">
	
	<!-- Google Font and style definitions -->
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans:regular,bold">
	<link rel="stylesheet" href="css/style.css">
	
	<!-- include the skins (change to dark if you like) -->
	<link rel="stylesheet" href="css/light/theme.css" id="themestyle">
</head>
<body id="login">
	
		<header>
			<div id="logo">
				<a href="login.php">3D-Gallery</a>
			</div>
		</header>
		<section id="content">
			<?php
				if ($msgerror)
				{
					echo '<p id="msgerror">'.$msgerror.'</p>';
				}

			?>
		<form method="post" id="loginform">
			<fieldset>
				<section><label for="username">Логин</label>
					<div><input type="text" id="username" name="input_login" autofocus></div>
				</section>
				<section><label for="password">Пароль</label>
					<div><input type="password" id="password" name="input_pass"></div>
				</section>
				<section>
					<div><input align="right" id="submiting"  type="submit" name="submit_enter" value="Войти"/></div>
				</section>
			</fieldset>
		</form>
		</section>
		<footer>Copyright by Nikson1997</footer>
		
</body>
</html>