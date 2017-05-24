<?php

    // подключение основного файла приложения
    require("core/app.php");

    // пример переменной для рендера
    $page['title'] = 'Описание системы';

    if (isset($_POST['delete'])) {
          $item = [
              
            'код'  => $_POST['id'],
        ];

        $database->query("
            delete from Специальности where `код`={$item['код']}

        ");


        header('Location: read.php');
    }

    // вызов функции рендера шаблона HTML-страницы
    renderPage('delete', $page);

?>
