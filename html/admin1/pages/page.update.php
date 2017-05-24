<div class="uk-section uk-text-center">
    <h1><?= $title ?></h1>
    <p>Данная страница сайта показывает возможность редактирования записей</p>
</div>

    <form method="post" class="uk-form uk-padding-large">
        <fieldset class="uk-fieldset">
            <legend class="uk-legend uk-text-center">Изменение записей в таблице</legend>

           

             <div class="uk-margin">
                <input type="text" class="uk-input" placeholder="Новый код специальности" name="id">
            </div>
             <div class="uk-margin">
                <input type="text" class="uk-input" placeholder="Новое наименование специальности" name="title">
            </div>
             <div class="uk-margin">
                <input type="text" class="uk-input" placeholder="Новый уровень" name="lvl">
            </div>
            
            <div class="uk-margin">
                <input type="text" class="uk-input" placeholder="Новый описание" name="disc">
            </div>

             <div class="uk-margin">
                <input type="text" class="uk-input" placeholder="Порядковый код специальности" name="new_id">
            </div>

            <div class="uk-margin uk-text-center">
                <button class="uk-button uk-button-secondary" type="submit" name="update">Обновить запись</button>
            </div>

        </fieldset>
    </form>