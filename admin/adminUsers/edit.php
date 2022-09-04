<?php

include "../../path.php";
include SITE_ROOT . '/app/controllers/adminUsers.php';

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
    
    <div class="row main-content">
        <!--ADMIN CONTENT start-->
        <div class="admin-content col-lg-9 col-12">
            <form class="row profile-edit justify-content-center" action="edit.php" method="post" enctype="multipart/form-data">
                <div class="mb-3 col-12 col-lg-6 error-msg">
                    <?php
                    foreach($errMsg as $msg) {
                        echo $msg . "<br>";
                    }
                    ?>
                </div>
                <div class="w-100"></div>
                <div class="mb-3 col-12 col-lg-6">
                    <label for="exampleInputEmail1" class="form-label">ID пользователя*</label>
                    <input name="id" value="<?=$userEdit['id']; ?>" type="text" class="form-control" id="regName" readonly>
                </div>
                <div class="w-100"></div>
                <div class="mb-3 col-12 col-lg-6">
                    <label for="exampleInputEmail1" class="form-label">Выбрать статус</label>
                    <select name="status" class="form-select" aria-label="Пример выбора по умолчанию">
                        
                        <?php if($userEdit['status'] == 0 && $_SESSION['status'] == 2): ?>
                            <option value="<?=$userEdit['status']; ?>" selected>Клиент</option>
                            <option value="1">Тренер</option>
                        <?php elseif($userEdit['status'] == 1 && $_SESSION['status'] == 2): ?>
                            <option value="<?=$userEdit['status']; ?>" selected>Тренер</option>
                            <option value="0">Клиент</option>
                        <?php elseif($userEdit['status'] == 0 && $_SESSION['status'] == 3): ?>
                            <option value="<?=$userEdit['status']; ?>" selected>Клиент</option>
                            <option value="1">Тренер</option>
                            <option value="2">Админ</option>
                        <?php elseif($userEdit['status'] == 1 && $_SESSION['status'] == 3): ?>
                            <option value="<?=$userEdit['status']; ?>" selected>Тренер</option>
                            <option value="0">Клиент</option>
                            <option value="2">Админ</option>
                        <?php elseif($userEdit['status'] == 2 && $_SESSION['status'] == 3): ?>
                            <option value="<?=$userEdit['status']; ?>" selected>Админ</option>
                            <option value="0">Клиент</option>
                            <option value="1">Тренер</option>
                        <?php elseif($userEdit['status'] == 3 && $_SESSION['status'] == 3): ?>
                            <option value="<?=$userEdit['status']; ?>" selected>Владелец</option>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="w-100"></div>
                <div class="mb-3 col-12 col-lg-6">
                    <label for="exampleInputEmail1" class="form-label">Имя пользователя*</label>
                    <input name="name" value="<?=$userEdit['name']; ?>" type="text" class="form-control" placeholder="Ваше имя">
                </div>
                <div class="w-100"></div>
                <div class="mb-3 col-12 col-lg-6">
                    <label for="exampleInputEmail1" class="form-label">Фамилия пользователя*</label>
                    <input name="surname" value="<?=$userEdit['surname']; ?>" type="text" class="form-control" placeholder="Ваша фамилия">
                </div>
                <div class="w-100"></div>
                <div class="mb-3 col-12 col-lg-6">
                    <label for="exampleInputEmail1" class="form-label">Адрес электронной почты*</label>
                    <input name="email" value="<?=$userEdit['email']; ?>" type="email" class="form-control" aria-describedby="emailHelp" placeholder="Ваш email" readonly>
                </div>
                <div class="w-100"></div>
                <div class="mb-3 col-12 col-lg-6">
                    <label for="exampleInputEmail1" class="form-label">Номер телефона*</label>
                    <input name="phone" value="<?=$userEdit['phone']; ?>" type="text" class="form-control" placeholder="Ваш номер" readonly>
                </div>
                <div class="w-100"></div>
                <div class="mb-3 col-12 col-lg-6">
                    <label for="exampleInputEmail1" class="form-label">Возраст пользователя*</label>
                    <input name="age" value="<?=$userEdit['age']; ?>" type="text" class="form-control" placeholder="Ваш возраст">
                </div>
                <?php if($userEdit['status'] == 1): ?>
                    <div class="w-100"></div>
                    <div class="mb-3 col-12 col-lg-6">
                        <label for="exampleInputEmail1" class="form-label">Стаж</label>
                        <input name="experience" value="<?=$userEdit['experience']; ?>" type="text" class="form-control" placeholder="Ваш возраст">
                    </div>
                <?php endif; ?>
                <div class="w-100"></div>
                <div class="mb-3 col-12 col-lg-6">
                    <label for="exampleInputEmail1" class="form-label">Информация о пользователе (max: 500 символов)</label>
                    <textarea name="info" class="form-control" rows="6" placeholder="Максимум 500 символов" maxlength="500"><?=$userEdit['info']; ?></textarea>
                </div>
                <?php if($userEdit['img'] != ''): ?>
                    <div class="w-100"></div>
                    <div class="mb-3 col-12 col-lg-6">
                        <label for="exampleInputEmail1" class="form-label">Нынешнее фото</label>
                        <div class="img-edit">
                            <img src="<?=BASE_URL . '/assets/imageToServer/' . $userEdit['img']; ?>" class="img-fluid" alt="Загрузите фотографию">
                        </div>
                    </div>
                <?php endif; ?>
                <div class="w-100"></div>
                <div class="mb-3 col-12 col-lg-6">
                    <label for="exampleInputEmail1" class="form-label">Изменить фото</label>
                    <input name="img" type="file" class="form-control" id="inputGroupFile02">
                </div>
                <div class="w-100"></div>
                <div class="mb-3 col-12 col-lg-6">
                    <label for="exampleInputPassword1" class="form-label">Изменить пароль</label>
                    <input name="pass1" type="password" class="form-control" placeholder="Пароль">
                </div>
                <div class="w-100"></div>
                <div class="mb-3 col-12 col-lg-6">
                    <label for="exampleInputPassword1" class="form-label">Повторите новый пароль</label>
                    <input name="pass2" type="password" class="form-control" placeholder="Повторите пароль">
                </div>
                <div class="w-100"></div>
                <div class="btn-div mb-3 col-12 col-lg-6">
                    <button name="button_adminEditProfile" type="submit" class="btn btn-danger">Сохранить</button>
                    <a class="button-reg" href="display.php">
                        <button type="button" class="btn btn-secondary">Не сохранять</button>
                    </a>
                </div>
            </form>
        </div>
        <!--ADMIN CONTENT end-->
        
        
        <!--SIDEBAR start-->
        <?php include SITE_ROOT . "/pages/sidebarAdmin.php"; ?>
        <!--SIDEBAR end-->
    
    </div>
</div>
<!--MAIN end-->

<!--FOOTER start-->
<?php include SITE_ROOT . "/pages/footer.php"; ?>
<!--FOOTER end-->


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>

</body>
</html>



