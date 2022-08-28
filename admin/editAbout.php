<?php

include "../path.php";

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
include SITE_ROOT . "/pages/banAdmin.php";
$about = selectOneAnd('about');
//che($about);

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['button_adminEditAbout'])) {
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);
    $address = trim($_POST['address']);
    $description = $_POST['description'];
    if($phone === '' || $email === '' || $address === '' || $description === '') {
        $errMsg[] = 'Не все поля заполнены';
    } else {
        $post = [
            'phone' => $phone,
            'email' => $email,
            'address' => $address,
            'description' => $description
        ];
        updateAbout('about', $post);
        header('location: ' . '../about.php');
    }
}

?>
<!--HEADER end-->


<!--MAIN start-->

<div class="container">
    
    <div class="row main-content">
        <!--ADMIN CONTENT start-->
        <div class="admin-content col-lg-9 col-12">
            <form class="row justify-content-center" action="editAbout.php" method="post">
                <div class="mb-3 col-12 col-lg-6 error-msg">
                    <?php
                    foreach($errMsg as $msg) {
                        echo $msg . "<br>";
                    }
                    ?>
                </div>
                <div class="w-100"></div>
                <div class="mb-3 col-12 col-lg-6">
                    <label for="exampleInputEmail1" class="form-label">Наш номер телефона</label>
                    <input name="phone" value="<?=$about['phone']; ?>" type="text" class="form-control" id="regName" placeholder="Номер телефона">
                </div>
                <div class="w-100"></div>
                <div class="mb-3 col-12 col-lg-6">
                    <label for="exampleInputEmail1" class="form-label">Наш email</label>
                    <input name="email" value="<?=$about['email']; ?>" type="text" class="form-control" id="regName" placeholder="Email">
                </div>
                <div class="w-100"></div>
                <div class="mb-3 col-12 col-lg-6">
                    <label for="exampleInputEmail1" class="form-label">Адрес</label>
                    <input name="address" value="<?=$about['address']; ?>" type="text" class="form-control" id="regSurname" placeholder="Заголовок программы">
                </div>
                <div class="w-100"></div>
                <div class="mb-3 col-12 col-lg-6">
                    <label for="exampleInputEmail1" class="form-label">Описание фитнес-центра</label>
                    <textarea name="description" class="form-control" rows="12" placeholder="Содержание" maxlength="20000"><?=$about['description']; ?></textarea>
                </div>
                <div class="w-100"></div>
                <div class="buttons-form mb-3 col-12 col-lg-6">
                    <button name="button_adminEditAbout" type="submit" class="btn btn-danger">Сохранить</button>
                    <a class="button-reg" href="<?=BASE_URL . 'about.php'?>">
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




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>

</body>
</html>




