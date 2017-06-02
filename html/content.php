<?php
	session_start();
	include "db.php";
	if($_SESSION["auth_admin"] == "yes_auth")
	{

	if (isset($_GET["logout"]))
	{

	unset($_SESSION['auth_admin']);
	header('location: index.php');
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Мой проводник</title>
	<link rel="stylesheet" href="assets/css/uikit.css">
	<link rel="stylesheet" href="assets/css/aboutus.css">
	<link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">
		<link rel="stylesheet" type="text/css" href="assets/scripts/jquery-ui.css">
		<!-- elFinder CSS (REQUIRED) -->
		<link rel="stylesheet" type="text/css" href="elfinder/css/elfinder.min.css">
		<link rel="stylesheet" type="text/css" href="elfinder/css/theme.css">
		<!-- Section JavaScript -->
		<!-- jQuery and jQuery UI (REQUIRED) -->
		<!--[if lt IE 9]>
		<script src="//code.jquery.com/jquery-1.12.4.min.js"></script>
		<![endif]-->
		<!--[if gte IE 9]><!-->
		<script src="/assets/scripts/jquery-3.1.1.min.js"></script>
		<!--<![endif]-->
		<script src="/assets/scripts/jquery-ui.min.js"></script>
		<!-- elFinder JS (REQUIRED) -->
		<script src="elfinder/js/elfinder.min.js"></script>
		<!-- GoogleDocs Quicklook plugin for GoogleDrive Volume (OPTIONAL) -->
		<!--<script src="elfinder/js/extras/quicklook.googledocs.js"></script>-->
		<!-- elFinder translation (OPTIONAL) -->
		<script src="elfinder/js/i18n/elfinder.ru.js"></script>
		<!-- elFinder initialization (REQUIRED) -->
		<script type="text/javascript" charset="utf-8">
			// Documentation for client options:
			// https://github.com/Studio-42/elFinder/wiki/Client-configuration-options
			$(document).ready(function() {
				$('#elfinder').elfinder({
					url : 'elfinder/php/connector.minimal.php'  // connector URL (REQUIRED)
					, lang: 'ru'                    // language (OPTIONAL)
					, height: '650'
				});
			});
		</script>
</head>
<body>
	<nav>
		<div class="logo">
			<a href="index.php"><img src="assets/images/logo.png"></a>
		</div>
		<div class="button">
			<p style="color: white;">Привет, <?php echo $_SESSION["login"];?>!</p>
			 <a	href="?logout">Выход</a>
		</div>
	</nav>
		<div id="elfinder">
		</div>
</body>
</html>
<?php

}else
{
header('location: login.php');
}
?>
