<?php

include "../../path.php";

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
include SITE_ROOT . '/app/controllers/adminSupportMsg.php';

?>
<!--HEADER end-->


<!--MAIN start-->

<div class="container">
    
    <div class="row main-content">
        <!--ADMIN CONTENT start-->
        <div class="admin-content col-lg-9 col-12">
            <form class="row justify-content-center">
                <div class="w-100"></div>
                <div class="mb-3 col-12 col-lg-6">
                    <label for="exampleInputEmail1" class="form-label">ID сообщения</label>
                    <input value="<?=$supportMsg['id']; ?>" type="text" class="form-control" id="regName" readonly>
                </div>
                <div class="w-100"></div>
                <div class="mb-3 col-12 col-lg-6">
                    <label for="exampleInputEmail1" class="form-label">Статус автора</label>
                    <input value="<?=$supportMsg['status']; ?>" type="text" class="form-control" id="regName" readonly>
                </div>
                <div class="w-100"></div>
                <div class="mb-3 col-12 col-lg-6">
                    <label for="exampleInputEmail1" class="form-label">Email автора</label>
                    <input value="<?=$supportMsg['email']; ?>" type="text" class="form-control" id="regSurname" placeholder="Заголовок программы" readonly>
                </div>
                <div class="w-100"></div>
                <div class="mb-3 col-12 col-lg-6">
                    <label for="exampleInputEmail1" class="form-label">Текст сообщения</label>
                    <textarea class="form-control" rows="12" placeholder="Содержание" maxlength="20000" readonly><?=$supportMsg['message']; ?></textarea>
                </div>
                <div class="w-100"></div>
                <div class="mb-3 col-12 col-lg-6">
                    <label for="exampleInputEmail1" class="form-label">Дата отправки сообщения</label>
                    <input value="<?=$supportMsg['created_date']; ?>" type="text" class="form-control" id="regSurname" placeholder="Заголовок программы" readonly>
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



