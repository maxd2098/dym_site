<?php

include "path.php";
include "app/controllers/users.php";

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Тренажерка</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://kit.fontawesome.com/90241b67b0.js" crossorigin="anonymous"></script>
</head>
<body>

<!--HEADER start-->
<?php include "pages/header.php"; ?>
<!--HEADER end-->


<!--MAIN start-->


<div class="container">
    <div class="main-content aut-content">
        <form class="row justify-content-center" action="aut.php" method="post">
            <div class="mb-3 col-12 col-lg-4 error-msg">
                <?php
                foreach($errMsg as $msg) {
                    echo $msg . "<br>";
                }
                ?>
            </div>
            <div class="w-100"></div>
            <div class="mb-3 col-12 col-lg-4">
                <label for="exampleInputEmail1" class="form-label">Введите email или номер телефона</label>
                <input name="email" type="text" class="form-control" id="exampleInputEmail">
            </div>
            <div class="w-100"></div>
            <div class="mb-3 col-12 col-lg-4">
                <label for="exampleInputPassword1" class="form-label">Введите пароль</label>
                <input name="pass" type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="w-100"></div>
            <div class="mb-3 col-12 col-lg-4">
                <button name="button_aut" type="submit" class="btn btn-primary">Авторизация</button>
                <a class="button-reg" href="reg.php">
                    <button type="button" class="btn btn-secondary">Регистрация</button>
                </a>
            </div>
        </form>
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

