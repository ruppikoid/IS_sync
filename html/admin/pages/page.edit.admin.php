<div class="uk-section uk-text-center">
    <h1><?= $title ?></h1>
    <p>На этой странице можно добавить новую или отредактировать выбранную запись, если передан её порядковый номер через $_GET</p>
</div>

<hr class="uk-divider-icon">

<?php if (isset($_GET['id'])) : ?>
<!-- Панель редактирования выбранной записи -->
    <form method="post" class="uk-form uk-padding-large">
        <fieldset class="uk-fieldset">
            <legend class="uk-legend uk-text-center">Редактирование записи</legend>

            <div class="uk-margin">
                <input type="text" class="uk-input" placeholder="Логин"
                name="login" value="<?= $item['login'] ?>">
            </div>

            <div class="uk-margin">
                <input type="text" class="uk-input" placeholder="Пароль"
                name="password" value="<?= $item['password'] ?>">
            </div>

            <!-- <div class="uk-margin">
                <input type="text" class="uk-input" placeholder="Пароль"
                name="directory" value="<?= $item['directory'] ?>">
            </div> -->

            <div class="uk-margin uk-text-center">
                <button class="uk-button uk-button-secondary" type="submit" name="update">Обновить</button>
            </div>

        </fieldset>
    </form>
<?php else : ?>
<!-- Панель добавления новой записи -->
    <form method="post" class="uk-form uk-padding-large">
        <fieldset class="uk-fieldset">
            <legend class="uk-legend uk-text-center">Добавление записи</legend>

            <div class="uk-margin">
                <input type="text" class="uk-input" placeholder="Логин" name="login">
            </div>

            <div class="uk-margin">
                <input type="text" class="uk-input" placeholder="Пароль" name="password">
            </div>

            <div class="uk-margin uk-text-center">
                <button class="uk-button uk-button-secondary" type="submit" name="create">Добавить</button>
            </div>

        </fieldset>
    </form>
<?php endif ?>
