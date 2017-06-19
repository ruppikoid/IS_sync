<?php

    // подключение основного файла приложения
    require("core/app.php");

    // пример переменной для рендера
    $page['title'] = 'Панель добавления/редактирования записей';

    // получение выбранной новости, если передан $_GET['id']
    if (isset($_GET['id'])) {
        $id = trim($_GET['id']);

        $page['item'] = $database->get_one(
            'select * from name where id='.intval($id)
        );
    }

    // если была обновлена запись -> обновить в таблице
    if (isset($_POST['update'])) {
        $database->query("
            UPDATE name SET

            firstname       ='{$_POST['firstname']}',
            lastname        ='{$_POST['lastname']}',
            phonenumber     ='{$_POST['phonenumber']}',
            city            ='{$_POST['city']}'

            WHERE id={$id}
        ");

        header('Location: read.name.php');
    }

    // если была создана новая запись
    if (isset($_POST['create'])) {

        $item = [
            'firstname'        => $_POST['firstname'],
            'lastname'         => $_POST['lastname'],
            'phonenumber'      => $_POST['phonenumber'],
            'city'             => $_POST['city']

        ];

        $database->query("
            INSERT INTO name (firstname, lastname, phonenumber, city)
            VALUES ('{$item['firstname']}', '{$item['lastname']}', '{$item['phonenumber']}', '{$item['city']}')
        ");

        header('Location: edit.php');
    }

    // вызов функции рендера шаблона HTML-страницы



    renderPage('edit.name', $page);

?>
