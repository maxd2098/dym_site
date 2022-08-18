<?php

    include "path.php";

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Тренажерка</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=BASE_URL . 'assets/css/style.css'?>">
    <script src="https://kit.fontawesome.com/90241b67b0.js" crossorigin="anonymous"></script>
</head>
<body>

<!--HEADER start-->
<?php include SITE_ROOT . "/pages/header.php"; ?>
<!--HEADER end-->


<!--MAIN start-->

<!--CAROUSEL start-->
<div class="container">
    <h2 class="title-carousel">
        Тренажерка
    </h2>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/img/carousel1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <p><a href="#">Некоторый репрезентативный заполнитель для первого слайда.</a></p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="assets/img/carousel2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <p><a href="#">Некоторый репрезентативный заполнитель для второго слайда.</a></p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="assets/img/carousel3.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <p><a href="#">Некоторый репрезентативный заполнитель для третьего слайда.</a></p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Предыдущий</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Следующий</span>
        </button>
    </div>
</div>
<!--CAROUSEL end-->


<div class="container">
    <!--TRAINERS CARDS start-->
    <div class="row main-content">
        <h2 class="main-trainers">
            Наши лучшие тренера
        </h2>
        <div class="train-cards col-lg-9 col-12">
            <div class="row">
                <div class="col-lg-6">
                    <a href="<?php echo BASE_URL . 'train.php'; ?>">
                        <div class="card">
                            <div class="img-div">
                                <img src="assets/img/trainers/trainer_1.jpg" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Фред Ган</h5>
                                <h6 class="age">32 года</h6>
                                <p class="card-text">С вспомогательным текстом ниже в качестве естественного перехода к дополнительному контенту.</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6">
                    <a href="train.php">
                        <div class="card">
                            <div class="img-div">
                                <img src="assets/img/trainers/trainer_2.jpg" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Нильсон Дэвидс</h5>
                                <h6 class="age">62 года</h6>
                                <p class="card-text">С вспомогательным текстом ниже в качестве естественного перехода к дополнительному контенту.</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6">
                    <a href="train.php">
                        <div class="card">
                            <div class="img-div">
                                <img src="assets/img/trainers/trainer_3.jpg" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Майкл Джонс</h5>
                                <h6 class="age">29 лет</h6>
                                <p class="card-text">С вспомогательным текстом ниже в качестве естественного перехода к дополнительному контенту.</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6">
                    <a href="train.php">
                        <div class="card">
                            <div class="img-div">
                                <img src="assets/img/trainers/trainer_4.jpg" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Льюис Двигайло</h5>
                                <h6 class="age">31 год</h6>
                                <p class="card-text">С вспомогательным текстом ниже в качестве естественного перехода к дополнительному контенту.</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!--TRAINERS CARDS end-->
        
        
        <!--SIDEBAR start-->
        <?php include SITE_ROOT . "/pages/sidebar.php"; ?>
        <!--SIDEBAR end-->

    </div>
</div>
<!--MAIN end-->

<!--FOOTER start-->
<?php include "pages/footer.php"; ?>
<!--FOOTER end-->




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>

</body>
</html>