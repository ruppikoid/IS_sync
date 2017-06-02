<?php

include ('db.php');

// код регистрации
if (isset($_POST["register"]))
{
    $error = array();

  if (!$_POST["login"])  $error[] = "Укажите логин!";
  if (!$_POST["email"])  $error[] = "Укажите email!";
  if (!$_POST["password"])  $error[] = "Укажите пароль!";

  if (count($error))
  {
      $_SESSION['message'] = "<p id='form-error'>".implode('<br />',$error)."</p>";
  }else
  {
    $admin_login = $_POST["login"];
    $admin_email = $_POST["email"];
    $admin_pass = md5($_POST["password"]);

        mysqli_query($link, "INSERT INTO users (login, password, email)
			VALUES(
      	   '".$admin_login."',
           '".$admin_pass."',
           '".$admin_email."'
						)");

      $id = mysqli_insert_id($link);
      $directory = 'home'.$id;
      $update = mysqli_query($link, "UPDATE users SET directory = '$directory' WHERE id = '$id'");
      mkdir("assets/uploads/$directory", 0777); #realpath -> $_SERVER['DOCUMENT_ROOT']

      $_SESSION['message'] = "<p>Вы зарегистрировались и создана папка $directory</p>";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Регистрация</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="assets/css/uikit.css">
    <link rel="stylesheet" type="text/css" href="assets/css/login.css">

	<link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">
</head>
<body>

	<div class="uk-vertical-align uk-text-center uk-height-1-1">
		 <div class="uk-vertical-align-middle" style="width: 350px;">

		 	<img class="uk-margin-bottom" width="140" height="120" src="assets/images/reg.png" alt="">

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

    <form name="form_reg" method="post">


        <li>
        <input type="text" name="login"  placeholder="Логин"/>
        </li>

        <li>
        <input type="text" name="email"  placeholder="Email"/>
        </li>

        <li>
        <input type="text" name="password" placeholder="Пароль"/>
        </li>


        <p align="center" ><input type="submit" id="submit_form" name="register" value="Регистрация"/></p>
        <p align="center" ><a href="index.php">Главная страница</a>
        <a href="login.php">Страница входа!</a></p>
    </form>

</body>
</html>
