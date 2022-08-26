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
include SITE_ROOT . "/pages/addYear.php";

?>
<!--HEADER end-->


<!--MAIN start-->


<div class="container">
    <!--TRAINERS CARDS start-->
    <div class="row main-content">
        
        <div class="trainer-describe col-lg-9 col-12">
            <h2 class="name-trainer">
                <?=$trainer['name'] . ' ' . $trainer['surname']; ?>
            </h2>
            <div class="img-div">
                <img src="<?=BASE_URL . '/assets/imageToServer/' . $trainer['img']; ?>" class="img-fluid" alt="Загрузите фотографию">
            </div>
            <div class="weight-train age">
                Возраст: <?=$trainer['age'] . addYearAll($trainer, 'age');?>
            </div>
            <div class="weight-train experience">
                Стаж работы: <?=$trainer['experience'] . addYearAll($trainer, 'experience');?>
            </div>
            <div class="weight-train email">
                Email: <?=$trainer['email'];?>
            </div>
            <div class="describe">
                О себе: <?=$trainer['info'];?>
            </div>
            <button class="btn btn-danger" type="submit">Оставить заявку</button>
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

