<?php

    // подключение основного файла приложения
    require("core/app.php");

    // пример переменной для рендера
    $page['title'] = 'Описание системы';

    if (isset($_POST['update'])) {
        $database->query("
            update `Специальности` set 
            
            код             = '{$_POST['id']}', 
            наименование    = '{$_POST['title']}', 
            уровень         = '{$_POST['lvl']}', 
            описание        = '{$_POST['disc']}' 

             where код      = '{$_POST['new_id']}'
        ");
        header('Location: read.php');
    }

    // вызов функции рендера шаблона HTML-страницы
    renderPage('update', $page);

?>
