<?php

    // подключение основного файла приложения
    require("core/app.php");

    // если передан номер записи для удаления
    if (isset($_GET['id'])) {
        // записываем в переменную
        $id = intval($_GET['id']);

        // вызываем удаление в БД
        $database->query(
            'delete from users where id='.$id
        );

        // получение разделов для выпадающего списка
        $page['name_id'] = $database->get_all("
            select * from name
        ");

        // переадресация на главную страницу
        header("Location: read.users.php");
    }

?>
