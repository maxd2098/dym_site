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
<?php

include SITE_ROOT . "/pages/header.php";
include SITE_ROOT . "/pages/banUnaut.php";
include SITE_ROOT . '/app/controllers/memShips.php';

?>
<!--HEADER end-->


<!--MAIN start-->


<div class="container">
    <!--MEMSHIPS CARDS start-->
    <div class="row main-content memberships-content">
        
        <div class="train-cards col-lg-9 col-12">
            <form class="row justify-content-center" action="membership.php" method="post">
                <div class="mb-3 col-12 col-lg-5 error-msg">
                    <?php
                    foreach($errMsg as $msg) {
                        echo $msg . "<br>";
                    }
                    ?>
                </div>
                <div class="w-100"></div>
                <div class="mb-3 col-12 col-lg-5">
                    <label for="exampleInputEmail1" class="form-label">Ваш email</label>
                    <input name="email" value="<?=$_SESSION['email']; ?>" type="text" class="form-control" readonly>
                </div>
                <div class="w-100"></div>
                <div class="mb-3 col-12 col-lg-5">
                    <label for="exampleInputEmail1" class="form-label">ID абонемента</label>
                    <input name="id_memsh" value="<?=$memberShip['id_memsh']; ?>" type="text" class="form-control" readonly>
                </div>
                <div class="w-100"></div>
                <div class="mb-3 col-12 col-lg-5">
                    <label for="exampleInputEmail1" class="form-label">Абонемент</label>
                    <input name="title" value="<?=$memberShip['title']; ?>" type="text" class="form-control" readonly>
                </div>
                <div class="w-100"></div>
                <div class="mb-3 col-12 col-lg-5">
                    <label for="exampleInputEmail1" class="form-label">Тип</label>
                    <?php if($memberShip['type'] == 0): ?>
                        <input name="type" value="Без тренера" type="text" class="form-control" readonly>
                    <?php else: ?>
                        <input name="type" value="С тренером" type="text" class="form-control" readonly>
                    <?php endif; ?>
                </div>
                <div class="w-100"></div>
                <div class="mb-3 col-12 col-lg-5">
                    <label for="exampleInputEmail1" class="form-label">Цена</label>
                    <input name="price" value="<?=$memberShip['price']; ?>" type="text" class="form-control" readonly>
                </div>
                <div class="w-100"></div>
                <div class="mb-3 col-12 col-lg-5">
                    <label for="exampleInputEmail1" class="form-label">Все верно?</label><br>
                    <button name="button_payForMemShip" type="submit" class="btn btn-danger">Оплатить</button>
                    <a class="button-reg" href="memberships.php">
                        <button type="button" class="btn btn-secondary">Отменить</button>
                    </a>
                </div>
            </form>
        </div>
        <!--MEMSHIPS CARDS end-->
        
        
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

