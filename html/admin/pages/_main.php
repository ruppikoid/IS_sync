<<<<<<< HEAD
<!DOCTYPE html>
<html>
<head>
    <!-- Кодировка страницы -->
    <meta charset="UTF-8">

    <!-- Название сайта -->
    <title>Admin panel</title>

    <!-- Подключение стилевого оформления CSS -->
    <link rel="stylesheet" href="assets/css/uikit.min.css">

    <!-- Подключения JavaScript библиотек -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/uikit.min.js"></script>
    <script src="assets/js/uikit-icons.min.js"></script>
</head>
<body>

    <?php if (!isset($_SESSION['auth']) && $_SERVER['REQUEST_URI'] != "/admin/user.php") : ?>
       <h1 class="uk-text-danger uk-text-center uk-margin-large-top">Доступ запрещен!</h1>
       <?php die() ?>
     <?php endif ?>

    <!-- Подключение блока навигационного меню -->
    <?php include('widgets/menu.php') ?>

    <div class="uk-container uk-section uk-background-muted">
    <?php

        // Если обявлена переменная с названием страницы
        if (isset($page)) {
            // генерация полного пути к файлу
            $page = __DIR__."/page.".strtolower($page).".php";
            // если файл найден, то выполнить подключение в текущий файл
            if (file_exists($page)) {
                include($page);
            } else { return; }
        // Если файл не найден, вывести ошибку
        } else {
            echo "<h1>Шаблон страницы не найден!</h1>";
        }

    ?>
    </div>

     <div class="uk-section uk-section-secondary">
        <p class="uk-text-center">Дипломный проект 2017 год</p>
    </div>

</body>
</html>
=======
<!DOCTYPE html>
<html>
<head>
    <!-- Кодировка страницы -->
    <meta charset="UTF-8">

    <!-- Название сайта -->
    <title>Admin panel</title>

    <!-- Подключение стилевого оформления CSS -->
    <link rel="stylesheet" href="assets/css/uikit.min.css">

    <!-- Подключения JavaScript библиотек -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/uikit.min.js"></script>
    <script src="assets/js/uikit-icons.min.js"></script>
</head>
<body>

    <?php if (!isset($_SESSION['auth']) && $_SERVER['REQUEST_URI'] != "/admin/user.php") : ?>
       <h1 class="uk-text-danger uk-text-center uk-margin-large-top">Доступ запрещен!</h1>
       <?php die() ?>
     <?php endif ?>

    <!-- Подключение блока навигационного меню -->
    <?php include('widgets/menu.php') ?>

    <div class="uk-container uk-section uk-background-muted">
    <?php

        // Если обявлена переменная с названием страницы
        if (isset($page)) {
            // генерация полного пути к файлу
            $page = __DIR__."/page.".strtolower($page).".php";
            // если файл найден, то выполнить подключение в текущий файл
            if (file_exists($page)) {
                include($page);
            } else { return; }
        // Если файл не найден, вывести ошибку
        } else {
            echo "<h1>Шаблон страницы не найден!</h1>";
        }

    ?>
    </div>

</body>
</html>
>>>>>>> master
