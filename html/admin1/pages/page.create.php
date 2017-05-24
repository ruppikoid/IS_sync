<div class="uk-section uk-text-center">
    <h1><?= $title ?></h1>
    <p>Данная страница сайта показывает возможность создания новых записей</p>
</div>

    <form method="post" class="uk-form uk-padding-large">
        <fieldset class="uk-fieldset">
            <legend class="uk-legend uk-text-center">Добавление новой специальности</legend>

            <div class="uk-margin">
                <input type="text" class="uk-input" placeholder="Код" name="id">
            </div>

            <div class="uk-margin">
                <input type="text" class="uk-input" placeholder="Наименование специальности" name="title">
            </div>

            <div class="uk-margin">
                <input type="text" class="uk-input" placeholder="Уровень" name="lvl">
            </div>

            <div class="uk-margin">
                <input type="text" class="uk-input" placeholder="Описание" name="disc">
            </div>

            <div class="uk-margin uk-text-center">
                <button class="uk-button uk-button-secondary" type="submit" name="create">Добавить</button>
            </div>

        </fieldset>
    </form>