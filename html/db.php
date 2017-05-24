<?php
	$db_host = 'localhost';
	$db_user = 'root';
	$db_pass = 'root';
	$db_database = 'test1';

	$link = mysqli_connect($db_host, $db_user, $db_pass);

	mysqli_select_db($link, $db_database) or die ("Нет соеденения с БД". mysql_error());

?>