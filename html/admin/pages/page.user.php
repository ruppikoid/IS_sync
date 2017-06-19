<<<<<<< HEAD
<div class="uk-section uk-section-large uk-text-center">
    <h1><?= $title ?></h1>

    <?php if (isset($_SESSION['auth'])) : ?>
        
        <!-- личный кабинет -->
        <h2 class="uk-margin">
            Добро пожаловать, <?= $_SESSION['auth']['login'] ?>
        </h2>
        <div class="uk-margin">
            <a href="user.php?logout" class="uk-button uk-button-danger">Выход</a>
        </div>

    <?php else : ?>
    
        <!-- вывод ошибок -->
        <?php if (isset($error)) : ?>
            <div class="uk-alert-danger" uk-alert>
                <a class="uk-alert-close" uk-close></a>
                <p><?= $error ?></p>
            </div>
        <?php endif ?>

            <!-- авторизация -->
            <form method="post" class="uk-form uk-margin-large">
                <div class="uk-margin">
                    <div class="uk-inline">
                        <span class="uk-form-icon" uk-icon="icon: user"></span>
                        <input class="uk-input" type="text" placeholder="Логин" name="login">
                    </div>
                </div>

                <div class="uk-margin">
                    <div class="uk-inline">
                        <span class="uk-form-icon" uk-icon="icon: lock"></span>
                        <input class="uk-input" type="password" placeholder="Пароль" name="password">
                    </div>
                </div>

                <div class="uk-margin-large-top">
                    <button class="uk-button uk-button-primary" type="submit" name="signin">
                        Вход
                    </button>
                </div>

            </form>

    <?php endif ?>
</div>
=======
<div class="uk-section uk-section-large uk-text-center">
    <h1><?= $title ?></h1>

    <?php if (isset($_SESSION['auth'])) : ?>
        
        <!-- личный кабинет -->
        <h2 class="uk-margin-large">
            Добро пожаловать, <?= $_SESSION['auth']['login'] ?>
        </h2>
        <div class="uk-margin">
            <a href="user.php?logout" class="uk-button uk-button-danger">Выход</a>
        </div>

    <?php else : ?>
    
        <!-- вывод ошибок -->
        <?php if (isset($error)) : ?>
            <div class="uk-alert-danger" uk-alert>
                <a class="uk-alert-close" uk-close></a>
                <p><?= $error ?></p>
            </div>
        <?php endif ?>

            <!-- авторизация -->
            <form method="post" class="uk-form uk-margin-large">
                <div class="uk-margin">
                    <div class="uk-inline">
                        <span class="uk-form-icon" uk-icon="icon: user"></span>
                        <input class="uk-input" type="text" placeholder="Логин" name="login">
                    </div>
                </div>

                <div class="uk-margin">
                    <div class="uk-inline">
                        <span class="uk-form-icon" uk-icon="icon: lock"></span>
                        <input class="uk-input" type="password" placeholder="Пароль" name="password">
                    </div>
                </div>

                <div class="uk-margin-large-top">
                    <button class="uk-button uk-button-primary" type="submit" name="signin">
                        Вход
                    </button>
                </div>

            </form>

    <?php endif ?>
</div>
>>>>>>> master
