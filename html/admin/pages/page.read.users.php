<div class="uk-section uk-text-center">
    <h1><?= $title ?></h1>
    <p>На данной странице отображен список всех материалов, которые есть в таблице "users".</p>
</div>

<!-- Вывод всех записей из переменной $page['news'] -->
<?php foreach ($news as $item) : ?>

    <div class="uk-card uk-card-default uk-card-body uk-margin">
        <h3 class="uk-card-title">ID <?= $item['id'] ?> - <?= $item['login'] ?></h3>
        <p class="uk-text-meta">Пароль: <?= $item['password'] ?></p>
        <p class="uk-text-right">Почта: <?= $item['email'] ?></p>
        <p class="uk-text-right">Отдел: <?= $item['departaments_id'] ?></p>

        <hr class="uk-divider-icon">

        <p><?= $item['name_id'] ?></p>

        <div class="uk-margin uk-text-right">
            <a href="edit.users.php?id=<?= $item['id'] ?>" class="uk-button uk-button-small uk-button-primary">Редактировать</a>
            <a href="delete.users.php?id=<?= $item['id'] ?>" class="uk-button uk-button-small uk-button-danger">Удалить</a>
        </div>
    </div>

<?php endforeach ?>
