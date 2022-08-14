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
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://kit.fontawesome.com/90241b67b0.js" crossorigin="anonymous"></script>
</head>
<body>

<!--HEADER start-->
<?php include "pages/header.php"; ?>
<!--HEADER end-->


<!--MAIN start-->


<div class="container">
    <div class="row main-content">
        <div class="col-lg-9 col-12">
            <div class="profile-content">
                <h2 class="title">Информация о вас</h2>
                <div class="name">Имя: <?=$_SESSION['name']; ?></div>
                <div class="name">Фамилия: <?=$_SESSION['surname']; ?></div>
                <div class="name">Email: <?=$_SESSION['email']; ?></div>
                <div class="name">Номер телефона: <?=$_SESSION['phone']; ?></div>
                <div class="name">Возраст: <?=$_SESSION['age']; ?></div>
                <?php if($_SESSION['status'] == 0): ?>
                    <div class="name">Статус: клиент</div>
                <?php elseif($_SESSION['status'] == 1): ?>
                    <div class="name">Статус: тренер</div>
                <?php elseif($_SESSION['status'] == 2): ?>
                    <div class="name">Статус: администратор</div>
                    <a href="<?=BASE_URL . 'admin/admin.php'?>">
                        <button type="button" class="btn btn-danger">Админ панель</button>
                    </a>
                <?php else: ?>
                    <div class="name">Статус: суперпользователь</div>
                <?php endif; ?>
            </div>
        <?php ch($_SESSION); ?>
        </div>
        
        
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
