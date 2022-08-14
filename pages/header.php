<?php

include_once SITE_ROOT . "/app/controllers/users.php";

?>

<header class="header">
    <div class="container">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid header-nav">
                <a class="navbar-brand" href="#">TR</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Переключатель навигации">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="<?=BASE_URL . 'index.php'?>">Главная</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=BASE_URL . 'programms.php'?>">Тренировочные программы</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=BASE_URL . 'trainers.php'?>">Тренеры</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Форум</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=BASE_URL . 'about.php'?>">О нас</a>
                        </li>
                    </ul>
                    <div class="authorization">
                        <?php if(!isset($_SESSION['email'])): ?>
                            <a class="aut" href="<?=BASE_URL . 'aut.php'?>">Вход</a>
                            <a class=""> | </a>
                            <a class="aut" href="<?=BASE_URL . 'reg.php'?>">Регистрация</a>
                        <?php else: ?>
                            <a class="aut" href="<?=BASE_URL . 'profile.php'?>">Профиль</a>
                            <a class=""> | </a>
                            <a class="aut" href="<?=BASE_URL . 'logout.php'?>">Выход</a>
                        <?php endif; ?>
                    </div>
                    
                </div>
            </div>
        </nav>
    </div>
</header>
