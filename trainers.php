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
<?php include "pages/header.php"; ?>
<!--HEADER end-->


<!--MAIN start-->

<div class="container">
    <!--TRAINERS CARDS start-->
    <div class="row main-content">
        
        <div class="trainers-cards col-lg-9 col-12">
            <h2 class="main-trainers">
                Наши тренеры
            </h2>
            <div class="card col-12">
                <a href="train.php">
                    <div class="row g-0">
                        <div class="img-div col-lg-4">
                            <img src="assets/img/trainers/trainer_1.jpg" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-lg-8">
                            <div class="card-body">
                                <h3 class="card-title">Фред Ган</h3>
                                <div class="card-author">Номер: +79142443211</div>
                                <div class="card-date">Стаж: 5 лет</div>
                                <p class="card-text">Это более широкая карта с вспомогательным текстом ниже в качестве естественного перехода к дополнительному контенту. Этот контент немного длиннее.</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
    
            <div class="card col-12">
                <a href="train.php">
                    <div class="row g-0">
                        <div class="img-div col-lg-4">
                            <img src="assets/img/trainers/trainer_4.jpg" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-lg-8">
                            <div class="card-body">
                                <h3 class="card-title">Нильсон Дэвидс</h3>
                                <div class="card-author">Номер: +791422432311</div>
                                <div class="card-date">Стаж: 36 лет</div>
                                <p class="card-text">Это более широкая карта с вспомогательным текстом ниже в качестве естественного перехода к дополнительному контенту. Этот контент немного длиннее.</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
    
        </div>
        <!--TRAINERS CARDS end-->
        
        
        <!--SIDEBAR start-->
        <?php include "pages/sidebar.php"; ?>
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
