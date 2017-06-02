<?php

    // Включение вывода ошибок PHP
    ini_set('display_errors', 'on');
    // Вывод всех типов ошибок
    error_reporting(E_ALL);

    // Запуск сессии для хранения временных данных
    session_start();

    // Подключение объекта базы данных
    include_once("database.php");

    // Функция вызова рендеринга веб-страниц по шаблонам
    function renderPage($page_name = null, $data = null) {
        // кеширование наименования страницы
        $page = $page_name;

        // если передана информация для вывода, 
        // раскрыть массив в локальные переменные
        if (!is_null($data)) { extract($data); }
        
        // подключить файл основного шаблона
        include_once(
            realpath(__DIR__."/../pages/_main.php")
        );
    }

?>