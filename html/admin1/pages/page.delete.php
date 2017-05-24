<div class="uk-section uk-text-center">
    <h1><?= $title ?></h1>
    <p>Данная страница сайта показывает возможность удаления записей</p>
</div>


    <form method="post" class="uk-form uk-padding-large">
        <fieldset class="uk-fieldset">
            <legend class="uk-legend uk-text-center">Удаление специальности</legend>

            <div class="uk-margin">
                <input type="text" class="uk-input" placeholder="Код" name="id">
            </div>

            <div class="uk-margin uk-text-center">
                <button class="uk-button uk-button-secondary" type="submit" name="delete">Удалить</button>
            </div>

        </fieldset>
    </form>