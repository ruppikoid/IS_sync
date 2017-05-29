<!-- Блок навигационного меню сайта -->
<nav class="uk-navbar-container uk-navbar-transparent uk-section-secondary" uk-navbar>
    <div class="uk-navbar-center">

        <ul class="uk-navbar-nav">
            <li><a href="index.php">Главная</a></li>
            <li><a href="read.php">Просмотр записей</a></li>
            <li><a href="edit.php">Добавить запись</a></li>
            <li> <a href="?logout" class="uk-button uk-button-small uk-button-danger">Выход</a></li>
            <p style="color: white; margin-left: 20px; ">Привет, <?php echo $_SESSION["login"];?>!</p>

        </ul>

    </div>
</nav>
