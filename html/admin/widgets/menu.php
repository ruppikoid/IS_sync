<!-- Блок навигационного меню сайта -->
<nav class="uk-navbar-container uk-navbar-transparent uk-section-secondary" uk-navbar>
 <!--    <div class="uk-navbar-center">

        <ul class="uk-navbar-nav">
            <li><a href="index.php">Главная</a></li>
            <li><a href="read.php">Просмотр записей</a></li>
            <li><a href="edit.php">Добавить запись</a></li>
        </ul>

    </div>
 -->
    <!-- Навигационная панель -->
     <div class="uk-navbar-center">

        <ul class="uk-navbar-nav">
          <?php if (isset($_SESSION['auth'])) : ?>
                <li><a href="read.php">Просмотр записей</a></li>
                <li><a href="edit.php">Добавить запись</a></li>
            
        </ul>

    </div> 
    <div class="uk-navbar-right">
    <ul class="uk-navbar-nav">
            <li><a href="user.php">Профиль</a></li>
                <li><a href="user.php?logout">Выход</a></li>
            <?php else : ?>
                <li><a href="user.php">Вход</a></li>
            <?php endif ?>
    </ul>
    </div>
</nav>
