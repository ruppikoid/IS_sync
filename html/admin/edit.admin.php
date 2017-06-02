<?php

    // подключение основного файла приложения
    require("core/app.php");

    // пример переменной для рендера
    $page['title'] = 'Панель добавления/редактирования записей';

    // получение выбранной новости, если передан $_GET['id']
    if (isset($_GET['id'])) {
        $id = trim($_GET['id']);

        $page['item'] = $database->get_one(
            'select * from admin where id='.intval($id)
        );
    }

    // если была обновлена запись -> обновить в таблице
    if (isset($_POST['update'])) {
        $database->query("
            UPDATE admin SET 
            
            login       ='{$_POST['login']}', 
            password    ='{$_POST['password']}'

            WHERE id={$id}
        ");

        header('Location: read.admin.php');
    }

    // если была создана новая запись
    if (isset($_POST['create'])) {

        $item = [
            'login'        => $_POST['login'],
            'password'     => $_POST['password']
                     
        ];

        $database->query("
            INSERT INTO admin (login, password) 
            VALUES ('{$item['login']}', '{$item['password']}')
        ");

        header('Location: read.admin.php?id='.$database->lastInsertID());
    }

    // вызов функции рендера шаблона HTML-страницы
    renderPage('edit.admin', $page);

?>
