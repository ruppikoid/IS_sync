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

            <div class="uk-margin">
                <input type="text" class="uk-input" placeholder="ФИО"
                name="name" value="<?= $item['name'] ?>">
            </div>

            <div class="uk-margin">
                <input type="text" class="uk-input" placeholder="Email"
                name="email" value="<?= $item['email'] ?>">
            </div>

            <div class="uk-margin">
                <input type="text" class="uk-input" placeholder="Id из сотрудников"
                name="name_id" value="<?= $item['name_id'] ?>">
            </div>

            <div class="uk-margin">
                <select class="uk-select" name="name_id" placeholder="Раздел">
                <?php foreach ($sections as $x) : ?>
                    <option value="<?= $x['id'] ?>"><?= $x['name'] ?></option>
                <?php endforeach ?>
                </select>
            </div>

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

            <div class="uk-margin">
                <input type="text" class="uk-input" placeholder="ФИО" name="name">
            </div>

            <div class="uk-margin">
                <input type="text" class="uk-input" placeholder="Email" name="email">
            </div>


              <div class="uk-margin">
                <input type="text" class="uk-input" placeholder="name_id" name="name_id">
            </div>

             <div class="uk-margin">
                <select class="uk-select" name="name_id" placeholder="Фамилия сотрудника">
                <?php foreach ($sections as $x) : ?>
                    <option value="<?= $x['id'] ?>"><?= $x['lastname'] ?></option>
                <?php endforeach ?>
                </select>
            </div>

            <div class="uk-margin uk-text-center">
                <button class="uk-button uk-button-secondary" type="submit" name="create">Добавить</button>
            </div>

        </fieldset>
    </form>
<?php endif ?>
