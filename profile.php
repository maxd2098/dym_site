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
    <div class="row main-content">
        <div class="col-lg-9 col-12">
            <div class="row profile-content">
                <div class="col-lg-3 col-sm-4">
                    <div class="img-div">
                        <img src="<?=BASE_URL . '/assets/imageToServer/' . $_SESSION['img']; ?>" class="img-fluid" alt="Загрузите фотографию">
                    </div>
                    <div class="change-photo">
                        <?php if($_SESSION['img'] === '' || $_SESSION['img'] === null): ?>
                            <a class="button-reg" href="<?=BASE_URL . 'photoEdit.php'?>">
                                <button type="button" class="btn btn-secondary">Загрузить фото</button>
                            </a>
                        <?php else: ?>
                            <a class="button-reg" href="<?=BASE_URL . 'photoEdit.php'?>">
                                <button type="button" class="btn btn-secondary">Изменить фото</button>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-9 col-sm-8">
                    <h2 class="profile-property title">Ваш профиль</h2>
                    <div class="profile-property name">Имя: <?=$_SESSION['name']; ?></div>
                    <div class="profile-property surname">Фамилия: <?=$_SESSION['surname']; ?></div>
                    <div class="profile-property email">Email: <?=$_SESSION['email']; ?></div>
                    <div class="profile-property phone">Номер телефона: <?=$_SESSION['phone']; ?></div>
                    <div class="profile-property age">Возраст: <?=$_SESSION['age'] . $yearAge; ?></div>
                    <?php if($_SESSION['status'] == 0): ?>
                        <div class="profile-property status">Статус: клиент</div>
                    <?php elseif($_SESSION['status'] == 1): ?>
                        <div class="profile-property status">Статус: тренер</div>
                        <div class="profile-property experience">Стаж работы: <?=$_SESSION['experience'] . $yearExperience; ?></div>
                    <?php elseif($_SESSION['status'] == 2): ?>
                        <div class="profile-property status">Статус: администратор</div>
                    <?php else: ?>
                        <div class="profile-property status">Статус: владелец</div>
                    <?php endif; ?>
                    <div class="profile-property age">О себе: <?=$_SESSION['info']; ?></div>
                    <?php if($_SESSION['status'] == 2 || $_SESSION['status'] == 3): ?>
                        <a class="admin" href="<?=BASE_URL . 'admin/admin.php'?>">
                            <button type="button" class="btn btn-danger">Админ панель</button>
                        </a>
                    <?php endif; ?>
                    <div class="w-100"></div>
                    <a class="edit" href="<?=BASE_URL . 'profileEdit.php?id=' . $_SESSION['id']; ?>">
                        <button type="button" class="btn btn-secondary">Редактировать профиль</button>
                    </a>
                </div>
                
            </div>
            <?php //ch($_SESSION); ?>
        </div>
        
        
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
