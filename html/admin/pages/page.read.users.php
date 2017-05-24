<div class="uk-section uk-text-center">
    <h1><?= $title ?></h1>
    <p>На данной странице отображен список всех материалов, которые есть в таблице "users".</p>
</div>

<!-- Вывод всех записей из переменной $page['news'] -->
<?php foreach ($news as $item) : ?>

    <div class="uk-card uk-card-default uk-card-body uk-margin">
        <h3 class="uk-card-title">#<?= $item['id'] ?> - <?= $item['login'] ?></h3>
        <em class="uk-float-right uk-text-meta"> <?= $item['password'] ?></em>
        <p class="uk-text-meta"><?= $item['email'] ?></p>

        <hr class="uk-divider-icon">

        <p><?= $item['directory'] ?></p>

        <div class="uk-margin uk-text-right">
            <a href="edit.users.php?id=<?= $item['id'] ?>" class="uk-button uk-button-small uk-button-primary">Редактировать</a>
            <a href="delete.users.php?id=<?= $item['id'] ?>" class="uk-button uk-button-small uk-button-danger">Удалить</a>
        </div>
    </div>

<?php endforeach ?>
