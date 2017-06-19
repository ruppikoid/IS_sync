<<<<<<< HEAD
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
                <input type="text" class="uk-input" placeholder="Имя" 
                name="firstname" value="<?= $item['firstname'] ?>">
            </div>

            <div class="uk-margin">
                <input type="text" class="uk-input" placeholder="Фамилия" 
                name="lastname" value="<?= $item['lastname'] ?>">
            </div>

            <div class="uk-margin">
                <input type="text" class="uk-input" placeholder="Номер телефона" 
                name="phonenumber" value="<?= $item['phonenumber'] ?>">
            </div>

            <div class="uk-margin">
                <input type="text" class="uk-input" placeholder="Адрес проживания" 
                name="city" value="<?= $item['city'] ?>">
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
                <input type="text" class="uk-input" placeholder="Имя" name="firstname">
            </div>

            <div class="uk-margin">
                <input type="text" class="uk-input" placeholder="Фамилия" name="lastname">
            </div>

            <div class="uk-margin">
                <input type="text" class="uk-input" placeholder="Номер телефона" name="phonenumber">
            </div>

            <div class="uk-margin">
                <input type="text" class="uk-input" placeholder="Адрес" name="city">
            </div>

            <div class="uk-margin uk-text-center">
                <button class="uk-button uk-button-secondary" type="submit" name="create">Добавить</button>
            </div>

        </fieldset>
    </form>
<?php endif ?>
=======
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
                <input type="text" class="uk-input" placeholder="Имя" 
                name="firstname" value="<?= $item['firstname'] ?>">
            </div>

            <div class="uk-margin">
                <input type="text" class="uk-input" placeholder="Фамилия" 
                name="lastname" value="<?= $item['lastname'] ?>">
            </div>

            <div class="uk-margin">
                <input type="text" class="uk-input" placeholder="Номер телефона" 
                name="phonenumber" value="<?= $item['phonenumber'] ?>">
            </div>

            <div class="uk-margin">
                <input type="text" class="uk-input" placeholder="Адрес проживания" 
                name="city" value="<?= $item['city'] ?>">
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
                <input type="text" class="uk-input" placeholder="Имя" name="firstname">
            </div>

            <div class="uk-margin">
                <input type="text" class="uk-input" placeholder="Фамилия" name="lastname">
            </div>

            <div class="uk-margin">
                <input type="text" class="uk-input" placeholder="Номер телефона" name="phonenumber">
            </div>

            <div class="uk-margin">
                <input type="text" class="uk-input" placeholder="Адрес" name="city">
            </div>

            <div class="uk-margin uk-text-center">
                <button class="uk-button uk-button-secondary" type="submit" name="create">Добавить</button>
            </div>

        </fieldset>
    </form>
<?php endif ?>
>>>>>>> master
