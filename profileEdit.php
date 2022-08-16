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
    <div class="main-content">
        <form class="row profile-edit justify-content-center" action="profileEdit.php" method="post">
            <div class="mb-3 col-12 col-lg-4 error-msg">
                <?php
                foreach($errMsg as $msg) {
                    echo $msg . "<br>";
                }
                ?>
            </div>
            <div class="w-100"></div>
            <div class="mb-3 col-12 col-lg-4">
                <label for="exampleInputEmail1" class="form-label">Ваше имя*</label>
                <input name="name" value="<?=$userEdit['name']; ?>" type="text" class="form-control" id="regName" placeholder="Ваше имя">
            </div>
            <div class="w-100"></div>
            <div class="mb-3 col-12 col-lg-4">
                <label for="exampleInputEmail1" class="form-label">Ваша фамилия*</label>
                <input name="surname" value="<?=$userEdit['surname']; ?>" type="text" class="form-control" id="regSurname" placeholder="Ваша фамилия">
            </div>
            <div class="w-100"></div>
            <div class="mb-3 col-12 col-lg-4">
                <label for="exampleInputEmail1" class="form-label">Адрес электронной почты*</label>
                <input name="email" value="<?=$userEdit['email']; ?>" type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Ваш email" disabled>
            </div>
            <div class="w-100"></div>
            <div class="mb-3 col-12 col-lg-4">
                <label for="exampleInputEmail1" class="form-label">Ваш номер телефона*</label>
                <input name="phone" value="<?=$userEdit['phone']; ?>" type="text" class="form-control" id="regSurname" placeholder="Ваш номер">
            </div>
            <div class="w-100"></div>
            <div class="mb-3 col-12 col-lg-4">
                <label for="exampleInputEmail1" class="form-label">Ваш возраст*</label>
                <input name="age" value="<?=$userEdit['age']; ?>" type="text" class="form-control" id="regSurname" placeholder="Ваш возраст">
            </div>
            <?php if($userEdit['status'] == 1): ?>
                <div class="w-100"></div>
                <div class="mb-3 col-12 col-lg-4">
                    <label for="exampleInputEmail1" class="form-label">Ваш стаж</label>
                    <input name="experience" value="<?=$userEdit['experience']; ?>" type="text" class="form-control" id="regSurname" placeholder="Ваш возраст">
                </div>
            <?php endif; ?>
            <div class="w-100"></div>
            <div class="mb-3 col-12 col-lg-4">
                <label for="exampleInputEmail1" class="form-label">Расскажите о себе</label>
                <textarea name="info" class="form-control" rows="6" placeholder="Максимум 500 знаков"><?=$userEdit['info']; ?></textarea>
            </div>
            <div class="w-100"></div>
            <div class="mb-3 col-12 col-lg-4">
                <label for="exampleInputPassword1" class="form-label">Изменить пароль</label>
                <input name="pass1" type="password" class="form-control" id="exampleInputPassword1" placeholder="Пароль">
            </div>
            <div class="w-100"></div>
            <div class="mb-3 col-12 col-lg-4">
                <label for="exampleInputPassword1" class="form-label">Повторите новый пароль</label>
                <input name="pass2" type="password" class="form-control" id="exampleInputPassword2" placeholder="Повторите пароль">
            </div>
            <div class="w-100"></div>
            <div class="btn-div mb-3 col-12 col-lg-4">
                <button name="button_editProfile" type="submit" class="btn btn-primary">Сохранить</button>
                <a class="button-reg" href="<?=BASE_URL . 'profile.php'?>">
                    <button type="button" class="btn btn-secondary">Не сохранять</button>
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

