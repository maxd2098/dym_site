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
include SITE_ROOT . "/app/controllers/programs.php";

?>
<!--HEADER end-->


<!--MAIN start-->


<div class="container">
    <div class="main-content reg-content">
        <form class="row justify-content-center" action="createProgram.php" method="post" enctype="multipart/form-data">
            <div class="mb-3 col-12 col-lg-5 error-msg">
                <?php
                foreach($errMsg as $msg) {
                    echo $msg . "<br>";
                }
                ?>
            </div>
            <div class="w-100"></div>
            <div class="mb-3 col-12 col-lg-5">
                <label for="exampleInputEmail1" class="form-label">Автор*</label>
                <input name="name_user" value="<?=$_SESSION['name'] . ' ' . $_SESSION['surname']; ?>" type="text" class="form-control" id="regName" readonly>
            </div>
            <div class="w-100"></div>
            <div class="mb-3 col-12 col-lg-5">
                <label for="exampleInputEmail1" class="form-label">Введите заголовок*</label>
                <input name="title" value="<?=$title; ?>" type="text" class="form-control" id="regSurname" placeholder="Заголовок программы">
            </div>
            <div class="w-100"></div>
            <div class="mb-3 col-12 col-lg-5">
                <label for="exampleInputEmail1" class="form-label">Содержание программы*</label>
                <textarea name="text" class="form-control" rows="12" placeholder="Содержание" maxlength="20000"><?=$text; ?></textarea>
            </div>
            <div class="w-100"></div>
            <div class="mb-3 col-12 col-lg-5">
                <label for="exampleInputEmail1" class="form-label">Загрузить изображение (не обязательно)</label>
                <input name="img" type="file" class="form-control" id="inputGroupFile02">
            </div>
            <div class="w-100"></div>
            <div class="mb-3 col-12 col-lg-5">
                <button name="button_createProgram" type="submit" class="btn btn-danger">Добавить</button>
                <a class="button-reg" href="programms.php">
                    <button type="button" class="btn btn-secondary">Не добавлять</button>
                </a>
            </div>
        </form>
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

