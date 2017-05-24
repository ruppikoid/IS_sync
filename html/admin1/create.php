<?php

    // подключение основного файла приложения
    require("core/app.php");

    // пример переменной для рендера
    $page['title'] = 'Описание системы';

    if (isset($_POST['create'])) {
        $item = [
            'код'           => $_POST['id'],
            'наименование'  => $_POST['title'],
            'уровень'       => $_POST['lvl'],
            'описание'      => $_POST['disc']
        ];

        $database->query("
            
            insert into Специальности (код, наименование, уровень, описание)  
            values ('{$item['код']}', '{$item['наименование']}', '{$item['уровень']}', '{$item['описание']}')             
        ");

        header('Location: read.php');
    }


    // вызов функции рендера шаблона HTML-страницы
    renderPage('create', $page);

    

?>
