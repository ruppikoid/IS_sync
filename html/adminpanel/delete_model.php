<?php

	include("phpfiles/db_connect.php");

	$id = $_GET['id'];

	mysqli_query($link, "DELETE FROM 3dmodels WHERE model_id='$id'");

	mysqli_close($link);

	echo "Модель успешно удалена!";

?>