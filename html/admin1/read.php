<?php

    // подключение основного файла приложения
    require("core/app.php");

    // пример переменной для рендера
    $page['title'] = 'Описание системы';

    $page['spec'] = $database->get_all(
        'select * from users'
    );

    // вызов функции рендера шаблона HTML-страницы
    renderPage('read', $page);



?>
