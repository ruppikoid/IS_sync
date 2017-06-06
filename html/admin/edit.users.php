<?php

    // подключение основного файла приложения
    require("core/app.php");

    // пример переменной для рендера
    $page['title'] = 'Панель добавления/редактирования записей';

    // получение выбранной карточки, если передан $_GET['id']
    if (isset($_GET['id'])) {
        $id = trim($_GET['id']);

        $page['item'] = $database->get_one(
            'select * from users where id='.intval($id)
        );
    }

    // если была обновлена запись -> обновить в таблице
    if (isset($_POST['update'])) {
        $database->query("
            UPDATE users SET

            login                ='{$_POST['login']}',
            password             ='{$_POST['password']}',
            email                ='{$_POST['email']}',
            name_id              ='{$_POST['name_id']}',
            departaments_id      = {$_POST['departaments_id']}

            WHERE id={$id}
        ");

        header('Location: read.users.php');
    }

    // если была создана новая запись
    if (isset($_POST['create'])) {

        $item = [
            'login'                => $_POST['login'],
            'password'             => $_POST['password'],
            'email'                => $_POST['email'],
            'name_id'              => $_POST['name_id'],
            'departaments_id'      => $_POST['departaments_id']

        ];

        if ($database->query("
            INSERT INTO users (login, password, email, name_id, departaments_id)
            VALUES ('{$item['login']}', '{$item['password']}', '{$item['email']}', '{$item['name_id']}', '{$item['departaments_id']}')
        "))
        // Создание директории пользователя
        { 
         $database->query (
            $database->lastInsertID(),
            $directory = 'home'.$database->lastInsertID(),
            $update = $database->query("UPDATE users SET directory = '$directory' WHERE id = '$database'"),
            mkdir ($_SERVER['DOCUMENT_ROOT']."/assets/uploads/'{$item['departaments_id']}'/$directory", 0777));
        }

        header('Location: read.users.php?id='.$database->lastInsertID());
    }


    // получение разделов для выпадающего списка личной информации
    $page['name'] = $database->get_all("
    select * from name
    ");
    // получение разделов для выпадающего списка отделов
    $page['departaments'] = $database->get_all("
    select * from departaments
    ");

    // вызов функции рендера шаблона HTML-страницы
    renderPage('edit.users', $page);

?>
