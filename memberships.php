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


<div class="container">
    <!--TRAINERS CARDS start-->
    <div class="row main-content memberships-content">

        <div class="train-cards col-lg-9 col-12">
            <h2 class="main-trainers">
                Выбрать абонемент
            </h2>
            <div class="row">
                
                <div class="col-lg-6">
                    <div class="card">
                        <div class="img-div">
                            <img src="assets/img/membership.jpg" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body">
                            <h3 class="card-describe">Абонемент на 6 занятий</h3>
                            <h5 class="card-describe">Тип: без тренера</h5>
                            <h5 class="card-describe">Цена: 1000 рублей</h5>
                            <button class="btn btn-primary" type="submit">Купить абонемент</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="img-div">
                            <img src="assets/img/membership.jpg" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body">
                            <h3 class="card-describe">Абонемент на 12 занятий</h3>
                            <h5 class="card-describe">Тип: без тренера</h5>
                            <h5 class="card-describe">Цена: 1800 рублей</h5>
                            <button class="btn btn-primary" type="submit">Купить абонемент</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="img-div">
                            <img src="assets/img/membership.jpg" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body">
                            <h3 class="card-describe">Абонемент на 6 занятий</h3>
                            <h5 class="card-describe">Тип: с тренером</h5>
                            <h5 class="card-describe">Цена: 1500 рублей</h5>
                            <button class="btn btn-primary" type="submit">Купить абонемент</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="img-div">
                            <img src="assets/img/membership.jpg" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body">
                            <h3 class="card-describe">Абонемент на 12 занятий</h3>
                            <h5 class="card-describe">Тип: с тренером</h5>
                            <h5 class="card-describe">Цена: 2800 рублей</h5>
                            <button class="btn btn-primary" type="submit">Купить абонемент</button>
                        </div>
                    </div>
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
<?php include SITE_ROOT . "/pages/footer.php"; ?>
<!--FOOTER end-->




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>

</body>
</html>
