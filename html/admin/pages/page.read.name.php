<div class="uk-section uk-text-center">
    <h1><?= $title ?></h1>
    <p>На данной странице отображен список всех материалов, которые есть в таблице "name".</p>
</div>

<!-- Вывод всех записей из переменной $page['news'] -->
<?php foreach ($news as $item) : ?>

    <div class="uk-card uk-card-default uk-card-body uk-margin">
        <h3 class="uk-card-title">ID <?= $item['id'] ?> - <?= $item['firstname'] ?> <?= $item['lastname'] ?></h3>
        <p class="uk-text-meta uk-text-right">Номер телефона: <?= $item['phone_number'] ?></p>

        <hr class="uk-divider-icon">

        <p>Место жительства: <?= $item['city'] ?></p>

        <div class="uk-margin uk-text-right">
            <a href="edit.name.php?id=<?= $item['id'] ?>" class="uk-button uk-button-small uk-button-primary">Редактировать</a>
            <a href="delete.name.php?id=<?= $item['id'] ?>" class="uk-button uk-button-small uk-button-danger">Удалить</a>
        </div>
    </div>

<?php endforeach ?>
