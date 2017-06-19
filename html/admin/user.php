<<<<<<< HEAD
<?php

    // подключение основного файла приложения
    require("core/app.php");

    // пример переменной для рендера
    $page['title'] = "Личный кабинет";

    // если нажата кнопка Войти
    if (isset($_POST['signin'])) {
        // получаем данные из формы
        $login = $_POST['login'];
        $password = md5($_POST['password']);
        // получение пользователя с указанным логином
        $user = $database->get_one("
            select * from admin
            where login='{$login}'
        ");
        // если пользователь найден
        if ($user) {
            // проверка пароля
            if ($user['password'] == $password) {
                // авторизуем
                $_SESSION['auth'] = [
                    'id' => $user['id'],
                    'login' => $user['login']
                ];
            } else {
                // если пароль не совпал
                $page['error'] = "Неверный пароль";
            }
        } else {
            $page['error'] = "Пользователь не найден!";
        }
    }

    // если нажата кнопка Выйти
    if (isset($_GET['logout'])) {
        // уничтожение переменной в сессии
        unset($_SESSION['auth']);
        // переадресация на страницу личного кабинета
        header("Location: user.php");
    }

    // вызов функции рендера шаблона HTML-страницы
    renderPage('user', $page);

?>
=======
<?php

    // подключение основного файла приложения
    require("core/app.php");

    // пример переменной для рендера
    $page['title'] = "Личный кабинет";

    // если нажата кнопка Войти
    if (isset($_POST['signin'])) {
        // получаем данные из формы
        $login = $_POST['login'];
        $password = ($_POST['password']);
        // получение пользователя с указанным логином
        $user = $database->get_one("
            select * from admin 
            where login='{$login}'
        ");
        // если пользователь найден
        if ($user) {
            // проверка пароля
            if ($user['password'] == $password) {
                // авторизуем
                $_SESSION['auth'] = [
                    'id' => $user['id'],
                    'login' => $user['login']
                ];
            } else {
                // если пароль не совпал
                $page['error'] = "Неверный пароль";
            }
        } else {
            $page['error'] = "Пользователь не найден!";
        }
    }

    // если нажата кнопка Выйти
    if (isset($_GET['logout'])) {
        // уничтожение переменной в сессии
        unset($_SESSION['auth']);
        // переадресация на страницу личного кабинета
        header("Location: user.php");
    }

    // вызов функции рендера шаблона HTML-страницы
    renderPage('user', $page);

?>
>>>>>>> master
