<?php

    // подключение основного файла приложения
    require("core/app.php");

    // пример переменной для рендера
    $page['title'] = 'Список существующих записей';

    // получение всех записей из таблицы
    $page['news'] = $database->get_all(
        'select * from admin'

    );



    // вызов функции рендера шаблона HTML-страницы
    renderPage('read.admin', $page);

?>
