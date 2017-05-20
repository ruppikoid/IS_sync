<?php
	session_start();
	if ($_SESSION['auth_admin'] == "yes_auth")
		{
	// define('', true);
	if (isset($_GET["logout"]))
		{
			unset($_SESSION['auth_admin']);
			header("Location: login.php");
		}
	$_SESSION['urlpage'] = "<a href='index.php'>Главная</a>";

	include("phpfiles/db_connect.php");
	$id = $_GET["id"];

	if ($_POST["submit_add"])
	{
		$error = array();

		if (!$_POST["form_modelname"])
		{
			$error[] = "Укажите название модели";
		}
		if (!$_POST["form_minidesc"])
		{
			$error[] = "Заполните краткое описание";
		}
		if (!$_POST["form_description"])
		{
			$error[] = "Заполните полное описание";
		}
		if (!$_POST["form_modelput"])
		{
			$error[] = "Укажите путь к модели";
		}
		if (count($error))
		{
			$_SESSION['message'] = "<p id='form_error'>".implode('<br />',$error)."</p>";
		}else
		{
			$querynew = "modelname='{$_POST["form_modelname"]}', minidesc='{$_POST["form_minidesc"]}', description='{$_POST["form_description"]}', modelka='{$_POST["form_modelput"]}'";
				$update = mysqli_query($link, "UPDATE 3dmodels SET $querynew WHERE model_id = '$id'");
		$_SESSION['message'] = "<p id='form_success'>Товар успешно изменен!</p>";

		if (empty($_POST["upload_image"]))
		{
			include("actions/upload_image.php");
			unset($_POST["upload_image"]);
		}
	}
		
}

?>
<!doctype html>
<html lang="en-us">
<head>
	
	<meta charset="utf-8">
	
	<title>3D-Gallery-Admin</title>
	
	<meta name="description" content="">
	<meta name="author" content="revaxarts.com">
	
	
	<!-- Google Font and style definitions -->
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans:regular,bold">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="jquery_confirm/jquery_confirm.css">
	
	<!-- include the skins (change to dark if you like) -->
	<link rel="stylesheet" href="css/light/theme.css" id="themestyle">
	<!-- <link rel="stylesheet" href="css/dark/theme.css" id="themestyle"> -->
	
	<!-- Use Google CDN for jQuery and jQuery UI -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.min.js"></script>
	
	<!-- Loading JS Files this way is not recommended! Merge them but keep their order -->
	
	<!-- some basic functions -->
	<script src="js/functions.js"></script>
		
	<!-- all Third Party Plugins and Whitelabel Plugins -->
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/scripter.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/editor.js"></script>
	<script src="js/flot.js"></script>
	<script src="js/elfinder.js"></script>
	<script src="js/datatables.js"></script>
	<script src="js/wl_Alert.js"></script>
	<script src="js/wl_Autocomplete.js"></script>
	<script src="js/wl_Breadcrumb.js"></script>
	<script src="js/wl_Calendar.js"></script>
	<script src="js/wl_Chart.js"></script>
	<script src="js/wl_Color.js"></script>
	<script src="js/wl_Date.js"></script>
	<script src="js/wl_Editor.js"></script>
	<script src="js/wl_File.js"></script>
	<script src="js/wl_Dialog.js"></script>
	<script src="js/wl_Fileexplorer.js"></script>
	<script src="js/wl_Form.js"></script>
	<script src="js/wl_Gallery.js"></script>
	<script src="js/wl_Multiselect.js"></script>
	<script src="js/wl_Number.js"></script>
	<script src="js/wl_Password.js"></script>
	<script src="js/wl_Slider.js"></script>
	<script src="js/wl_Store.js"></script>
	<script src="js/wl_Time.js"></script>
	<script src="js/wl_Valid.js"></script>
	<script src="js/wl_Widget.js"></script>
	
	<!-- configuration to overwrite settings -->
	<script src="js/config.js"></script>
		
	<!-- the script which handles all the access to plugins etc... -->
	<script src="js/script.js"></script>
	
	
</head>
<body>
	<?php
		include("includes/top.php");
	?>
	<?php
		include("includes/left.php");
	?>
	<section id="content">
		<div class="g12 nodrop">
			<h1>Загрузка модели</h1>
			<?php
				$result = mysqli_query($link, "SELECT * FROM 3dmodels WHERE model_id='$id'");

				if (mysqli_num_rows($result) > 0)
				{
					$row = mysqli_fetch_array($result);
					do
					{
						echo '
						<form enctype="multipart/form-data" method="post">
					<ul id="edit_model">
						<li>
							<label>Название модели</label>
							<input type="text" name="form_modelname" value="'.$row["modelname"].'" />
						</li>
						<li>
							<label>Краткое описание</label>
							<input type="text" name="form_minidesc" value="'.$row["minidesc"].'" />
						</li>
						<li>
							<label>Полное описание</label>
							<textarea type="text" name="form_description">'.$row["description"].'</textarea>
						</li>
						<li>
							<label>Путь модели</label>
							<input type="text" name="form_modelput" value="'.$row["modelka"].'"/>
						</li>
						
						';
							if (strlen($row["kartinka"]) > 0 && file_exists("../images/".$row["kartinka"]))
							{
								$img_path = '../images/'.$row["kartinka"];
								$width = 130;
                    			$height = 190;
							
						echo '
						<li>
							<label class="stylelabel">Превью-картинка</label>
						<div id="upload-prew">
							<img src="'.$img_path.'" width="'.$width.'" height="'.$height.'"/>
							<a href="edit_model.php?id='.$row["model_id"].'&img='.$row["kartinka"].'&action=delete"></a>
						</div>
						</li>
						';
						}else
						{
							echo '
							<label class="stylelabel">Превью-картинка</label>
						<div id="upload-prew">
							<input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
							<input type="file" name="upload_image" />
						</div>
						';
						}
						echo '
						
						
					</ul>
					<p align="right"><input type="submit" id="submit_form" name="submit_add" value="Сохранить"/></p>
				</form>
						';



					}while ($row = mysqli_fetch_array($result));
				}
			?>
			<div id="dobavlenie">
				

			</div>
			
		</div>	
	</section>
	<footer>Copyright by Nikson1997</footer>
</body>
</html>
<?php
  }else
 {
 	header("Location: login.php");
 }
?>